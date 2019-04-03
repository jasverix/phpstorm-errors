<?php

class MyClass {
  public function runSomething(int $number): void {
    // something
  }
}

function testFunction() {
  $myObject = new MyClass;
  $list = range(0, 10);

  foreach ($list as $number) {
    $myObject->runSomething($number);
  }

  return static function () use ($myObject) {
    echo 'Some output';
  };
}
