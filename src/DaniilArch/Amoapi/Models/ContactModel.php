<?php

namespace Amoapi\Models;

use Amoapi\Http\AmoapiHttpClient;

class ContactModel
{
    /**
     * @var Amoapi\Http\AmoapiHttpClient
     */
    private $httpClient;
    
    /**
     * @var string
     */
    private $apiUri = "/api/v4/contacts";

    /**
     * @var array
     */
    protected $headers = [
        "User-Agent" => "amoCRM/oAuth Client 1.0",
        "Content-Type" => "application/json" 
    ];
    
    /**
     * TaskMode construct
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
     * Get all contacts
     *
     * @param  array $filter
     * @return array
     */
    public function getAll(array $filter): array
    {
        return $this->httpClient->request("GET", $this->apiUri, $filter, $this->headers);
    }
    
    /**
     * Get contact by id
     *
     * @param  int $id
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->httpClient->request("GET", "{$this->apiUri}/{$id}", [], $this->headers);
    }
    
    /**
     * Update contact
     *
     * @param  array $leads
     * @return array
     */
    public function update(array $contacts): array
    {
        return $this->httpClient->request("PATCH", $this->apiUri, $contacts, $this->headers);
    }

    /**
     * Create new contact
     *
     * @param  array $leads
     * @return array
     */
    public function createNew(array $contacts): array
    {
        return $this->httpClient->request("POST", $this->apiUri, $contacts, $this->headers);
    }

    /**
     * Add note to contact by id
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