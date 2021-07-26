<?php

use Amoapi\Exception\AmoapiException;
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
        $this->expectException(AmoapiException::class);

        $this->httpClient->request("POST", "/api/v4/companies", [], [
            "User-Agent" => "amoCRM/oAuth Client 1.0",
            "Content-Type" => "application/json" 
        ]);
    }
}