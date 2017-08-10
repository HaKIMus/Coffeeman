<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 04.08.17
 * Time: 06:18
 */

namespace Coffeeman\Application\Service;


final class Check
{
    public function isUserSignedIn(): bool
    {
        return (new IsUserSignedIn())->check();
    }
}