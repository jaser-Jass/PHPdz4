<?php
 /*
 class A {
  public function foo() {
  static $x = 0;
  echo ++$x;
  }
  }
  $a1 = new A();
  $a2 = new A();
  $a1->foo();
  $a2->foo();
  $a1->foo();
  $a2->foo();   // вывод 1234

*/

class A {
    public function foo() {
    static $x = 0;
    echo ++$x;
    }
    }
    class B extends A {
    }
    $a1 = new A();
    $b1 = new B();
    $a1->foo();
    $b1->foo();
    $a1->foo();
    $b1->foo(); // вывод 1234

    /* 
В первом случае, когда у нас есть класс A и экземпляры этого класса, каждый экземпляр использует одну и ту же статическую переменную
$x. Переменная $x является статической, поэтому она сохраняет свое значение между вызовами метода foo(). Каждый раз при вызове ++$x, 
мы увеличиваем значение переменной $x на единицу.

Таким образом, код выведет:
1) На первом вызове метода foo() будет выведено число 1.
2) На втором вызове метода foo() также будет выведено число 1, так как второй экземпляр ($a2) использует тот же статический массив $x, 
который уже был увеличен до 1 предыдущим вызовом.
3) На третьем вызове метода foo(), снова вызываемом через $a1, переменная $x будет равна 2, поскольку после второго вызова она была 
увеличена до 2.
4) Аналогично, на четвертом вызове метода foo(), снова вызываемом через $a2, переменная $x будет равна 3, поскольку после третьего
 вызова она была увеличена до 3.

Во втором случае, когда добавляется класс B, который наследует от класса A, ситуация немного меняется. Каждый экземпляр класса B 
будет использовать свою собственную копию статического массива $x, потому что метод foo() находится в классе A, и этот метод 
переопределяется для класса B.

Теперь код выведет:
1) На первом вызове метода foo(), вызванном через $a1, будет выведено число 1.
2) На втором вызове метода foo(), вызванном через $b1, будет выведено число 1, так как класс B создает свою собственную копию 
статического массива $x.
3) На третьем вызове метода foo(), снова вызванном через $a1, переменная $x будет равна 2, поскольку после первого вызова она 
была увеличена до 2.
4) Аналогично, на четвертом вызове метода foo(), снова вызванном через $b1, переменная $x будет равна 2, поскольку после второго
вызова она была увеличена до 2.
    
    */