<h2 align="center">Coding Challenge</h2>
<h3 align="center">Mehrdad's Approach</h3>

<p align="center">A Simple Project To Control Mars Explorer</p>

# Installation

Clone the repository on your local machine
```shell script
    git clone https://github.com/mehrdadmahdian/myhammer-challenge.git
```
Jump to the installation folder
```shell script
    composer install
    composer dump
```
Run the test using 
```shell script
    composer test
```

<!-- USAGE EXAMPLES -->
# Usage
Using this package client can control an explorer. First, explorer must be created using ExplorerBuilder facility:

## Build the Explorer
The first parameter accepts two variable: 
* $explorerClass = Explorer type must be a fully class name which is implementing `MehrdadMahdian\Contracts\ExplorerInterface`
* $specification = using this string value, initial state of explorer is defined. 

```php
    $explorer = \Mehrdadmahdian\MyHammer\Explorers\ExplorerBuilder::build(
        \Mehrdadmahdian\MyHammer\Explorers\Rover::class,
        '1 1 N'
    )
```

## Control the Explorer
Using Explorer Controller, explorer could be controlled. Controller accepts explorer object as its construction parameter.
```php
     $controller = new \Mehrdadmahdian\MyHammer\ExplorerController($explorer);
```

command are issued to change the state of explorer like this:
```php
     // series of acceptable command characters is used as a command.
     $controller->command("MRMMML");
     $controller->command("RRRR");
```

after issue the command, new state of explorer is 

```php
     $explorer->getState();
```

