<?php

use Amoapi\Exception\AmoapiException;
use Amoapi\OAuth\AmoapiOAuth;
use PHPUnit\Framework\TestCase;

class AmoapiOAuthTest extends TestCase
{
    private $oauth;

    public function setUp(): void
    {
        $this->oauth = new AmoapiOAuth("subdomain", "id", "secret", "uri");
    }

    public function testGetSubdomain(): void
    {
        $this->assertEquals("subdomain", $this->oauth->getSubdomain());
    }

    public function testGetClientId(): void
    {
        $this->assertEquals("id", $this->oauth->getCliendId());
    }

    public function testGetClientSecret(): void
    {
        $this->assertEquals("secret", $this->oauth->getCliendSecret());
    }

    public function testGetRedirectUri(): void
    {
        $this->assertEquals("uri", $this->oauth->getRedirectUri());
    }

    public function testGetTokensByCode(): void
    {
        $this->expectException(AmoapiException::class);
        $this->oauth->getTokensByCode("testcode");
    }

    public function testGetTokensByRefreshToken(): void
    {
        $this->expectException(AmoapiException::class);
        $this->oauth->getTokensByRefreshToken("testRefreshToken");
    }

    public function testGetAccessToken(): void
    {
        $this->assertEquals("", $this->oauth->getAccessToken());
    }

    public function testGetRefreshToken(): void
    {
        $this->assertEquals("", $this->oauth->getRefreshToken());
    }

    public function testGetTokenExpire(): void
    {
        $this->assertEquals(0, $this->oauth->getTokenExpire());
    }
}