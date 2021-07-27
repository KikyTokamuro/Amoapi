<?php

namespace Amoapi\Services;

use Amoapi\Http\AmoapiHttpClient;

class LeadService extends Service
{   
    /**
     * @var string
     */
    private $apiUri = "/api/v4/leads";

    /**
     * LeadService construct
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
     * Get all leads
     *
     * @param  array $filter
     * @return array
     */
    public function getAll(array $filter): array
    {
        return $this->httpClient->request("GET", $this->apiUri, $filter, $this->headers);
    }
    
    /**
     * Get lead by id
     *
     * @param  int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->httpClient->request("GET", "{$this->apiUri}/{$id}", [], $this->headers);
    }
    
    /**
     * Update lead
     *
     * @param  array $leads
     * @return array
     */
    public function update(array $leads): array
    {
        return $this->httpClient->request("PATCH", $this->apiUri, $leads, $this->headers);
    }

    /**
     * Create new lead
     *
     * @param  array $leads
     * @return array
     */
    public function createNew(array $leads): array
    {
        return $this->httpClient->request("POST", $this->apiUri, $leads, $this->headers);
    }
    
    /**
     * Add note to lead by id
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