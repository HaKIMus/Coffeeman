<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.06.17
 * Time: 16:45
 */

$app->get('/', 'HomeController:index')
    ->setName('homepage');

$app->post('/login','HomeController:loginAction')
    ->setName('login');