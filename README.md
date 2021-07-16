# Amoapi

Tiny lib for amoCRM API

- [What is implemented](#what-is-implemented)
- [Examples](#examples)

# What is implemented
- [Tokens](#tokens)
    - [Get access and refresh tokens by code](#get-access-and-refresh-tokens-by-code)
    - [Get access and refresh tokens by refresh token](#get-access-and-refresh-tokens-by-refresh-token)
- [Leads](#leads)
    - [Get all leads](#get-5-leads-from-1-page)
    - [Get lead by id](#get-lead-by-id)
    - [Update lead](#update-lead)
    - [Create new lead](#create-new-lead)
    - [Add note to lead by id](#add-note-to-lead-by-id)
- [Tasks](#tasks)
    - [Get all tasks](#get-50-tasks-from-1-page)
    - [Create task for others entity](#create-task-for-others-entity)
- [Contacts](#contacts)
    - [Get all contacts](#get-all-contacts)
    - [Get contact by id](#get-contact-by-id)
    - [Update contact](#update-contact)
    - [Create new contact](#create-new-contact)
    - [Add note to contact by id](#add-note-to-contact-by-id)

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

$filter = [
    "page" => 0,
    "limit" => 5
];

$leads = $client->leads()->getAll($filter); // array

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

$lead = $client->leads()->getById(28091207); // array

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
$lead = $client->leads()->getById(28091207); // array

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

$lead = [["name" => "new lead", "price" => 1111]];

print_r(client->leads()->createNew($lead)); // array
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

print_r(client->leads()->addNoteById(28091207, "Test note"))
```

## Tasks
### Get 50 tasks from 1 page
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

$filter = [
    "page" => 0,
    "limit" => 50 
];

$tasks = $client->tasks()->getAll($filter); // array

if (!array_key_exists("error", $tasks)) {
    print_r($tasks);
}
```

### Create task for others entity
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

$task = [
    "task_type_id" => 1,
    "text" => "Test task for 28144531",
    "complete_till" => 1588885140,
    "entity_id" => 28144531,
    "entity_type" => "leads",
    "request_id" => "example"
];

print_r(client->tasks()->createNew($task));
```

## Contacts
### Get all contacts
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

$filter = [
    "page" => 0,
    "limit" => 50
];

$contacts = $client->contacts()->getAll($filter); // array

if (!array_key_exists("error", $contacts)) {
    print_r($contacts);
}
```

### Get contact by id
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

$contact = $client->contacts()->getById(45552657); // array

if (!array_key_exists("error", $contact)) {
    print_r($contact);
}
```

### Update contact
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");
$contact = $client->contact()->getById(28091207); // array

if (!array_key_exists("error", $contact)) {
    $contact["name"] = "new name";
    $contact["price"] = 1111;

    print_r($client->contacts()->update([$contact])); // array
}
```

### Create new contact
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

$contact = [["name" => "new contact"]];

print_r(client->contacts()->createNew($contact)); // array
```

### Add note to contact by id
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

print_r(client->contacts()->addNoteById(28091207, "Test note"))
```