<?php

  //Sintax to declare a function is the same that JavaScript
  /*
    - Camel Case myFunction() {}
    - Lower Case my_function()
  */

  function simpleFunction() {
    echo 'Hello World';
  }

  //simpleFunction();
  
  function sayHello($name) {
    echo "Hello World $name <br>";
  }

  sayHello("Santiago");
  sayHello("David");

?>