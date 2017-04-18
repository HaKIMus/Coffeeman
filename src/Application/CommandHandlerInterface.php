<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 18.04.17
 * Time: 21:18
 */

namespace Coffeeman\Application;

interface CommandHandlerInterface
{
    public function handle($command): void;
}