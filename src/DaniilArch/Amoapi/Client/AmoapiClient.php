<?php

namespace Amoapi\Client;

use Amoapi\OAuth\AmoapiOAuth;
use Amoapi\Models\LeadModel;
use Amoapi\Models\TaskModel;
use Amoapi\Models\ContactModel;
use Amoapi\Models\CompanyModel;
use Amoapi\Models\CustomerModel;
use Amoapi\Models\UserModel;
use Amoapi\Models\RoleModel;
use Amoapi\Models\AccountModel;

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
        if (array_key_exists("expires_date", $this->jsonConfig)) {
            if (time() >= $this->jsonConfig["expires_date"]) {
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
    
    /**
     * Get customers
     *
     * @return CustomerModel
     */
    public function customers(): CustomerModel
    {
        $this->checkTokens();
        return new CustomerModel($this->apiUri, $this->accessToken);
    }
    
    /**
     * Get users
     *
     * @return UserModel
     */
    public function users(): UserModel
    {
        $this->checkTokens();
        return new UserModel($this->apiUri, $this->accessToken);
    }
    
    /**
     * Get roles
     *
     * @return RoleModel
     */
    public function roles(): RoleModel
    {
        $this->checkTokens();
        return new RoleModel($this->apiUri, $this->accessToken);
    }
    
    /**
     * Get account
     *
     * @return AccountModel
     */
    public function account(): AccountModel
    {
        $this->checkTokens();
        return new AccountModel($this->apiUri, $this->accessToken);
    }
}