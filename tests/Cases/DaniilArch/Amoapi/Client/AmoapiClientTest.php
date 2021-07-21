<?php

use Amoapi\Client\AmoapiClient;
use PHPUnit\Framework\TestCase;

class AmoapiClientTest extends TestCase
{
    private $client;

    public function setUp(): void
    {
        $this->client = new AmoapiClient(
            "dlatestov", 
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
        $lead = $this->client->leads()->getById(28091207);
        $lead["name"] = "test";

        $this->assertArrayHasKey("error", $this->client->leads()->update([$lead]));
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
        $contact = $this->client->contacts()->getById(28091207);
        $contact["name"] = "test";

        $this->assertArrayHasKey("error", $this->client->contacts()->update([$contact]));
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

    public function testCompaniesGetAll(): void
    {
        $filter = ["page" => 0, "limit" => 5];

        $this->assertArrayHasKey("error", $this->client->companies()->getAll($filter));
    }

    public function testCompaniesGetById(): void
    {
        $this->assertArrayHasKey("error", $this->client->companies()->getById(45607457));
    }

    public function testCompaniesUpdate(): void
    {
        $company = $this->client->companies()->getById(45607457);
        $company["name"] = "test";

        $this->assertArrayHasKey("error", $this->client->companies()->update([$company]));
    }

    public function testCompaniesCreateNew(): void
    {
        $this->assertArrayHasKey("error", $this->client->companies()->createNew([
            ["name" => "test company"]
        ]));
    }

    public function testCompaniesAddNoteById(): void
    {
        $this->assertArrayHasKey("error", $this->client->companies()->addNoteById(45607457, "Test note"));
    }

    public function testCustomersGetAll(): void
    {
        $filter = ["page" => 0, "limit" => 5];

        $this->assertArrayHasKey("error", $this->client->contacts()->getAll($filter));
    }

    public function testCustomersGetById(): void
    {
        $this->assertArrayHasKey("error", $this->client->customers()->getById(183435));
    }

    public function testCustomersUpdate(): void
    {
        $customer = $this->client->customers()->getById(183435);
        $customer["name"] = "new";

        $this->assertArrayHasKey("error", $this->client->customers()->update([$customer]));
    }

    public function testCustomersCreateNew(): void
    {
        $this->assertArrayHasKey("error", $this->client->customers()->createNew([
            ["name" => "from api"]
        ]));
    }

    public function testCustomersAddNoteById(): void
    {
        $this->assertArrayHasKey("error", $this->client->customers()->addNoteById(183665, "Test note"));
    }

    public function testUsersGetAll(): void
    {
        $filter = ["page" => 0, "limit" => 5];

        $this->assertArrayHasKey("error", $this->client->users()->getAll($filter));
    }

    public function testUsersGetById(): void
    {
        $this->assertArrayHasKey("error", $this->client->users()->getById(6928032));
    }

    public function testRolesGetAllRoles(): void
    {
        $filter = ["page" => 0, "limit" => 5];

        $this->assertArrayHasKey("error", $this->client->roles()->getAllRoles($filter));
    }

    public function testRolesGetRoleById(): void
    {
        $this->assertArrayHasKey("error", $this->client->roles()->getRoleById(56320));
    }
}