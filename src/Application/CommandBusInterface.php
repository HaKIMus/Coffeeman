<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.04.17
 * Time: 16:06
 */

namespace Coffeeman\Application;

use Coffeeman\Application\Validation\CommandClass;

interface CommandBusInterface
{
    public function registerHandler(CommandClass $commandClass, $handler): void;
    public function handle($command): void;
}
