<?php

namespace Amoapi\Models;

use Amoapi\Http\AmoapiHttpClient;

class RoleModel
{
    /**
     * @var Amoapi\Http\AmoapiHttpClient
     */
    private $httpClient;
    
    /**
     * @var string
     */
    private $apiUri = "/api/v4/roles";

    /**
     * @var array
     */
    protected $headers = [
        "User-Agent" => "amoCRM/oAuth Client 1.0",
        "Content-Type" => "application/json" 
    ];
    
    /**
     * RoleModel construct
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
     * Get all users roles
     *
     * @param  array $filter
     * @return array
     */
    public function getAllRoles(array $filter): array
    {
        return $this->httpClient->request("GET", $this->apiUri, $filter, $this->headers);
    }
    
    /**
     * Get role by id
     *
     * @param  int $id
     * @return array
     */
    public function getRoleById(int $id): array
    {
        return $this->httpClient->request("GET", "{$this->apiUri}/{$id}", [], $this->headers);
    }
}