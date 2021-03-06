<?php

namespace Amoapi\Services;

use Amoapi\Http\AmoapiHttpClient;

/**
 * Class CompanyService
 * 
 * @link https://www.amocrm.ru/developers/content/crm_platform/companies-api Companies.
 * @package Amoapi\Services
 */
class CompanyService extends Service
{
    /**
     * @var string
     */
    private $apiUri = "/api/v4/companies";
    
    /**
     * CompanyService construct
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
     * Get all companies
     *
     * @return array
     */
    public function getAll(array $filter): array
    {
        return $this->httpClient->request("GET", $this->apiUri, $filter, $this->headers);
    }
    
    /**
     * Get company by id
     *
     * @param  int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->httpClient->request("GET", "{$this->apiUri}/{$id}", [], $this->headers);
    }
    
    /**
     * Update company
     *
     * @param  array $leads
     * @return array
     */
    public function update(array $companies): array
    {
        return $this->httpClient->request("PATCH", $this->apiUri, $companies, $this->headers);
    }
    
    /**
     * Create new company
     *
     * @param  array $companies
     * @return array
     */
    public function createNew(array $companies): array
    {
        return $this->httpClient->request("POST", $this->apiUri, $companies, $this->headers);
    }
    
    /**
     * Add note to company by id
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