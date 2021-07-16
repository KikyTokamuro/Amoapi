# Amoapi

Tiny lib for amoCRM API

- [What is implemented](#what-is-implemented)
- [Examples](#examples)

# What is implemented
- Tokens
    - [Get access and refresh tokens by code](#get-access-and-refresh-tokens-by-code)
    - [Get access and refresh tokens by refresh token](#get-access-and-refresh-tokens-by-refresh-token)
- Leads
    - [Get all leads by page and limit](#get-5-leads-from-1-page)
    - [Get lead by id](#get-lead-by-id)
    - [Update lead](#update-lead)
    - [Create new lead](#create-new-lead)
    - [Add note to lead by id](#add-note-to-lead-by-id)

# Examples

## Tokens
### Get access and refresh tokens by code
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$tokens = $client->getTokensByCode("code"); // array

if (!array_key_exists("error", $tokens)) {
    print_r($tokens);
}
```

### Get access and refresh tokens by refresh token
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$tokens = $client->getTokensByRefreshToken("refreshToken"); // array

if (!array_key_exists("error", $tokens)) {
    print_r($tokens);
}
```

## Leads
### Get 5 leads from 1 page
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

$leads = $client->leads()->getAll(1, 5) // array

if (!array_key_exists("error", $leads)) {
    print_r($leads);
}
```

### Get lead by id
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

$lead = $client->leads()->getById(28091207) // array

if (!array_key_exists("error", $lead)) {
    print_r($lead);
}
```

### Update lead
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");
$lead = $client->leads()->getById(28091207) // array

if (!array_key_exists("error", $lead)) {
    $lead["name"] = "new name";
    $lead["price"] = 1111;

    print_r($this->client->leads()->update([$lead])); // array
}
```

### Create new lead
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

$lead = [
    [
        "name" => "new lead",
        "price" => 1111,
    ]
];

print_r($this->client->leads()->update([$lead])); // array
```

### Add note to lead by id
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

print_r($this->client->leads()->addNoteById(28091207, "Test note"))
```