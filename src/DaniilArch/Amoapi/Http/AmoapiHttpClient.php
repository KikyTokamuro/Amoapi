<?php

namespace Amoapi\Http;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

// TODO: getByID

class AmoapiHttpClient
{
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
            'timeout'  => 1.0,
            'http_errors' => false
        ]);
    }

    /**
     * Check response 
     *
     * @param  ResponseInterface $response
     * @return array
     */
    private function checkResponse(ResponseInterface $response): array
    {
        $statusCode = $response->getStatusCode();
        $jsonResp = json_decode($response->getBody(), true);

        if ($statusCode < 200 || $statusCode > 204) {
            if (!empty($jsonResp)) {
                $jsonError = (array) $jsonResp;
                $jsonError["error"] = true;

                return $jsonError;
            }
        }

        if ($response->getBody()) {
            if (!empty($jsonResp)) {
                return (array) $jsonResp;
            }
        }

        $jsonError = [];
        $jsonError["error"] = true;
        $jsonError["hint"] = "Response body not found";

        return $jsonError;
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
        $response = $this->httpClient->request($method, $uri, [
            "headers" => $headers,
            "json" => $jsonBody
        ]);

        return $this->checkResponse($response);
    }
} 