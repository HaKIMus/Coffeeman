<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 05.08.17
 * Time: 16:58
 */

namespace Coffeeman\Application\Service;

use Psr\Http\Message\ServerRequestInterface;

final class SignOutUser
{
    public function signOut(ServerRequestInterface $request): void
    {
        unset($_SESSION['user']);

        if ($request->getAttribute('redirecting') === true) {
            if ($request->getAttribute('url') === '') {
                $this->redirectTo('http://localhost/Coffeeman/public/');
            }

            $this->redirectTo($request->getAttribute('url'));
        }
    }

    private function redirectTo(string $url): void
    {
        header('Location: ' . $url);

        exit;
    }
}
