<?php

namespace Amoapi\Http;

use Amoapi\Exception\AmoapiException;
use GuzzleHttp\Client;
use Exception;
use Psr\Http\Message\ResponseInterface;


/**
 * Class AmoapiHttpClient
 * 
 * @package Amoapi\Http
 */
class AmoapiHttpClient
{    
    /**
     * @var Client
     */
    private $httpClient;

    /**
     * HttpClient construct
     *
     * @param  string $domain
     * @return void
     */
    public function __construct($domain)
    {
        $this->httpClient = new Client([
            'base_uri' => $domain,
            'timeout'  => 3.0,
            'http_errors' => true
        ]);
    }
       
    /**
     * Parse response
     *
     * @param  ResponseInterface $response
     * @return array
     */
    private function parseResponse(ResponseInterface $response): array
    {
        $bodyContent = (string) $response->getBody();
        $decodedBody = json_decode($bodyContent, true);

        if (
            $response->getStatusCode() !== 200
            && $response->getStatusCode() !== 204
            && !$decodedBody 
            && !empty($bodyContent)
        ) {
            throw new AmoapiException(
                "Response body is not json", 
                $response->getStatusCode()
            );
        }

        return $decodedBody ?? [];
    }

    /**
     * Send request and recive response
     *
     * @param  string $method
     * @param  string $uri
     * @param  array $jsonBody
     * @return array
     */
    public function request(string $method, string $uri, array $jsonBody, array $headers): array
    {
        try {
            $response = $this->httpClient->request($method, $uri, [
                "headers" => $headers,
                "json" => $jsonBody
            ]);
            $response = $this->parseResponse($response);
        } catch (Exception $e) {
            throw new AmoapiException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

        return $response;
    }
} 