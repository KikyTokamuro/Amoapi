<?php

use Amoapi\Exception\AmoapiException;
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
        $this->expectException(AmoapiException::class);
        $filter = ["page" => 0, "limit" => 5];
        $this->client->leads()->getAll($filter);
    }

    public function testLeadsGetById(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->leads()->getById(28091207);
    }

    public function testLeadsUpdate(): void
    {
        $this->expectException(AmoapiException::class);
        $lead = $this->client->leads()->getById(28091207);
        $lead["name"] = "test";
        $this->client->leads()->update([$lead]);
    }

    public function testLeadsCreateNew(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->leads()->createNew([["name" => "test"]]);
    }

    public function testLeadsAddNoteById(): void
    {
        $this->expectException(AmoapiException::class);
        $note = [
            "note_type" => "common",
            "text" => "test note"
        ];
        $this->client->leads()->addNoteById(28091207, $note);
    }

    public function testTasksGetAll(): void
    {
        $this->expectException(AmoapiException::class);
        $filter = ["page" => 0, "limit" => 5];
        $this->client->tasks()->getAll($filter);
    }

    public function testTasksCreateNew(): void
    {
        $this->expectException(AmoapiException::class);
        $task = [
            "task_type_id" => 1,
            "text" => "Test task for 28144531",
            "complete_till" => 1588885140,
            "entity_id" => 28144531,
            "entity_type" => "leads",
            "request_id" => "example"
        ];
        $this->client->tasks()->createNew($task);
    }

    public function testContactsGetAll(): void
    {
        $this->expectException(AmoapiException::class); 
        $filter = ["page" => 0, "limit" => 5];
        $this->client->contacts()->getAll($filter);
    }

    public function testContactsGetById(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->contacts()->getById(28091207);
    }

    public function testContactsUpdate(): void
    {
        $this->expectException(AmoapiException::class);
        $contact = $this->client->contacts()->getById(28091207);
        $contact["name"] = "test";
        $this->client->contacts()->update([$contact]);
    }

    public function testContactsCreateNew(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->contacts()->createNew([["name" => "test"]]);
    }

    public function testContactsAddNoteById(): void
    {
        $this->expectException(AmoapiException::class);
        $note = [
            "note_type" => "common",
            "text" => "test note"
        ];
        $this->client->contacts()->addNoteById(28091207, $note);
    }

    public function testCompaniesGetAll(): void
    {
        $this->expectException(AmoapiException::class);
        $filter = ["page" => 0, "limit" => 5];
        $this->client->companies()->getAll($filter);
    }

    public function testCompaniesGetById(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->companies()->getById(45607457);
    }

    public function testCompaniesUpdate(): void
    {
        $this->expectException(AmoapiException::class);
        $company = $this->client->companies()->getById(45607457);
        $company["name"] = "test";
        $this->client->companies()->update([$company]);
    }

    public function testCompaniesCreateNew(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->companies()->createNew([["name" => "test company"]]);
    }

    public function testCompaniesAddNoteById(): void
    {
        $this->expectException(AmoapiException::class);
        $note = [
            "note_type" => "common",
            "text" => "test note"
        ];
        $this->client->companies()->addNoteById(45607457, $note);
    }

    public function testCustomersGetAll(): void
    {
        $this->expectException(AmoapiException::class);
        $filter = ["page" => 0, "limit" => 5];
        $this->client->contacts()->getAll($filter);
    }

    public function testCustomersGetById(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->customers()->getById(183435);
    }

    public function testCustomersUpdate(): void
    {
        $this->expectException(AmoapiException::class);
        $customer = $this->client->customers()->getById(183435);
        $customer["name"] = "new";
        $this->client->customers()->update([$customer]);
    }

    public function testCustomersCreateNew(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->customers()->createNew([["name" => "from api"]]);
    }

    public function testCustomersAddNoteById(): void
    {
        $this->expectException(AmoapiException::class);
        $note = [
            "note_type" => "common",
            "text" => "test note"
        ];
        $this->client->customers()->addNoteById(183665, $note);
    }

    public function testUsersGetAll(): void
    {
        $this->expectException(AmoapiException::class);
        $filter = ["page" => 0, "limit" => 5];
        $this->client->users()->getAll($filter);
    }

    public function testUsersGetById(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->users()->getById(6928032);
    }

    public function testRolesGetAllRoles(): void
    {
        $this->expectException(AmoapiException::class);
        $filter = ["page" => 0, "limit" => 5];
        $this->client->roles()->getAllRoles($filter);
    }

    public function testRolesGetRoleById(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->roles()->getRoleById(56320);
    }

    public function testAccountGetInfo(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->account()->getInfo();
    }

    public function testCatalogsGetAll(): void
    {
        $this->expectException(AmoapiException::class);
        $filter = ["page" => 0, "limit" => 5];
        $this->client->catalogs()->getAll($filter);
    }

    public function testCatalogsGetById(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->catalogs()->getById(2419);
    }

    public function testCatalogsCreateNew(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->catalogs()->createNew([["name" => "new catalog from api"]]);
    }

    public function testCatalogsUpdate(): void
    {
        $this->expectException(AmoapiException::class);
        $catalog = $this->client->catalogs()->getById(2419);
        $catalog["name"] = "new name";
        $this->client->catalogs()->update([$catalog]);
    }

    public function testCatalogsGetAllElements(): void
    {
        $this->expectException(AmoapiException::class);
        $filter = ["page" => 0, "limit" => 5];
        $this->client->catalogs()->getAllElements(1989, $filter);
    }

    public function testCatalogsGetElementById(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->catalogs()->getElementById(1989, 953789);
    }

    public function testCatalogsAddNewElement(): void
    {
        $this->expectException(AmoapiException::class);
        $this->client->catalogs()->addNewElement(1989, [["name" => "New element"]]);
    }

    public function testCatalogsUpdateElement(): void
    {
        $this->expectException(AmoapiException::class);
        $element = $this->client->catalogs()->getElementById(1989, 953789);
        $element["name"] = "new name";
        $this->client->catalogs()->updateElement(1989, [$element]);
    }
}