<?php

namespace Amoapi\Services;

use Amoapi\Http\AmoapiHttpClient;

/**
 * Class TaskService
 * 
 * @link https://www.amocrm.ru/developers/content/crm_platform/tasks-api Tasks.
 * @package Amoapi\Services
 */
class TaskService extends Service
{
    /**
     * @var string
     */
    private $apiUri = "/api/v4/tasks";

    /**
     * TaskService construct
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
     * Get all tasks
     *
     * @param  array $filter
     * @return array
     */
    public function getAll(array $filter): array
    {
        return $this->httpClient->request("GET", $this->apiUri, $filter, $this->headers);
    }

    /**
     * Create new task
     *
     * @param  array $task
     * @return array
     */
    public function createNew(array $task): array
    {
        return $this->httpClient->request("POST", $this->apiUri, [$task], $this->headers);
    }
}