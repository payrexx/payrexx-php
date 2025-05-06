<?php

use Payrexx\Models\Request\AuthToken;
use Payrexx\PayrexxException;

test('AuthToken request returns mocked response success', function () {
    $mockCommunicator = new class () {
        public function requestApi($apiUrl, $params = [], $method = 'POST', $httpHeader = [])
        {
            return [
                'info' => ['http_code' => 200],
                'body' => [
                    'data' => [
                        ['authToken' => 'fake-token']
                    ]
                ]
            ];
        }
    };
    $payrexx = new Payrexx\Payrexx('test', 'dummy', $mockCommunicator::class);

    $authToken = new AuthToken();
    $authToken->setUserId('1'); // fake user id.

    $response = $payrexx->create($authToken);

    expect($response)->toBeInstanceOf(\Payrexx\Models\Response\AuthToken::class)
        ->and($response->getAuthToken())->toBe('fake-token');
});

test('AuthToken request returns mocked response error', function () {
    $mockCommunicator = new class () {
        public function requestApi($apiUrl, $params = [], $method = 'POST', $httpHeader = [])
        {
            return [
                'info' => ['http_code' => 400],  // Simulate a failed API request
                'body' => [
                    'message' => 'Invalid user',
                    'reason' => 'INVALID_TOKEN',
                ]
            ];
        }
    };
    $payrexx = new Payrexx\Payrexx('test', 'dummy', $mockCommunicator::class);

    $authToken = new AuthToken();
    $authToken->setUserId('1'); // fake user id.

    $this->expectException(PayrexxException::class);
    $this->expectExceptionMessage('Invalid user');
    $payrexx->create($authToken);
});
