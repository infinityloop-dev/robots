# Robots
:wrench: Robots generator component

## Introduction

This componenet automaticaly generates robots from parameters in configuration.

## Dependencies

- [nepttune/base-requirements](https://github.com/nepttune/base-requirements)
- [nepttune/base-components](https://github.com/nepttune/base-components)

## How to use

- Register `\Nepttune\Component\IRobotsFactory` as service in cofiguration file, inject it into presenter, write `createComponent` method and use macro `{control}` in template file.
  - Just as any other component.
  - You need to pass robots configuration to factory service.
  - You might also want to change mime type to `text/plain`.
- Modify parameters to accomplish your needs.

## Example configuration

```
services:
    robotsFactory:
        implement: Nepttune\Component\IRobotsFactory
        arguments:
          - '%robots%'
parameters:
    robots:
        all:
            name: '*'
            disallow:
        google:
            name 'GoogleBot'
            disallow:
              - '/example'
              - '/example2'
```
