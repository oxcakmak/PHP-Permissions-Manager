# PHP-Permissions-Manager
Best authorization system without any database.

## Support Me

This software is developed during my free time and I will be glad if somebody will support me.

Everyone's time should be valuable, so please consider donating.

[https://buymeacoffee.com/oxcakmak](https://buymeacoffee.com/oxcakmak)

### Installation

```php
require_once 'Permissions.php';
```

### Usage
```php
try {
    // Create an instance of the Permission class with the path to the permissions file
    $permissionManager = new Permission('permissions.txt');

    // Get all permissions
    $allPermissions = $permissionManager->getPermissions();
    print_r($allPermissions);

    // Get a specific permission by ID
    $permissionById = $permissionManager->getPermissionById(1);
    print_r($permissionById);

    // Get a specific permission by name
    $permissionByName = $permissionManager->getPermissionByName('THREAD_CREATE');
    print_r($permissionByName);

     // Example user's permissions as a comma-separated string of IDs
    $userPermissions = "1,2,3";

    // Check if the user has the "THREAD_CREATE" permission
    $hasPermission = $permissionManager->check($userPermissions, 'THREAD_CREATE');
    
    if ($hasPermission) {
        echo "User has the THREAD_CREATE permission.";
    } else {
        echo "User does not have the THREAD_CREATE permission.";
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
```

### permissions.txt
```txt
id|name|title|description
1|CREATE_ARTICLE|Create Article|You can create article.
2|READ_ARTICLE
3|VIEW_ARTICLE
4|UPDATE_ARTICLE
5|LIST_ARTICLE
```

### Permissions Names (General)
```txt
ACCEPT
BLOCK
CREATE
DELETE
EXECUTE
FILTER
FIND
GET
LIST
READ
REJECT
UNBLOCK
UPDATE
VIEW
WRITE
```
