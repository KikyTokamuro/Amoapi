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
     * Get leads
     *
     * @return LeadModel
     */
    public function leads(): LeadModel
    {
        return new LeadModel($this->apiUri, $this->accessToken);
    }
    
    /**
     * Get tasks
     *
     * @return TaskModel
     */
    public function tasks(): TaskModel
    {
        return new TaskModel($this->apiUri, $this->accessToken);
    }
    
    /**
     * Get contacts
     *
     * @return ContactModel
     */
    public function contacts(): ContactModel
    {
        return new ContactModel($this->apiUri, $this->accessToken);
    }
    
    /**
     * Get companies
     *
     * @return CompanyModel
     */
    public function companies(): CompanyModel
    {
        return new CompanyModel($this->apiUri, $this->accessToken);
    }
}