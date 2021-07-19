<?php

namespace Amoapi\Client;

use Amoapi\OAuth\AmoapiOAuth;
use Amoapi\Models\LeadModel;
use Amoapi\Models\TaskModel;
use Amoapi\Models\ContactModel;
use Amoapi\Models\CompanyModel;

class AmoapiClient extends AmoapiOAuth
{
    public function __construct(
        string $subdomain, 
        string $clientId, 
        string $clientSecret,  
        string $redirectUri
    ){
        parent::__construct($subdomain, $clientId, $clientSecret, $redirectUri);
    }
        
    /**
     * Check tokens for expire
     *
     * @return void
     */
    private function checkTokens(): void
    {
        if (array_key_exists("expire_date", $this->jsonConfig)) {
            if (time() >= $this->jsonConfig["expire_date"]) {
                $this->getTokensByRefreshToken($this->jsonConfig["refresh_token"]);
            }
        }
    }

    /**
     * Get leads
     *
     * @return LeadModel
     */
    public function leads(): LeadModel
    {
        $this->checkTokens();
        return new LeadModel($this->apiUri, $this->accessToken);
    }
    
    /**
     * Get tasks
     *
     * @return TaskModel
     */
    public function tasks(): TaskModel
    {
        $this->checkTokens();
        return new TaskModel($this->apiUri, $this->accessToken);
    }
    
    /**
     * Get contacts
     *
     * @return ContactModel
     */
    public function contacts(): ContactModel
    {
        $this->checkTokens();
        return new ContactModel($this->apiUri, $this->accessToken);
    }
    
    /**
     * Get companies
     *
     * @return CompanyModel
     */
    public function companies(): CompanyModel
    {
        $this->checkTokens();
        return new CompanyModel($this->apiUri, $this->accessToken);
    }
}