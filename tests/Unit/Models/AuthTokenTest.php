<?php

use Payrexx\CommunicationAdapter\CurlCommunication;
use Payrexx\Models\Request\AuthToken;
use Payrexx\Models\Response\AuthToken as ResponseAuthToken;
use Payrexx\PayrexxException;

it('Success response - 200', function () {
    $mockCommunicator = new class() extends CurlCommunication {
        public function requestApi(string $apiUrl, $params = [], $method = 'POST', $httpHeader = []): array
        {
            return getMockResponse(
                200,
                [
                    ['authToken' => 'fake-token'],
                ],
                'Test Message'
            );
        }
    };
    $payrexx = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');

    $response = $payrexx->create($authToken);
    expect($response->getAuthToken())->toBe('fake-token')
        ->and($response)->toBeInstanceOf(ResponseAuthToken::class);
});

it('Exception response - 400', function () {
    $mockCommunicator = new class() extends CurlCommunication {
        public function requestApi(string $apiUrl, $params = [], $method = 'POST', $httpHeader = []): array
        {
            return getMockResponse(400);
        }
    };
    $payrexx = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $payrexx->create($authToken);
})->throws(PayrexxException::class);

it('Exception response - 401', function () {
    $mockCommunicator = new class() extends CurlCommunication {
        public function requestApi(string $apiUrl, $params = [], $method = 'POST', $httpHeader = []): array
        {
            return getMockResponse(401);
        }
    };
    $payrexx = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $payrexx->create($authToken);
})->throws(PayrexxException::class);

it('Exception response - 403', function () {
    $mockCommunicator = new class() extends CurlCommunication {
        public function requestApi(string $apiUrl, $params = [], $method = 'POST', $httpHeader = []): array
        {
            return getMockResponse(403, [], '');
        }
    };
    $payrexx = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $payrexx->create($authToken);
})->throws(PayrexxException::class);

it('Exception response - 404', function () {
    $mockCommunicator = new class() extends CurlCommunication {
        public function requestApi(string $apiUrl, $params = [], $method = 'POST', $httpHeader = []): array
        {
            return getMockResponse(404);
        }
    };
    $payrexx = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $payrexx->create($authToken);
})->throws(PayrexxException::class);

it('Exception response - 500', function () {
    $mockCommunicator = new class() extends CurlCommunication {
        public function requestApi(string $apiUrl, $params = [], $method = 'POST', $httpHeader = []): array
        {
            return getMockResponse(500);
        }
    };
    $payrexx = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $payrexx->create($authToken);
})->throws(PayrexxException::class);

it('Exception response - 503', function () {
    $mockCommunicator = new class() extends CurlCommunication {
        public function requestApi(string $apiUrl, $params = [], $method = 'POST', $httpHeader = []): array
        {
            return getMockResponse(503, [], 'test', 'test');
        }
    };
    $payrexx = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $payrexx->create($authToken);
})->throws(PayrexxException::class);

it('Success response - 201', function () {
    $mockCommunicator = new class() extends CurlCommunication {
        public function requestApi(string $apiUrl, $params = [], $method = 'POST', $httpHeader = []): array
        {
            return getMockResponse(
                201,
                [
                    ['authToken' => 'fake-token'],
                ],
                'Test Message',
                'Test Reason'
            );
        }
    };
    $payrexx = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');

    $response = $payrexx->create($authToken);
    expect($response->getAuthToken())->toBe('fake-token');
});
