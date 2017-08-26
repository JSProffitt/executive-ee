<?php

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2017 BuzzingPixel, LLC
 * @license https://buzzingpixel.com/software/executive/license
 * @link https://buzzingpixel.com/software/executive
 */

namespace BuzzingPixel\Executive\Abstracts;

use BuzzingPixel\Executive\BaseComponent;
use BuzzingPixel\Executive\Service\ConsoleService;

/**
 * Class MigrationService
 */
abstract class BaseCommand extends BaseComponent
{
    /** @var ConsoleService $consoleService */
    protected $consoleService;

    /**
     * MigrationService constructor
     */
    public function init()
    {
        $this->consoleService = ee('executive:ConsoleService');
        $this->initCommand();
    }

    /**
     * Safe down
     */
    public function initCommand()
    {
    }
}
