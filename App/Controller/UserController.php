<?php

namespace App\Controller;

use App\Model\User;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class UserController {
    public function getAll(Request $request, Response $response, $args)
    {
        $data = User::all();
        return $response->withJson($data);
    }

    public function getOne(Request $request, Response $response, $args)
    {
        $data = User::find($args['id']);
        return $response->withJson($data);
    }

    public function addUser(Request $request, Response $response)
    {
        $input = $request->getParsedBody();
        $user = User::create([
            'name'=>$input['name'],
            'address'=>$input['address']
        ]);
        return $response->withJson($user);
    }

    public function updateUser(Request $request, Response $response, $args){
        $input = $request->getParsedBody();
        $user = User::where('id',args['id'])->update([
            'name'=>$input['name'],
            'address'=>$input['address']
        ]);
        return $response->withJson($user);
    }

    public function deleteuser(Request $request, Response $response, $args){
        $user = User::destroy(args['id']);
        return $response->withJson($user);
    }
}