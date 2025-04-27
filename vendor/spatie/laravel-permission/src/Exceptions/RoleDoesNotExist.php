<?php

namespace Spatie\Permission\Exceptions;

use InvalidArgumentException;

class RoleDoesNotExist extends InvalidArgumentException
{
    public static function named(string $roleName, ?string $guardName)
    {
        return new static("No existe un rol llamado `{$roleName}` para el guard `{$guardName}`.");
    }

    /**
     * @param  int|string  $roleId
     * @return static
     */
    public static function withId($roleId, ?string $guardName)
    {
        return new static("No existe un rol con el ID `{$roleId}` para el guard `{$guardName}`.");
    }
}
