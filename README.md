# Amoapi

Tiny lib for amoCRM API

- [What is implemented](#markdown-header-what-is-implemented)
- [Examples](#markdown-header-examples)

# What is implemented
- [Tokens](#markdown-header-tokens)
    - [Get access and refresh tokens by code](#markdown-header-get-access-and-refresh-tokens-by-code)
    - [Get access and refresh tokens by refresh token](#markdown-header-get-access-and-refresh-tokens-by-refresh-token)
    - [Manual installation of tokens](#markdown-header-manual-installation-of-tokens)
- [Leads](#markdown-header-leads)
    - [Get all leads](#markdown-header-get-5-leads-from-1-page)
    - [Get lead by id](#markdown-header-get-lead-by-id)
    - [Update lead](#markdown-header-update-lead)
    - [Create new lead](#markdown-header-create-new-lead)
    - [Add note to lead by id](#markdown-header-add-note-to-lead-by-id)
- [Tasks](#markdown-header-tasks)
    - [Get all tasks](#markdown-header-get-50-tasks-from-1-page)
    - [Create task for others entity](#markdown-header-create-task-for-others-entity)
- [Contacts](#markdown-header-contacts)
    - [Get all contacts](#markdown-header-get-all-contacts)
    - [Get contact by id](#markdown-header-get-contact-by-id)
    - [Update contact](#markdown-header-update-contact)
    - [Create new contact](#markdown-header-create-new-contact)
    - [Add note to contact by id](#markdown-header-add-note-to-contact-by-id)
- [Companies](#markdown-header-companies)
    - [Get all companies](#markdown-header-get-all-companies)
    - [Get company by id](#markdown-header-get-company-by-id)
    - [Update company](#markdown-header-update-company)
    - [Create new company](#markdown-header-create-new-company)
    - [Add note to company by id](#markdown-header-add-note-to-company-by-id)

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

### Manual installation of tokens
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

$client->setRefreshToken("refresh_token");
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

## Companies
### Get all companies
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

$companies = $client->companies()->getAll($filter); // array

if (!array_key_exists("error", $companies)) {
    print_r($companies);
}
```

### Get company by id
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

$company = $client->companies()->getById(45607457); // array

if (!array_key_exists("error", $company)) {
    print_r($company);
}
```

### Update company
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");
$company = $client->companies()->getById(45607457); // array

if (!array_key_exists("error", $company)) {
    $company["name"] = "update company";

    print_r($client->companies()->update([$contact])); // array
}
```

### Create new company
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

$company = [["name" => "new company"]];

print_r(client->companies()->createNew($company)); // array
```

### Add note to company by id
```php
use Amoapi\Client\AmoapiClient;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

$client->setAccessToken("access_token");

print_r(client->companies()->addNoteById(45607457, "Test note"))
```