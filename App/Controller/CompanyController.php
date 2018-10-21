<?php

namespace App\Controller;

use App\Model\Company;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class CompanyController {
    public function getAll(Request $request, Response $response, $args)
    {
        $data = Company::get();
        return $response->withJson($data);
    }

    public function getOne(Request $request, Response $response, $args)
    {
        $data = Company::find($args['id']);
        return $response->withJson($data);
    }

    public function getAllBudget(Request $request, Response $response, $args)
    {
        $data = array();
        $companies = Company::all();
        foreach ($companies as $company){
            $comp = array('id'=>$company->id,'name'=>$company->name,'address'=>$company->address,'amount'=>$company->budget->amount);
            $data[] = $comp;
        }
        return $response->withJson($data);
    }

    public function getBudget(Request $request, Response $response, $args)
    {
        $company = Company::find($args['id']);
        $data = array('id'=>$company->id,'name'=>$company->name,'address'=>$company->address,'amount'=>$company->budget->amount);
        return $response->withJson($data);
    }

    public function addCompany(Request $request, Response $response)
    {
        $input = $request->getParsedBody();
        $company = Company::create([
            'name'=>$input['name'],
            'address'=>$input['address']
        ]);
        return $response->withJson($company);
    }

    public function updateCompany(Request $request, Response $response, $args){
        $input = $request->getParsedBody();
        $company = Company::where('id',$args['id'])->update([
            'name'=>$input['name'],
            'address'=>$input['address']
        ]);
        $company = Company::find($args['id']);
        return $response->withJson($company);
    }

    public function deleteCompany(Request $request, Response $response, $args){
        $company = Company::destroy($args['id']);
        return $response->withJson($company);
    }
}