<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Payrexx\Models\Request\AuthToken;
use Payrexx\Models\Response\AuthToken as ResponseAuthToken;
use Payrexx\PayrexxException;
use Payrexx\CommunicationAdapter\GuzzleCommunication;

it('Success response - 200', function () {
    $mockCommunicator = new class () {
        public function requestApi(): array
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
    $custom = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');

    $response = $custom->create($authToken);
    expect($response->getAuthToken())->toBe('fake-token')
        ->and($response)->toBeInstanceOf(ResponseAuthToken::class);
});

it('Exception response - 400', function () {
    $mockCommunicator = new class () {
        public function requestApi(): array
        {
            return getMockResponse(400);
        }
    };
    $custom = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $custom->create($authToken);
})->throws(PayrexxException::class);

it('Exception response - 401', function () {
    $mockCommunicator = new class () {
        public function requestApi(): array
        {
            return getMockResponse(401);
        }
    };
    $custom = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $custom->create($authToken);
})->throws(PayrexxException::class);

it('Exception response - 403', function () {
    $mockCommunicator = new class () {
        public function requestApi(): array
        {
            return getMockResponse(403, [], '');
        }
    };
    $custom = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $custom->create($authToken);
})->throws(PayrexxException::class);

it('Exception response - 404', function () {
    $mockCommunicator = new class () {
        public function requestApi(): array
        {
            return getMockResponse(404);
        }
    };
    $custom = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $custom->create($authToken);
})->throws(PayrexxException::class);

it('Exception response - 500', function () {
    $mockCommunicator = new class () {
        public function requestApi(): array
        {
            return getMockResponse(500);
        }
    };
    $custom = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $custom->create($authToken);
})->throws(PayrexxException::class);

it('Exception response - 503', function () {
    $mockCommunicator = new class () {
        public function requestApi(): array
        {
            return getMockResponse(503, [], 'test', 'test');
        }
    };
    $custom = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');
    $custom->create($authToken);
})->throws(PayrexxException::class);

it('Success response - 201', function () {
    $mockCommunicator = new class () {
        public function requestApi(): array
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
    $custom = new \Payrexx\Payrexx('demo', 'demo', $mockCommunicator::class);
    $authToken = new AuthToken();
    $authToken->setUserId('1');

    $response = $custom->create($authToken);
    expect($response->getAuthToken())->toBe('fake-token');
});

it('can create a GuzzleCommunication object', function () {
    $mock = new MockHandler([
        new Response(200, [], json_encode(['authToken' => 'fake-token'])),
    ]);

    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);

    // Inject the mock client into GuzzleCommunication
    $guzzleCommunication = new GuzzleCommunication($client);

    // Act: Make the API request
    $response = $guzzleCommunication->requestApi("test", ['instance' => 'demo']);

    // Assert
    expect($response)->toBeArray()
        ->and($response)->toHaveKeys(['info', 'body'])
        ->and($response['info'])->toHaveKeys(['http_code', 'contentType'])
        ->and($response['body'])->toBeJson()->toBe('{"authToken":"fake-token"}');
});
