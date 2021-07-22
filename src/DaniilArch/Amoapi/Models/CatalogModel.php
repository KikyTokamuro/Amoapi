<?php

namespace Amoapi\Models;

use Amoapi\Http\AmoapiHttpClient;

class CatalogModel
{
    /**
     * @var Amoapi\Http\AmoapiHttpClient
     */
    private $httpClient;
    
    /**
     * @var string
     */
    private $apiUri = "/api/v4/catalogs";

    /**
     * @var array
     */
    protected $headers = [
        "User-Agent" => "amoCRM/oAuth Client 1.0",
        "Content-Type" => "application/json" 
    ];

    /**
     * CatalogModel construct
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
     * Get all catalogs
     *
     * @param  array $filter
     * @return array
     */
    public function getAll(array $filter): array
    {
        return $this->httpClient->request("GET", $this->apiUri, $filter, $this->headers);
    }

    /**
     * Get catalog by id
     *
     * @param  int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->httpClient->request("GET", "{$this->apiUri}/{$id}", [], $this->headers);
    }
    
    /**
     * Create new catalog
     *
     * @param  array $catalogs
     * @return array
     */
    public function createNew(array $catalogs): array
    {
        return $this->httpClient->request("POST", $this->apiUri, $catalogs, $this->headers);
    }
    
    /**
     * Update catalog
     *
     * @param  array $catalogs
     * @return array
     */
    public function update(array $catalogs): array
    {
        return $this->httpClient->request("PATCH", $this->apiUri, $catalogs, $this->headers);
    }
    
    /**
     * Get all catalog elements
     *
     * @param  int $catalogId
     * @return array
     */
    public function getAllElements(int $catalogId, array $filter): array
    {
        return $this->httpClient->request("GET", "{$this->apiUri}/{$catalogId}/elements", $filter, $this->headers);
    }
    
    /**
     * Get catalog element by id
     *
     * @param  int $catalogId
     * @param  int $elementId
     * @return array
     */
    public function getElementById(int $catalogId, int $elementId): array
    {
        return $this->httpClient->request("GET", "{$this->apiUri}/{$catalogId}/elements/{$elementId}", [], $this->headers);
    }
    
    /**
     * Add new element to catalog
     *
     * @param  int $catalogId
     * @param  array $elements
     * @return array
     */
    public function addNewElement(int $catalogId, array $elements): array
    {
        return $this->httpClient->request("POST", "{$this->apiUri}/{$catalogId}/elements", $elements, $this->headers);
    }
    
    /**
     * Update catalog element
     *
     * @param  int $catalogId
     * @param  array $elements
     * @return array
     */
    public function updateElement(int $catalogId, array $elements): array
    {
        return $this->httpClient->request("PATCH", "{$this->apiUri}/{$catalogId}/elements", $elements, $this->headers);
    }
}