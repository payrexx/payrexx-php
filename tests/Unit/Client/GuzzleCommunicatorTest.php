<?php

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Payrexx\CommunicationAdapter\GuzzleCommunication;

it('can create a GuzzleCommunication object', function () {
    $mock = new MockHandler([
        new Response(
            200,
            ['Content-Type' => 'application/json'],
            json_encode(['authToken' => 'fake-token'])
        ),
    ]);

    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);
    $guzzleCommunication = new GuzzleCommunication($client);
    $response = $guzzleCommunication->requestApi("test", ['instance' => 'demo']);

    expect($response)->toBeArray()
        ->and($response)->toHaveKeys(['info', 'body'])
        ->and($response['info'])->toMatchArray([
            'http_code' => 200,
            'contentType' => 'application/json',
        ])
        ->and($response['body'])->toMatchArray(['authToken' => 'fake-token']);
});
