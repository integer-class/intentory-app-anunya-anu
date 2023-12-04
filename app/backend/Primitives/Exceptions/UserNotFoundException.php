<?php

namespace Primitives\Exceptions;

class UserNotFoundException extends \Exception
{
    public function __construct()
    {
        parent::__construct("User not found.");
    }
}