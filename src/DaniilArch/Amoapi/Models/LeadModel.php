<?php

namespace Amoapi\Models;

use Amoapi\Http\AmoapiHttpClient;

class LeadModel
{    
    /**
     * @var Amoapi\Http\AmoapiHttpClient
     */
    private $httpClient;
    
    /**
     * @var string
     */
    private $apiUri = "/api/v4/leads";

    /**
     * @var array
     */
    protected $headers = [
        "User-Agent" => "amoCRM/oAuth Client 1.0",
        "Content-Type" => "application/json" 
    ];
    
    /**
     * LeadModel construct
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
     * @return array
     */
    public function getAll(int $page, int $limit): array
    {
        $jsonResp = $this->httpClient->get($this->apiUri, [
            "page" => $page,
            "limit" => $limit,
        ], $this->headers);

        return $jsonResp;
    }
    
    /**
     * Get lead by id
     *
     * @param  int $id
     * @return array
     */
    public function getById(int $id): array
    {
        $jsonResp = $this->httpClient->get("{$this->apiUri}/{$id}", [], $this->headers);

        return $jsonResp;
    }
    
    /**
     * Update lead
     *
     * @param  array $leads
     * @return array
     */
    public function update(array $leads): array
    {
        $jsonResp = $this->httpClient->post($this->apiUri, $leads, $this->headers);

        return $jsonResp;
    }
    
    /**
     * Add note to lead by id
     *
     * @param  int $id
     * @param  string $text
     * @param  string $type
     * @return array
     */
    public function addNoteById(int $id, string $text, string $type = "common"): array
    {
        $jsonResp = $this->httpClient->post("{$this->apiUri}/{$id}/notes", [[
            "text" => $text,
            "note_type" => $type
        ]], $this->headers);

        return $jsonResp;
    }
}