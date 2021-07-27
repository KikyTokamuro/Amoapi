<?php

namespace Amoapi\Client;

use Amoapi\OAuth\AmoapiOAuth;
use Amoapi\Services\LeadService;
use Amoapi\Services\TaskService;
use Amoapi\Services\ContactService;
use Amoapi\Services\CompanyService;
use Amoapi\Services\CustomerService;
use Amoapi\Services\UserService;
use Amoapi\Services\RoleService;
use Amoapi\Services\AccountService;
use Amoapi\Services\CatalogService;
use Amoapi\Services\Service;

class AmoapiClient extends AmoapiOAuth
{    
    /**
     * AmoapiClient construct
     *
     * @return void
     */
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
     * Get service by name
     *
     * @param  Service $name
     * @return mixed
     */
    private function getService(string $name): Service
    {
        $this->checkTokens();

        switch ($name) {
            case "leads":
                return new LeadService($this->apiUri, $this->jsonConfig["access_token"]);
            case "tasks":
                return new TaskService($this->apiUri, $this->jsonConfig["access_token"]);
            case "contacts":
                return new ContactService($this->apiUri, $this->jsonConfig["access_token"]);
            case "companies":
                return new CompanyService($this->apiUri, $this->jsonConfig["access_token"]);
            case "customers":
                return new CustomerService($this->apiUri, $this->jsonConfig["access_token"]);
            case "users":
                return new UserService($this->apiUri, $this->jsonConfig["access_token"]);
            case "roles":
                return new RoleService($this->apiUri, $this->jsonConfig["access_token"]);
            case "account":
                return new AccountService($this->apiUri, $this->jsonConfig["access_token"]);
            case "catalogs":
                return new CatalogService($this->apiUri, $this->jsonConfig["access_token"]);
        }
    }

    /**
     * Get leads
     *
     * @return LeadService
     */
    public function leads(): LeadService
    {
        return $this->getService("leads");
    }
    
    /**
     * Get tasks
     *
     * @return TaskService
     */
    public function tasks(): TaskService
    {
        return $this->getService("tasks");
    }
    
    /**
     * Get contacts
     *
     * @return ContactService
     */
    public function contacts(): ContactService
    {
        return $this->getService("contacts");
    }
    
    /**
     * Get companies
     *
     * @return CompanyService
     */
    public function companies(): CompanyService
    {
        return $this->getService("companies");
    }
    
    /**
     * Get customers
     *
     * @return CustomerService
     */
    public function customers(): CustomerService
    {
        return $this->getService("customers");
    }
    
    /**
     * Get users
     *
     * @return UserService
     */
    public function users(): UserService
    {
        return $this->getService("users");
    }
    
    /**
     * Get roles
     *
     * @return RoleService
     */
    public function roles(): RoleService
    {
        return $this->getService("roles");
    }
    
    /**
     * Get account
     *
     * @return AccountService
     */
    public function account(): AccountService
    {
        return $this->getService("account");
    }
    
    /**
     * Get catalogs
     *
     * @return CatalogService
     */
    public function catalogs(): CatalogService
    {
        return $this->getService("catalogs");
    }
}