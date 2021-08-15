<?php

namespace Amoapi\Services;

use Amoapi\Http\AmoapiHttpClient;

/**
 * Class UserService
 * 
 * @link https://www.amocrm.ru/developers/content/crm_platform/users-api Users.
 * @package Amoapi\Services
 */
class UserService extends Service
{    
    /**
     * @var string
     */
    private $apiUri = "/api/v4/users";
 
    /**
     * UserService construct
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
     * Get all users
     *
     * @param  array $filter
     * @return array
     */
    public function getAll(array $filter): array
    {
        return $this->httpClient->request("GET", $this->apiUri, $filter, $this->headers);
    }
    
    /**
     * Get user by id
     *
     * @param  int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->httpClient->request("GET", "{$this->apiUri}/{$id}", [], $this->headers);
    }
}