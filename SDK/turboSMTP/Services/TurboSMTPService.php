<?php

namespace TurboSMTP\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\MessageFormatter;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use TurboSMTP\TurboSMTPClientConfiguration;
use GuzzleHttp\Promise\Promise;


class TurboSMTPService {
    protected $api = null;
    protected $client = null;
    protected $configuration = null;

    function __construct(TurboSMTPClientConfiguration $configuration) {

        $logMiddleware = Middleware::tap(
            function (RequestInterface $request) {
                // Log the request details
                echo "Request:\n";
                echo $request->getMethod() . ' ' . $request->getUri() . "\n";
                echo "Headers:\n";
                foreach ($request->getHeaders() as $name => $values) {
                    echo "$name: " . implode(', ', $values) . "\n";
                }
                echo "Body:\n" . (string)$request->getBody() . "\n";
            },

            function (RequestInterface $request, array $options, $response = null) {
                if ($response instanceof ResponseInterface) {
                    // Log the response details if it's a Response
                    echo "Response:\n";
                    echo "Status Code: " . $response->getStatusCode() . "\n";
                    echo "Headers:\n";
                    foreach ($response->getHeaders() as $name => $values) {
                        echo "$name: " . implode(', ', $values) . "\n";
                    }
                    echo "Body:\n" . (string)$response->getBody() . "\n";
                } elseif ($response instanceof Promise) {
                    // Handle the promise
                    $response->then(
                        function (ResponseInterface $resolvedResponse) {
                            // Log the response once the promise is resolved
                            echo "Response (from promise):\n";
                            echo "Status Code: " . $resolvedResponse->getStatusCode() . "\n";
                            echo "Headers:\n";
                            foreach ($resolvedResponse->getHeaders() as $name => $values) {
                                echo "$name: " . implode(', ', $values) . "\n";
                            }
                            echo "Body:\n" . (string)$resolvedResponse->getBody() . "\n";
                        },
                        function ($reason) {
                            echo "Request failed: " . $reason . "\n";
                        }
                    );
                } else {
                    echo "No response received.\n";
                }
            }           

        );

        // Add the middleware to the handler stack
        $stack = \GuzzleHttp\HandlerStack::create();
        $stack->push($logMiddleware);        

        $this->client = new Client([
            'handler' => $stack,            
            'verify' => false
        ]);
        $this->configuration = $configuration;
    }

    
}
