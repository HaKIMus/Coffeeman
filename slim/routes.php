<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.06.17
 * Time: 16:45
 */

$app->get('/', 'HomeController:index')
    ->setName('homepage');

$app->post('/sign-in','SignInController:signInAction')
    ->setName('sign-in');

$app->post('/sign-up','SignUpController:signUpAction')
    ->setName('sign-up');

$app->get('/sign-out', 'SignOutController:signOutAction')
    ->setName('sign-out');
