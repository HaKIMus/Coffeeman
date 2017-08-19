<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 19.08.17
 * Time: 17:27
 */

namespace Coffeeman\UserInterface\Slim\Controller\Authentication;


use Coffeeman\Application\Service\SignOutUser;
use Coffeeman\UserInterface\Slim\Controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SignOutController extends Controller
{
    public function signOutAction(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $signOut = new SignOutUser();
        $signOut->signOut();

        $homepageUrl = $this->container->router->pathFor('homepage');
        return $response->withStatus(200)->withHeader('Location', $homepageUrl);
    }
}