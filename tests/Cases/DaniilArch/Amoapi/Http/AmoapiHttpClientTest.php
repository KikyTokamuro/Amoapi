<?php

use Amoapi\Http\AmoapiHttpClient;
use PHPUnit\Framework\TestCase;

class AmoapiHttpClientTest extends TestCase
{
    private $httpClient;

    public function setUp(): void
    {
        $this->httpClient = new AmoapiHttpClient("http://dlatestov.amocrm.ru/");
    }

    public function testPost(): void
    {
        $this->assertArrayHasKey("error", $this->httpClient->request("POST", "/api/v4/companies", [], []));
    }
}