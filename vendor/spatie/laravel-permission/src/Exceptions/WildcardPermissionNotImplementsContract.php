<?php

namespace Spatie\Permission\Exceptions;

use InvalidArgumentException;

class WildcardPermissionNotImplementsContract extends InvalidArgumentException
{
    public static function create()
    {
        return new static('La clase de permiso wildcard debe implementar el contrato Spatie\Permission\Contracts\Wildcard.');
    }
}
