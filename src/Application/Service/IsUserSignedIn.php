<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 04.08.17
 * Time: 06:14
 */

namespace Coffeeman\Application\Service;


final class IsUserSignedIn implements CheckStrategyInterface
{
    public function check(): bool
    {
        return isset($_SESSION['user']);
    }
}