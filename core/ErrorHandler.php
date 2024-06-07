<?php

namespace core;

class ErrorHandler
{
    private const Errors = [
            "page was not found"
        ];
    public function throwError(string $location, int $errorCode) {
        echo "<h1>Error at:</h1>>" . $location . ": " . self::Errors[$errorCode];
    }
}