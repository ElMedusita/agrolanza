<?php

namespace Spatie\Permission\Exceptions;

use Illuminate\Support\Collection;
use InvalidArgumentException;

class GuardDoesNotMatch extends InvalidArgumentException
{
    public static function create(string $givenGuard, Collection $expectedGuards)
    {
        return new static("El rol o permiso proporcionado debería usar el guard `{$expectedGuards->implode(', ')}` en lugar de `{$givenGuard}`.");
    }
}
