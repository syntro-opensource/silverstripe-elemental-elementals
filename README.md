# Silverstripe Elemental Elementals

[![🎭 Tests](https://github.com/syntro-opensource/silverstripe-elemental-elementals/workflows/%F0%9F%8E%AD%20Tests/badge.svg)](https://github.com/syntro-opensource/silverstripe-elemental-elementals/actions?query=workflow%3A%22%F0%9F%8E%AD+Tests%22+branch%3A%22master%22)
[![codecov](https://codecov.io/gh/syntro-opensource/silverstripe-elemental-elementals/branch/master/graph/badge.svg)](https://codecov.io/gh/syntro-opensource/silverstripe-elemental-elementals)
![Dependabot](https://img.shields.io/badge/dependabot-active-brightgreen?logo=dependabot)
[![phpstan](https://img.shields.io/badge/PHPStan-enabled-success)](https://github.com/phpstan/phpstan)
[![composer](https://img.shields.io/packagist/dt/syntro/silverstripe-elemental-elementals?color=success&logo=composer)](https://packagist.org/packages/syntro/silverstripe-elemental-elementals)
[![Packagist Version](https://img.shields.io/packagist/v/syntro/silverstripe-elemental-elementals?label=stable&logo=composer)](https://packagist.org/packages/syntro/silverstripe-elemental-elementals)

## Introduction
Provides a sensible default setup and more for Silverstripe projects built with
elemental and bootstrap.

## Installation
To install this module, run the following command:
```
composer require syntro/silverstripe-elemental-elementals
```

## Docs
### Title Customization
This module adds title configuration settings to elemental objects. These allow
the configuration of
* title tag
* title alignment
* title extra classes

These can be accessed in templates using `$TitleTag`, `$TitleAlignment` and
`$TitleExtraClasses`. If you want to quickly drop in support, you can use our
preset to render the title as follows:
```
<% if $ShowTitle %>
    <% include ElementTitle %>
<% end_if %>
```

If you want to disable title editing for a specific element, set the following
config:
```yaml
YourElement:
  allow_title_customization: false
```

### Editor and Content
See [📚 Editor configuration](docs/01_editor.md).

## Contributing
See [CONTRIBUTION.md](CONTRIBUTION.md) for mor info.
