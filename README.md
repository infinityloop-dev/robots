# Robots
:wrench: Robots generator component

## Introduction

This componenet automaticaly generates robots from parameters in configuration.

## Dependencies

- [nette/application](https://github.com/nette/application)

## How to use

- Register `\Nepttune\Component\IRobotsFactory` as service in cofiguration file, inject it into presenter, write `createComponent` method and use macro `{control}` in template file.
  - Just as any other component.
  - You need to pass robots configuration to factory service.
  - Content type is automaticaly set to `text/plain`.
- Modify parameters to accomplish your needs.

### Example configuration

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

### Example presenter

```
class ExamplePresenter implements IPresenter
{
    /** @var  \Nepttune\Component\IRobotsFactory */
    protected $iRobotsFactory;
    
    public function __construct(\Nepttune\Component\IRobotsFactory $IRobotsFactory)
    {
        $this->iRobotsFactory = $IRobotsFactory;
    }

    protected function createComponentRobots() : \Nepttune\Component\Robots
    {
        return $this->iRobotsFactory->create();
    }
}
```
