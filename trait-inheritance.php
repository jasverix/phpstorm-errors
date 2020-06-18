<?php

trait MasterTrait {
  public function getOptions(): array
  {
    return [
      'test' => 'tast',
      'foo' => 'bar',
    ];
  }
}

trait SubTrait {
  use MasterTrait {
    MasterTrait::getOptions as private _parentGetOptions;
  }

  public function getOptions(): array
  {
    $options = $this->_parentGetOptions();
    $options['error'] = 'error';

    return $options;
  }
}

class TestClass {
  use SubTrait;
}

$t = new TestClass();
$option = $t->getOptions();

print_r($option);
