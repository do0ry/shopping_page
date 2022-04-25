<?php

namespace Platform\Exceptions;

use Exception;
use InvalidArgumentException;

class CartDoesNotExist extends InvalidArgumentException
{
    public static function withId($id)
    {
        return new static("user with id {$id} doesnt exist");
    }
}
