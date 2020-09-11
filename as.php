<?php
function test(array $input): array
{
    return array_map(fn($field) => ($g = ($field['groupName'] ?? null)) ? $g : $field['name'], $input);
}
print_r(test([
    ['name' => 'name'],
    ['name' => 'Id', 'groupName' => 'id'],
]));
