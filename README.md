# Amoapi

Tiny lib for [amoCRM API](https://www.amocrm.ru/developers/content/crm_platform/api-reference)

- [What is implemented](#markdown-header-what-is-implemented)
- [Examples](#markdown-header-examples)

# What is implemented
- [Tokens](#markdown-header-tokens)
    - [Get access and refresh tokens by code](#markdown-header-get-access-and-refresh-tokens-by-code)
    - [Get access and refresh tokens by refresh token](#markdown-header-get-access-and-refresh-tokens-by-refresh-token)
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
- [Customers](#markdown-header-customers)
    - [Get all customers](#markdown-header-get-all-customers)
    - [Get customer by id](#markdown-header-get-customer-by-id)
    - [Update customer](#markdown-header-update-customer)
    - [Create new customer](#markdown-header-create-new-customer)
    - [Add note to customer by id](#markdown-header-add-note-to-customer-by-id)
- [Users](#markdown-header-users)
    - [Get all users](#markdown-header-get-all-users)
    - [Get user by id](#markdown-header-get-user-by-id)
- [Roles](#markdown-header-roles)
    - [Get all users roles](#markdown-header-get-all-users-roles)
    - [Get role by id](#markdown-header-get-role-by-id)
- [Account](#markdown-header-account)
    - [Get account info](#markdown-header-get-account-info)
- [Catalogs](#markdown-header-catalogs)
    - [Get all catalogs](#markdown-header-get-all-catalogs)
    - [Get catalog by id](#markdown-header-get-catalog-by-id)
    - [Create new catalog](#markdown-header-create-new-catalog)
    - [Update catalog](#markdown-header-update-catalog)
    - [Get all catalog elements](#markdown-header-get-all-catalog-elements)
    - [Get catalog element by id](#markdown-header-get-catalog-element-by-id)
    - [Add new element to catalog](#markdown-header-add-new-element-to-catalog)
    - [Update catalog element](#markdown-header-update-catalog-element)

# Examples

## Tokens

When receiving tokens, they are written to "tokens.json".

Which can be set via:
```php
$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
    "tokens.json" // <---
);
```

tokens.json:
```json
{
    "access_token":"access_token",
    "refresh_token":"refresh_token",
    "expires_in":86400,
    "receipt_date":1626683782,
    "expires_date":1626770182
}
```

### Get access and refresh tokens by code
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $tokens = $client->getTokensByCode("code"); // array
    print_r($tokens);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Get access and refresh tokens by refresh token
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $tokens = $client->getTokensByRefreshToken("refreshToken"); // array
    print_r($tokens);
} catch (AmoapiException $e) {
    echo $e;
}
```

## Leads
### Get 5 leads from 1 page
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$filter = [
    "page" => 0,
    "limit" => 5
];

try {
    $leads = $client->leads()->getAll($filter); // array
    print_r($leads);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Get lead by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $lead = $client->leads()->getById(28091207); // array
} catch (AmoapiException $e) {
    echo $e;
}

```

### Update lead
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $lead = $client->leads()->getById(28091207); // array
} catch (AmoapiException $e) {
    echo $e;
}

$lead["name"] = "new name";
$lead["price"] = 1111;

try {
    print_r($client->leads()->update([$lead])); // array
} catch (AmoapiException $e) {
    echo $e;
}
```

### Create new lead
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$lead = [["name" => "new lead", "price" => 1111]];

try {
    print_r($client->leads()->createNew($lead)); // array
} catch (AmoapiException $e) {
    echo $e;
}
```

### Add note to lead by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$note = [
    "note_type" => "common",
    "text" => "test note"
];

try {
    print_r($client->leads()->addNoteById(28091207, $note));
} catch (AmoapiException $e) {
    echo $e;
}
```

## Tasks
### Get 50 tasks from 1 page
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$filter = [
    "page" => 0,
    "limit" => 50 
];

try {
    $tasks = $client->tasks()->getAll($filter); // array
    print_r($tasks);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Create task for others entity
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$task = [
    "task_type_id" => 1,
    "text" => "Test task for 28144531",
    "complete_till" => 1588885140,
    "entity_id" => 28144531,
    "entity_type" => "leads",
    "request_id" => "example"
];

try {
    print_r($client->tasks()->createNew($task));
} catch (AmoapiException $e) {
    echo $e;
}
```

## Contacts
### Get all contacts
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$filter = [
    "page" => 0,
    "limit" => 50
];

try {
    $contacts = $client->contacts()->getAll($filter); // array
    print_r($contacts);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Get contact by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $contact = $client->contacts()->getById(45552657); // array
    print_r($contact);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Update contact
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $contact = $client->contact()->getById(28091207); // array
} catch (AmoapiException $e) {
    echo $e;
}

$contact["name"] = "new name";
$contact["price"] = 1111;

try {
    print_r($client->contacts()->update([$contact])); // array
} catch (AmoapiException $e) {
    echo $e;
}
```

### Create new contact
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$contact = [["name" => "new contact"]];

try {
    print_r($client->contacts()->createNew($contact)); // array
} catch (AmoapiException $e) {
    echo $e;
}
```

### Add note to contact by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$note = [
    "note_type" => "common",
    "text" => "test note"
];

try {
    print_r($client->contacts()->addNoteById(28091207, $note))
} catch (AmoapiException $e) {
    echo $e;
}
```

## Companies
### Get all companies
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$filter = [
    "page" => 0,
    "limit" => 50
];

try {
    $companies = $client->companies()->getAll($filter); // array;
    print_r($companies);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Get company by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $company = $client->companies()->getById(45607457); // array
    print_r($company);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Update company
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $company = $client->companies()->getById(45607457); // array
} catch (AmoapiException $e) {
    echo $e;
}

$company["name"] = "update company";

try {
    print_r($client->companies()->update([$contact])); // array
} catch (AmoapiException $e) {
    echo $e;
}
```

### Create new company
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$company = [["name" => "new company"]];

try {
    print_r($client->companies()->createNew($company)); // array
} catch (AmoapiException $e) {
    echo $e;
}
```

### Add note to company by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$note = [
    "note_type" => "common",
    "text" => "test note"
];

try {
    print_r($client->companies()->addNoteById(45607457, $note));
} catch (AmoapiException $e) {
    echo $e;
}
```

## Customers
### Get all customers
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$filter = [
    "page" => 0,
    "limit" => 50
];

try {
    $customers = $client->customers()->getAll($filter); // array
    print_r($customers);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Get customer by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $customer = $client->customers()->getById(183435); // array
    print_r($customer);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Update customer
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $customer = $client->customers()->getById(183435); // array
} catch (AmoapiException $e) {
    echo $e;
}

$customer["name"] = "update customer";

try {
    print_r($client->customers()->update([$customer])); // array
} catch (AmoapiException $e) {
    echo $e;
}
```

### Create new customer
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$customer = [["name" => "new company"]];

try {
    print_r($client->customers()->createNew($customer)); // array
} catch (AmoapiException $e) {
    echo $e;
}
```

### Add note to customer by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$note = [
    "note_type" => "common",
    "text" => "test note"
];

try {
    print_r($client->customers()->addNoteById(183435, $note));
} catch (AmoapiException $e) {
    echo $e;
}
```

## Users
### Get all users
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$filter = [
    "page" => 0,
    "limit" => 50
];

try {
    $users = $client->users()->getAll($filter); // array
    print_r($users);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Get user by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $user = $client->users()->getById(6928032); // array
    print_r($user);
} catch (AmoapiException $e) {
    echo $e;
}
```

## Roles
### Get all users roles
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$filter = [
    "page" => 0,
    "limit" => 50
];

try {
    $roles = $client->roles()->getAllRoles($filter); // array
    print_r($roles);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Get role by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $role = $client->roles()->getRoleById(56320); // array
    print_r($role);
} catch (AmoapiException $e) {
    echo $e;
}
```

## Account
### Get account info
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $info = $client->account()->getInfo(); // array
    print_r($info);
} catch (AmoapiException $e) {
    echo $e;
}
```

## Catalogs
### Get all catalogs
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$filter = [
    "page" => 0,
    "limit" => 50
];

try {
    $catalogs = $client->catalogs()->getAll($filter); // array
    print_r($catalogs);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Get catalog by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $catalog = $client->catalogs()->getById(2419); // array
    print_r($catalog);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Create new catalog
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$catalog = [["name" => "new catalog"]];

try {
    print_r($client->catalogs()->createNew($catalog)); // array
} catch (AmoapiException $e) {
    echo $e;
}
```

### Update catalog
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $catalog = $client->catalogs()->getById(2419); // array
} catch (AmoapiException $e) {
    echo $e;
}

$catalog["name"] = "update catalog";

try {
    print_r($client->catalogs()->update([$catalog])); // array
} catch (AmoapiException $e) {
    echo $e;
}
```

### Get all catalog elements
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$filter = [
    "page" => 0,
    "limit" => 50
];

try {
    $elements = $client->catalogs()->getAllElements(1989, $filter); // array
    print_r($elements);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Get catalog element by id
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $element = $client->catalogs()->getElementById(1989, 953789); // array
    print_r($element);
} catch (AmoapiException $e) {
    echo $e;
}
```

### Add new element to catalog
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

$element = [["name" => "new element"]];

try {
    print_r($client->catalogs()->createNewElement(1989, $catalog));
} catch (AmoapiException $e) {
    echo $e;
}
```

### Update catalog element
```php
use Amoapi\Client\AmoapiClient;
use Amoapi\Exception\AmoapiException;

$client = new AmoapiClient(
    "subdomain", 
    "client_id",
    "client_secret",
    "redirect_url",
);

try {
    $client->getTokensByCode("code");
} catch (AmoapiException $e) {
    echo $e;
}

try {
    $element = $this->client->catalogs()->getElementById(1989, 953789);
} catch (AmoapiException $e) {
    echo $e;
}

$element["name"] = "new name";

// Delete not expected fields
unset($element["created_by"]);
unset($element["updated_by"]);
unset($element["custom_fields_values"][2]["values"][0]["enum_code"]);

try {
    print_r($this->client->catalogs()->updateElement(1989, [$element]));
} catch (AmoapiException $e) {
    echo $e;
}
```