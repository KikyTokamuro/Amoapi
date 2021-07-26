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
use Amoapi\Models\CatalogModel;

class AmoapiClient extends AmoapiOAuth
{
    public function __construct(
        string $subdomain, 
        string $clientId, 
        string $clientSecret,  
        string $redirectUri,
        string $configPath = "./tokens.json"
    ){
        parent::__construct($subdomain, $clientId, $clientSecret, $redirectUri, $configPath);
    }

    /**
     * Get leads
     *
     * @return LeadModel
     */
    public function leads(): LeadModel
    {
        $this->checkTokens();
        return new LeadModel($this->apiUri, $this->jsonConfig["access_token"]);
    }
    
    /**
     * Get tasks
     *
     * @return TaskModel
     */
    public function tasks(): TaskModel
    {
        $this->checkTokens();
        return new TaskModel($this->apiUri, $this->jsonConfig["access_token"]);
    }
    
    /**
     * Get contacts
     *
     * @return ContactModel
     */
    public function contacts(): ContactModel
    {
        $this->checkTokens();
        return new ContactModel($this->apiUri, $this->jsonConfig["access_token"]);
    }
    
    /**
     * Get companies
     *
     * @return CompanyModel
     */
    public function companies(): CompanyModel
    {
        $this->checkTokens();
        return new CompanyModel($this->apiUri, $this->jsonConfig["access_token"]);
    }
    
    /**
     * Get customers
     *
     * @return CustomerModel
     */
    public function customers(): CustomerModel
    {
        $this->checkTokens();
        return new CustomerModel($this->apiUri, $this->jsonConfig["access_token"]);
    }
    
    /**
     * Get users
     *
     * @return UserModel
     */
    public function users(): UserModel
    {
        $this->checkTokens();
        return new UserModel($this->apiUri, $this->jsonConfig["access_token"]);
    }
    
    /**
     * Get roles
     *
     * @return RoleModel
     */
    public function roles(): RoleModel
    {
        $this->checkTokens();
        return new RoleModel($this->apiUri, $this->jsonConfig["access_token"]);
    }
    
    /**
     * Get account
     *
     * @return AccountModel
     */
    public function account(): AccountModel
    {
        $this->checkTokens();
        return new AccountModel($this->apiUri, $this->jsonConfig["access_token"]);
    }
    
    /**
     * Get catalogs
     *
     * @return CatalogModel
     */
    public function catalogs(): CatalogModel
    {
        $this->checkTokens();
        return new CatalogModel($this->apiUri, $this->jsonConfig["access_token"]);
    }
}