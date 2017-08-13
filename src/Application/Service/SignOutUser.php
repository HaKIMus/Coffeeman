<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 05.08.17
 * Time: 16:58
 */

namespace Coffeeman\Application\Service;

final class SignOutUser
{
    public function signOut(): void
    {
        unset($_SESSION['user'], $_SESSION['summedSportsmanWorkouts']);
    }
}