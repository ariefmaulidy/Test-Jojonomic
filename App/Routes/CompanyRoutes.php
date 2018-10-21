<?php

namespace App\Routes;

use App\Controller\CompanyController;

$app->post('/createCompany','CompanyController:addCompany');
$app->get('/getListCompany','CompanyController:getAll');
$app->get('/getCompany/[{id}]','CompanyController:getOne');
$app->get('/getListBudgetCompany','CompanyController:getAllBudget');
$app->get('/getBudgetCompany/[{id}]','CompanyController:getBudget');
$app->put('/updateCompany/[{id}]','CompanyController:updateCompany');
$app->delete('/deleteCompany/[{id}]','CompanyController:deleteCompany');

