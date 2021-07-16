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
}