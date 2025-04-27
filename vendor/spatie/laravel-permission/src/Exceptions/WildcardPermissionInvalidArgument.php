<?php

namespace Spatie\Permission\Exceptions;

use InvalidArgumentException;

class WildcardPermissionInvalidArgument extends InvalidArgumentException
{
    public static function create()
    {
        return new static('El permiso wildcard debe ser una cadena de texto, un ID de permiso o una instancia de permiso.');
    }
}
