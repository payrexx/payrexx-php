<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

uses(Tests\TestCase::class)->in('Feature', 'Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

function getMockResponse(
    $httpCode = 0,
    array $data = [],
    string $message = '',
    string $reason = ''
): array {
    $response = [
        'info' => [
            'http_code' => $httpCode
        ],
    ];
    if (!empty($data)) {
        $response['body']['data'] = $data;
    }
    if (!empty($message)) {
        $response['body']['message'] = $message;
    }
    if (!empty($reason)) {
        $response['body']['reason'] = $reason;
    }

    return $response;
}
