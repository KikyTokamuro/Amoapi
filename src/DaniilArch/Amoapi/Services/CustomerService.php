<?php

namespace Amoapi\Services;

use Amoapi\Http\AmoapiHttpClient;

/**
 * Class CustomerService
 * 
 * @link https://www.amocrm.ru/developers/content/crm_platform/customers-api Customers.
 * @package Amoapi\Services
 */
class CustomerService extends Service
{
    /**
     * @var string
     */
    private $apiUri = "/api/v4/customers";

    /**
     * CustomerService construct
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
     * Get all customers
     *
     * @param  array $filter
     * @return array
     */
    public function getAll(array $filter): array
    {
        return $this->httpClient->request("GET", $this->apiUri, $filter, $this->headers);
    }
    
    /**
     * Get customer by id
     *
     * @param  int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->httpClient->request("GET", "{$this->apiUri}/{$id}", [], $this->headers);
    }
    
    /**
     * Update customer
     *
     * @param  array $ustomers
     * @return array
     */
    public function update(array $customers): array
    {
        return $this->httpClient->request("PATCH", $this->apiUri, $customers, $this->headers);
    }

    /**
     * Create new customer
     *
     * @param  array $customers
     * @return array
     */
    public function createNew(array $customers): array
    {
        return $this->httpClient->request("POST", $this->apiUri, $customers, $this->headers);
    }
    
    /**
     * Add note to customer by id
     *
     * @param  int $id
     * @param  array $note
     * @return array
     */
    public function addNoteById(int $id, array $note): array
    {
        return $this->httpClient->request("POST", "{$this->apiUri}/{$id}/notes", [$note], $this->headers);
    }
}