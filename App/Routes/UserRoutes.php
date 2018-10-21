<?php

namespace App\Routes;

use App\Controller\UserController;


$app->post('/createUser','UserController:addUser');
$app->get('/getListUser','UserController:getAll');
$app->get('/getUser/[{id}]','UserController:getOne');
$app->put('/updateUser/[{id}]','UserController:updateUser');
$app->delete('/deleteUser/[{id}]','UserController:deleteUser');

