<?php

/**
 * Permission Manager Class
 * 
 * This class provides methods for managing permissions stored in a text file.
 */
class PermissionManager {

  /**
   * @var string Path to the permissions file
   */
  private $filePath;

  /**
   * @var array Associative array containing permissions (ID => name, name => ID)
   */
  private $permissions;

  /**
   * Constructor
   *
   * @param string $filePath Path to the permissions file
   * 
   * @throws Exception If the permissions file does not exist
   */
  public function __construct(string $filePath) {
    $this->filePath = $filePath;

    if (!file_exists($filePath)) {
      throw new Exception("Permissions file not found: " . $filePath);
    }

    $this->loadPermissions();
  }

  /**
   * Loads permissions from the text file
   */
  private function loadPermissions() {
    $this->permissions = [];
    $lines = file($this->filePath, FILE_IGNORE_NEW_LINES);

    foreach ($lines as $line) {
      $parts = explode("|", $line);
      if (count($parts) !== 2) {
        continue;
      }

      $id = trim($parts[0]);
      $name = trim($parts[1]);

      $this->permissions[$id] = $name;
      $this->permissions[$name] = $id;
    }
  }

  /**
   * Gets information about a permission by ID or name
   *
   * @param string $permissionIdOrName Permission ID or name
   * 
   * @return array|null Associative array containing ID and name if found, null otherwise
   */
  public function getPermissionInfo(string $permissionIdOrName): ?array {
    if (isset($this->permissions[$permissionIdOrName])) {
      return [
        "id" => array_search($permissionIdOrName, $this->permissions),
        "name" => $this->permissions[$permissionIdOrName],
      ];
    } else {
      return null;
    }
  }
}

?>
