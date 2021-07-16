<?php

namespace Amoapi\Client;

use Amoapi\OAuth\AmoapiOAuth;
use Amoapi\Models\LeadModel;

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

    public function leads(): LeadModel
    {
        return new LeadModel($this->apiUri, $this->accessToken);
    }
}