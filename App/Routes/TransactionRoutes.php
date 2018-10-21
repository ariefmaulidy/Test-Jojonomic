<?php

namespace App\Routes;

use App\Controller\TransactionController;

$app->post('/reimburse','TransactionController:reimburse');
$app->post('/disburse','TransactionController:disburse');
$app->post('/close','TransactionController:close');
$app->get('/getLogTransaction','TransactionController:getLogTransaction');

