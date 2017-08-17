<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.06.17
 * Time: 16:45
 */

$app->get('/', 'HomeController:index')
    ->setName('homepage');

$app->post('/signIn','HomeController:signInAction')
    ->setName('signIn');

$app->post('/signUp','HomeController:signUpAction')
    ->setName('signUp');

$app->get('/signOut', 'SignOutUser:signOut')
    ->setArguments([
        'redirecting' => true,
        'url' => 'http://localhost/Coffeeman/public/'
    ])
    ->setName('signOut');
