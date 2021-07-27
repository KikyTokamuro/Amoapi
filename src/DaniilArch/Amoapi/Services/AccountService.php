<?php

namespace Amoapi\Services;

use Amoapi\Http\AmoapiHttpClient;

class AccountService extends Service
{
    /**
     * @var string
     */
    private $apiUri = "/api/v4/account";

    /**
     * AccountService construct
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