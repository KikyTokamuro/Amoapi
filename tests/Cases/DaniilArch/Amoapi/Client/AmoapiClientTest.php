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
        $filter = ["page" => 0, "limit" => 5];

        $this->assertArrayHasKey("error", $this->client->leads()->getAll($filter));
    }

    public function testLeadsGetById(): void
    {
        $this->assertArrayHasKey("error", $this->client->leads()->getById(28091207));
    }

    public function testLeadsUpdate(): void
    {
        $this->assertArrayHasKey("error", $this->client->leads()->update([
            ["name" => "test"]
        ]));
    }

    public function testLeadsCreateNew(): void
    {
        $this->assertArrayHasKey("error", $this->client->leads()->createNew([
            ["name" => "test"]
        ]));
    }

    public function testLeadsAddNoteById(): void
    {
        $this->assertArrayHasKey("error", $this->client->leads()->addNoteById(28091207, "Test note"));
    }

    public function testTasksGetAll(): void
    {
        $filter = ["page" => 0, "limit" => 5];

        $this->assertArrayHasKey("error", $this->client->tasks()->getAll($filter));
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

    public function testContactsGetAll(): void
    { 
        $filter = ["page" => 0, "limit" => 5];

        $this->assertArrayHasKey("error", $this->client->contacts()->getAll($filter));
    }

    public function testContactsGetById(): void
    {
        $this->assertArrayHasKey("error", $this->client->contacts()->getById(28091207));
    }

    public function testContactsUpdate(): void
    {
        $this->assertArrayHasKey("error", $this->client->contacts()->update([
            ["name" => "test"]
        ]));
    }

    public function testContactsCreateNew(): void
    {
        $this->assertArrayHasKey("error", $this->client->contacts()->createNew([
            ["name" => "test"]
        ]));
    }

    public function testContactsAddNoteById(): void
    {
        $this->assertArrayHasKey("error", $this->client->contacts()->addNoteById(28091207, "Test note"));
    }
}