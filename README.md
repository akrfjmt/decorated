# Decorated

decorator pattern in PHP

- PHP ≧ 7.2.x

## Usage

1. implement [`Decorator`](src/Decorator.php) interface
2. decorate your instance with [`Decorated`](src/Decorated.php)
3. call instance's method

Please see the [decorator example](src/TailDecorator.php) and the [test](tests/TailDecoratorTest.php) for details.
