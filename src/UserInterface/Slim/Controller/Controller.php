<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.06.17
 * Time: 16:58
 */

declare (strict_types = 1);

namespace Coffeeman\UserInterface\Slim\Controller;

use Slim\Container;

class Controller
{
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function __get(string $property)
    {
        if ($this->container->{$property}) {
            return $this->container->{$property};
        }
    }
}
