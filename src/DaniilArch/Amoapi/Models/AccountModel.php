<?php

namespace Amoapi\Models;

use Amoapi\Http\AmoapiHttpClient;

class AccountModel
{
    /**
     * @var Amoapi\Http\AmoapiHttpClient
     */
    private $httpClient;
    
    /**
     * @var string
     */
    private $apiUri = "/api/v4/account";

    /**
     * @var array
     */
    protected $headers = [
        "User-Agent" => "amoCRM/oAuth Client 1.0",
        "Content-Type" => "application/json" 
    ];

    /**
     * AccountModel construct
     *
     * @param  string $baseUri
     * @param  string $accessToken
     * @return void
     */
    public function __construct(string $baseUri, string $accessToken)
    {
        $this->httpClient = new AmoapiHttpClient($baseUri);
        $this->headers["Authorization"] = "Bearer " . $accessToken;
    }
    
    /**
     * Get account info
     *
     * @return array
     */
    public function getInfo(): array
    {
        return $this->httpClient->request("GET", $this->apiUri, [], $this->headers);
    }
}