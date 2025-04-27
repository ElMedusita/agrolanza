<?php

namespace Spatie\Permission\Exceptions;

use InvalidArgumentException;

class PermissionDoesNotExist extends InvalidArgumentException
{
    public static function create(string $permissionName, ?string $guardName)
    {
        return new static("No existe un permiso llamado `{$permissionName}` para el guard `{$guardName}`.");
    }

    /**
     * @param  int|string  $permissionId
     * @return static
     */
    public static function withId($permissionId, ?string $guardName)
    {
        return new static("No existe un permiso con el ID `{$permissionId}` para el guard `{$guardName}`.");
    }
}
