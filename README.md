[![Build Status](https://travis-ci.org/bendem/ClassTypes.png)](https://travis-ci.org/bendem/ClassTypes)

## The project

This is kinda fun for me to play with php...
But I think php miss some features and standards (especially for strings).

I tought the object type are kinda usefull so here we go...

I'm going to make some implementations of Arr (Array), Char (or maybe not, it's like String),
Float, Int and String.

**The project is under development, use it at your own risks ! :wink:**

## Use

All classes are in the namespace ClassTypes so the easiest way to use it is
to use it like that :

```php
use ClassTypes\Arr;
use ClassTypes\Char;
use ClassTypes\Float;
use ClassTypes\Int;
use ClassTypes\String;
use ClassTypes\Va;
```

After that, all you need to do is to use your variables like that :

```php
$str = new String("Hey !");
$int = new Int(3);
```

All objects implements the ``__invoke`` method which allow you to use each object like that :

```php
$str = new String("New String");
$str("Updated String"); // Update the content of the object
echo $str(); // Get the content of the object
echo $str; // It works too because all objects implements the __toString method as well
```

## Documentation

Documentation will come when the project will be released...

## Contributing

As easy as if it was hosted on github !

+ Fork,
+ Write new functionnality / write a fix,
+ Write a test case,
+ Send a pull request.

To know about coding standards, view [CONTRIBUTING.md](CONTRIBUTING.md).

## License

See [LICENSE.txt](LICENSE.txt).
