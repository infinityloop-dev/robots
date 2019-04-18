<?php

/**
 * This file is part of Nepttune (https://www.peldax.com)
 *
 * Copyright (c) 2018 Václav Pelíšek (info@peldax.com)
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <https://www.peldax.com>.
 */

declare(strict_types = 1);

namespace Nepttune\Component;

final class Robots extends \Nette\Application\UI\Control
{
    private static $defaultConfig = [
        'all' => [
            'name' => '*',
            'disallow' => null,
        ]
    ];

    /** @var array */
    private $config;

    public function __construct(array $config)
    {
        parent::__construct();
        
        $this->config = \array_merge_recursive(self::$defaultConfig, $config);
    }

    protected function beforeRender() : void
    {
        $this->template->robots = $this->robots;
    }
    
    public function render() : void
    {
        $this->beforeRender();
        $this->template->setFile(__DIR__ . '/Robots.latte');
        $this->template->render();
    }
}
