<?php

namespace Company\Tests;

use PHPUnit\Framework\TestCase;

class SomethingToTest
    extends TestCase
{
    public function test_Something(): void
    {
        self::assertTrue(str_contains('foo bar', 'bar'));
    }

    public function test_Something_else(): void
    {
        self::assertFalse(str_contains('foo bar', 'baz'));
    }
}