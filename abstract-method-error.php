<?php

class Domain
{
    private array $data = [];

    public function runWithoutPermissions(callable $function) {
        // code to disable permissions
        return $function();
    }

    public function setValue(string $key, string $value): void
    {
        $this->data[$key] = $value;
    }

    public function getValue(string $key): ?string
    {
        return $this->data[$key] ?? null;
    }
}

class Connection
{
    public function runTransaction(callable $function) {
        // code to start and complete database transaction
        return $function();
    }
}

$domain = new Domain;
$connection = new Connection;

$data = [
    'test' => 'foo',
    'bar' => 'baz',
];

$connection->runTransaction(fn() => $domain->runWithoutPermissions(static function() use($domain, $data) {
    foreach($data as $key => $value) {
        $domain->setValue($key, $value);
    }
}));

echo $domain->getValue('test');
