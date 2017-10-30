# BehatBootstrapExtension
A Behat Extension that allows custom bootstrapping.

## Requirements

  - behat/behat ~3.0

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
