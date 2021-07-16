<?php

namespace Amoapi\OAuth;

use Amoapi\Http\AmoapiHttpClient;

class AmoapiOAuth
{    
    /**
     * @var string
     */
    protected $protocol = "https://";
        
    /**
     * @var string
     */
    protected $baseDomain = "amocrm.ru";
        
    /**
     * @var string
     */
    private $tokenUri = "/oauth2/access_token/";
    
    /**
     * @var array
     */
    protected $headers = [
        "User-Agent" => "amoCRM/oAuth Client 1.0",
        "Content-Type" => "application/json" 
    ];

    /**
     * @var string
     */
    protected $subdomain = "";
        
    /**
     * @var string
     */
    protected $clientId = "";
        
    /**
     * @var string
     */
    protected $clientSecret = "";

    /**
     * @var string
     */
    protected $redirectUri = "";
    
    /**
     * @var string
     */
    protected $apiUri = "";
        
    /**
     * @var string
     */
    protected $accessToken = "";
    
    /**
     * @var string
     */
    protected $refreshToken = "";
       
    /**
     * @var int
     */
    protected $tokenExpire = 0;

    /**
     * @var Amoapi\Http\AmoapiHttpClient
     */
    protected $httpClient;

    /**
     * AmoapiOAuth construct
     *
     * @param  string $subdomain
     * @param  string $clientId
     * @param  string $clientSecret
     * @param  string $redirectUri
     * @return void
     */
    public function __construct(
        string $subdomain, 
        string $clientId, 
        string $clientSecret,  
        string $redirectUri
    ) {
        $this->subdomain = $subdomain;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
        $this->apiUri = "{$this->protocol}{$subdomain}.{$this->baseDomain}";

        $this->httpClient = new AmoapiHttpClient($this->apiUri);
    }
            
    /**
     * Setup tokens from json
     *
     * @param  object $jsonResp
     * @return void
     */
    private function setUpTokens(array $jsonResp): void
    {
        $this->accessToken = $jsonResp["access_token"];
        $this->refreshToken = $jsonResp["refresh_token"];
        $this->tokenExpire = $jsonResp["expires_in"];
    }

    /**
     * Get OAuth tokens by code
     *
     * @param  string $clientCode
     * @return array
     */
    public function getTokensByCode(string $clientCode): array
    {
        $jsonResp = $this->httpClient->request("POST", $this->tokenUri, [
            "client_id" => $this->clientId,
            "client_secret" => $this->clientSecret,
            "grant_type" => "authorization_code",
            "code" => $clientCode,
            "redirect_uri" => $this->redirectUri
        ], $this->headers);

        if (!array_key_exists("error", $jsonResp)) {
            $this->setUpTokens($jsonResp);
        }

        return $jsonResp;
    }
    
    /**
     * Get OAuth tokens by refresh token
     *
     * @param  string $refreshToken
     * @return array
     */
    public function getTokensByRefreshToken(string $refreshToken): array
    {
        $jsonResp = $this->httpClient->request("POST", $this->tokenUri, [
            "client_id" => $this->clientId,
            "client_secret" => $this->clientSecret,
            "grant_type" => "refresh_token",
            "refresh_token" => $refreshToken,
            "redirect_uri" => $this->redirectUri
        ], $this->headers);

        if (!array_key_exists("error", $jsonResp)) {
            $this->setUpTokens($jsonResp);
        }

        return $jsonResp;
    }
    
    /**
     * setAccessToken
     *
     * @param  string $accessToken
     * @return void
     */
    public function setAccessToken(string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }
    
    /**
     * setRefreshToken
     *
     * @param  string $refreshToken
     * @return void
     */
    public function setRefreshToken(string $refreshToken): void
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * getCliendId
     *
     * @return string
     */
    public function getCliendId(): string
    {
        return $this->clientId;
    }
    
    /**
     * getCliendSecret
     *
     * @return string
     */
    public function getCliendSecret(): string
    {
        return $this->clientSecret;
    }

    /**
     * getRedirectUri
     *
     * @return string
     */
    public function getRedirectUri(): string
    {
        return $this->redirectUri;
    }
    
    /**
     * getSubdomain
     *
     * @return string
     */
    public function getSubdomain(): string
    {
        return $this->subdomain;
    }
    
    /**
     * getAccessToken
     *
     * @return string
     */
    public function getAccessToken(): string
    {
        return $this->accessToken;
    }
    
    /**
     * getRefreshToken
     *
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->refreshToken;
    }
    
    /**
     * getTokenExpire
     *
     * @return string
     */
    public function getTokenExpire(): string
    {
        return $this->tokenExpire;
    }
}