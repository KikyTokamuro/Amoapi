<?php

namespace Amoapi\Services;

use Amoapi\Http\AmoapiHttpClient;

class Service {
    /**
     * @var AmoapiHttpClient
     */
    protected $httpClient;

    /**
     * @var array
     */
    protected $headers = [
        "User-Agent" => "amoCRM/oAuth Client 1.0",
        "Content-Type" => "application/json" 
    ];
}