# BehatBootstrapExtension
A Behat Extension that allows custom bootstrapping.

## Installation

```
composer require postcon/bootstrap-extension --dev
```

## Usage (behat.yml)

```yml
default:
  extensions:
    Behat\BootstrapExtension\Extension:
      bootstrap_file: path/to/your/bootstrap.php
```
