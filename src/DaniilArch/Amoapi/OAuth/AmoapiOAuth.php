<?php

namespace Amoapi\OAuth;

use Amoapi\Http\AmoapiHttpClient;
use Amoapi\Exception\AmoapiException;

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
    protected $config = "";
    
    /**
     * @var array
     */
    protected $jsonConfig = [
        "access_token" => "",
        "refresh_token" => "",
        "expires_in" => 0,
        "receipt_date" => 0,
        "expires_date" => 0
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
     * @var AmoapiHttpClient
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
        string $redirectUri,
        string $configPath = "./tokens.json"
    ) {
        $this->subdomain = $subdomain;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->redirectUri = $redirectUri;
        $this->apiUri = "{$this->protocol}{$subdomain}.{$this->baseDomain}";
        $this->config = $configPath;

        if (file_exists($this->config)) {
            $configString = file_get_contents($this->config);
            $this->jsonConfig = json_decode($configString, true);
        }

        $this->httpClient = new AmoapiHttpClient($this->apiUri);
    }
             
    /**
     * Check tokens for expire
     *
     * @return void
     */
    public function checkTokens(): void
    {
        if (array_key_exists("expires_date", $this->jsonConfig)) {
            if (
                $this->jsonConfig["expires_date"] != 0
                && time() >= $this->jsonConfig["expires_date"] 
            ) {
                $this->getTokensByRefreshToken($this->jsonConfig["refresh_token"]);
            }
        }
    }

    /**
     * Write config file
     *
     * @param  array $jsonResp
     * @return void
     */
    private function writeConfig(array $jsonResp): void
    {
        $this->jsonConfig = [
            "access_token" => $jsonResp["access_token"],
            "refresh_token" => $jsonResp["refresh_token"],
            "expires_in" => $jsonResp["expires_in"],
            "receipt_date" => time(),
            "expires_date" => time() + $jsonResp["expires_in"]
        ];

        file_put_contents($this->config, json_encode($this->jsonConfig));
    }

    /**
     * Get OAuth tokens by code
     *
     * @param  string $clientCode
     * @return array
     */
    public function getTokensByCode(string $clientCode): array
    {
        try {
            $jsonResp = $this->httpClient->request("POST", $this->tokenUri, [
                "client_id" => $this->clientId,
                "client_secret" => $this->clientSecret,
                "grant_type" => "authorization_code",
                "code" => $clientCode,
                "redirect_uri" => $this->redirectUri
            ], $this->headers);
        } catch (AmoapiException $e) {
            throw new AmoapiException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

        $this->writeConfig($jsonResp);

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
        try {
            $jsonResp = $this->httpClient->request("POST", $this->tokenUri, [
                "client_id" => $this->clientId,
                "client_secret" => $this->clientSecret,
                "grant_type" => "refresh_token",
                "refresh_token" => $refreshToken,
                "redirect_uri" => $this->redirectUri
            ], $this->headers);
        } catch (AmoapiException $e) {
            throw new AmoapiException($e->getMessage(), $e->getCode(), $e->getPrevious());
        }

        $this->writeConfig($jsonResp);

        return $jsonResp;
    }
        
    /**
     * getConfig
     *
     * @return string
     */
    public function getConfig(): string
    {
        return $this->config;
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
        return $this->jsonConfig["access_token"];
    }
    
    /**
     * getRefreshToken
     *
     * @return string
     */
    public function getRefreshToken(): string
    {
        return $this->jsonConfig["refresh_token"];
    }
    
    /**
     * getTokenExpire
     *
     * @return string
     */
    public function getTokenExpire(): string
    {
        return $this->jsonConfig["expires_in"];
    }
}