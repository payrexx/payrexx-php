<?php

use Payrexx\CommunicationAdapter\CurlCommunication;
use Payrexx\Models\Request\AuthToken;
use Payrexx\Payrexx;
use Payrexx\PayrexxException;

it('returns the human-readable cURL error message and carries the errno as code', function () {
    $curlCommunication = new class() extends CurlCommunication {
        protected function curlExec(CurlHandle $curl): string|bool
        {
            return false;
        }

        protected function curlInfo(CurlHandle $curl): mixed
        {
            return ['http_code' => 0];
        }

        protected function curlError(CurlHandle $curl): int
        {
            return CURLE_OPERATION_TIMEDOUT;
        }

        protected function curlErrorMessage(CurlHandle $curl): string
        {
            return 'Operation timed out after 20001 milliseconds with 0 bytes received';
        }
    };

    $response = $curlCommunication->requestApi('https://localhost.invalid/', ['instance' => 'demo']);

    expect($response['body'])->toMatchArray([
        'status' => 'error',
        'message' => 'Operation timed out after 20001 milliseconds with 0 bytes received',
        'code' => CURLE_OPERATION_TIMEDOUT,
    ]);
});

it('throws a PayrexxException with the cURL message and errno as code', function () {
    $mockCommunicator = new class() extends CurlCommunication {
        public function requestApi(string $apiUrl, $params = [], $method = 'POST', $httpHeader = []): array
        {
            return [
                'info' => ['http_code' => 0],
                'body' => [
                    'status' => 'error',
                    'message' => 'Operation timed out after 20001 milliseconds with 0 bytes received',
                    'code' => CURLE_OPERATION_TIMEDOUT,
                ],
            ];
        }
    };
    $payrexx = new Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');

    try {
        $payrexx->create($authToken);
        $this->fail('Expected PayrexxException was not thrown');
    } catch (PayrexxException $e) {
        expect($e->getMessage())->toBe('Operation timed out after 20001 milliseconds with 0 bytes received')
            ->and($e->getCode())->toBe(CURLE_OPERATION_TIMEDOUT);
    }
});

class OptionCapturingCurlCommunication extends CurlCommunication
{
    public array $capturedOptions = [];

    protected function curlSetOptArray(CurlHandle $curl, array $options): bool
    {
        $this->capturedOptions = $options;

        return true;
    }

    protected function curlExec(CurlHandle $curl): string|bool
    {
        return false;
    }

    protected function curlInfo(CurlHandle $curl): mixed
    {
        return ['http_code' => 0];
    }

    protected function curlError(CurlHandle $curl): int
    {
        return 0;
    }

    protected function curlErrorMessage(CurlHandle $curl): string
    {
        return '';
    }
}

it('allows the connect phase (incl. DNS lookup) to outlast one lost DNS reply', function () {
    $curlCommunication = new OptionCapturingCurlCommunication();

    $curlCommunication->requestApi('https://localhost.invalid/', ['instance' => 'demo']);

    // The default resolver timeout is 5 s per query: a 5 s connect timeout aborts the call
    // with "Resolving timed out" as soon as one DNS reply is lost, before the retry answers.
    expect($curlCommunication->capturedOptions[CURLOPT_CONNECTTIMEOUT])->toBe(15)
        ->and($curlCommunication->capturedOptions[CURLOPT_TIMEOUT])->toBe(20);
});

it('lets a subclass override the connect and total timeout', function () {
    $curlCommunication = new class() extends OptionCapturingCurlCommunication {
        protected int $connectTimeout = 7;
        protected int $timeout = 42;
    };

    $curlCommunication->requestApi('https://localhost.invalid/', ['instance' => 'demo']);

    expect($curlCommunication->capturedOptions[CURLOPT_CONNECTTIMEOUT])->toBe(7)
        ->and($curlCommunication->capturedOptions[CURLOPT_TIMEOUT])->toBe(42);
});
