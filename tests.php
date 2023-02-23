<?php /** @noinspection PhpFullyQualifiedNameUsageInspection */

set_error_handler(/**
 * @throws Exception
 */ static function ($code, $str, $file, $line) {
    error_clear_last();
    throw new \RuntimeException(match ($code) {
            E_WARNING => 'Warning',
            E_NOTICE => 'Notice',
            E_DEPRECATED => 'Deprecated',
            E_ERROR => 'Error',
            default => 'Something'
        } . ': ' . $str, $code);
}, E_ALL & ~E_STRICT & ~E_DEPRECATED);
