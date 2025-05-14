<?php

use Payrexx\Models\Request\AuthToken;
use Payrexx\Models\Response\AuthToken as ResponseAuthToken;
use Payrexx\PayrexxException;

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
