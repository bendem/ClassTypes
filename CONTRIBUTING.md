# Contributing

Every contribution will be appreciated ! Thanks in advance :wink:

## How

+ Fork the repo,
+ Write a functionnality / fix,
+ Write test case,
+ Send pull request.

## Standards

### Comments

+ Write at least a function comment including :
  + A short description
  + A blank line
  + "**@param** *[type]* $name *[description]*" for each function parameters
  + A blank line
  + A "**@return** *[type]*" statement
+ If you use some obvious built-in php functions (String::length use strlen()), add also :
  + A blank line
  + A "**@see** *[link]*" statement to the english documentation of the function

### Code

+ Opening braces on same line
+ Space between if / while / for statements and parenthesis

```php
if ($nb) {
	// some code
} else {
	// some other code
}
```

+ Class names :
  + begin with uppercase character
  + use camelcase
+ Method names :
  + begin with lowercase character
  + use camelcase
+ Protected methods :
  + begin with an underscore
+ Variables :
  + lowercased
  + use underscore
