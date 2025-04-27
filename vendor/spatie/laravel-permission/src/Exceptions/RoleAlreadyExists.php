<?php

namespace Spatie\Permission\Exceptions;

use InvalidArgumentException;

class RoleAlreadyExists extends InvalidArgumentException
{
    public static function create(string $roleName, string $guardName)
    {
        return new static("Ya existe un rol `{$roleName}` para el guard `{$guardName}`.");
    }
}
