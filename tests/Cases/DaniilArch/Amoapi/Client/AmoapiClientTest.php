<?php

use Amoapi\Client\AmoapiClient;
use PHPUnit\Framework\TestCase;

class AmoapiClientTest extends TestCase
{
    private $client;

    public function setUp(): void
    {
        $this->client = new AmoapiClient(
            "domain", 
            "id",
            "secret",
            "redirect_uri",
        );
    }

    public function testLeadsGetAll(): void
    {
        $this->assertArrayHasKey("error", $this->client->leads()->getAll(1, 5));
    }

    public function testLeadsGetById(): void
    {
        $this->assertArrayHasKey("error", $this->client->leads()->getById(28091207));
    }

    public function testLeadsCreateNewOrUpdate(): void
    {
        $this->assertArrayHasKey("error", $this->client->leads()->update([
            [
                "name" => "test",
            ]
        ]));
    }

    public function testLeadsAddNoteById(): void
    {
        $this->assertArrayHasKey("error", $this->client->leads()->addNoteById(28091207, "Test note"));
    }

    public function testTasksGetAll(): void
    {
        $this->assertArrayHasKey("error", $this->client->tasks()->getAll(0, 50));
    }

    public function testTasksCreateNew(): void
    {
        $task = [
            "task_type_id" => 1,
            "text" => "Test task for 28144531",
            "complete_till" => 1588885140,
            "entity_id" => 28144531,
            "entity_type" => "leads",
            "request_id" => "example"
        ];

        $this->assertArrayHasKey("error", $this->client->tasks()->createNew($task));
    }
}