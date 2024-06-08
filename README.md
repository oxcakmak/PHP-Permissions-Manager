# PHP-Permissions-Manager
Best authorization system without any database.

## Support Me

This software is developed during my free time and I will be glad if somebody will support me.

Everyone's time should be valuable, so please consider donating.

[https://buymeacoffee.com/oxcakmak](https://buymeacoffee.com/oxcakmak)

### Installation

```php
require_once 'PermissionManager.php';
```

### Usage
```php
/*
* If you want load all permissions
* print_r($permissionManager->loadPermissions());
*/

try {
  $permissionManager = new PermissionManager("permissions.txt");
  $permissionInfo = $permissionManager->getPermissionInfo("CREATE_ARTICLE");

  if ($permissionInfo) {
    echo "Permission ID: " . $permissionInfo["id"] . "\n";
    echo "Permission Name: " . $permissionInfo["name"] . "\n";
  } else {
    echo "Permission not found.";
  }
} catch (Exception $e) {
  echo "Error: " . $e->getMessage();
}

```
