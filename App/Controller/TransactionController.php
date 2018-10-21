<?php

namespace App\Controller;

use App\Model\Transaction;
use App\Model\Company_budget;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class TransactionController{
    public function getLogTransaction(Request $request, Response $response, $args){
        $data = array();
        $transactions = Transaction::all();
        foreach ($transactions as $transaction){
            $trans = array(
                'id'=>$transaction->id,
                'first_name'=>$transaction->user->first_name,
                'last_name'=>$transaction->user->last_name,
                'account_number'=>$transaction->user->account,
                'company_name'=>$transaction->user->company->name,
                'transaction_type'=>$transaction->type,
                'transcation_date'=>$transaction->date,
                'amount'=>$transaction->amount,
                'remaining_amount'=>$transaction->user->company->budget->amount
            );
            $data[] = $trans;
        }
        return $response->withJson($data);
    }

    public function reimburse(Request $request, Response $response, $args){
        $input = $request->getParsedBody();
        $transaction = Transaction::create([
            'type'=>"R",
            'user_id'=>$input['user_id'],
            'amount'=>$input['amount']
        ]);
        $company_id = $transaction->user->company_id;
        $newamount = $transaction->user->company->budget->amount - $transaction->amount;
        $company_budget = Company_budget::where('company_id',$company_id)->update([
            'amount' => $newamount
        ]);
        return $response->withJson($transaction);
    }

    public function disburse(Request $request, Response $response, $args){
        $input = $request->getParsedBody();
        $transaction = Transaction::create([
            'type'=>"C",
            'user_id'=>$input['user_id'],
            'amount'=>$input['amount']
        ]);
        $company_id = $transaction->user->company_id;
        $newamount = $transaction->user->company->budget->amount - $transaction->amount;
        $company_budget = Company_budget::where('company_id',$company_id)->update([
            'amount' => $newamount
        ]);
        return $response->withJson($transaction);
    }

    public function close(Request $request, Response $response, $args){
        $input = $request->getParsedBody();
        $transaction = Transaction::create([
            'type'=>"R",
            'user_id'=>$input['user_id'],
            'amount'=>$input['amount']
        ]);
        $company_id = $transaction->user->company_id;
        $newamount = $transaction->user->company->budget->amount + $transaction->amount;
        $company_budget = Company_budget::where('company_id',$company_id)->update([
            'amount' => $newamount
        ]);
        return $response->withJson($transaction);
    }
}