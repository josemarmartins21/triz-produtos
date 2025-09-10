<?php

namespace App\Exceptions;

use Exception;

class InvalidOrderException extends Exception
{
    public function render()
    {
        return response()->json([
            'error' => 'InvalidOrderException'
        ], 400);
    }
}
