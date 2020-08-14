<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class userController extends Controller
{
    
    public function showusers()
    {
        return User::all();
    }

    public function showuser($id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::find($id);
            return response()->json([
                $user
            ], 200); 
        } else {
            return response()->json([
              "message" => "User não encontrado"
            ], 404);
          }
    }

    public function store(Request $request)
    {
        //User::create($request->all());
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->avatar = $request->avatar;
        $user->save();
        return response()->json([
            "message" => "Utilizador criado com sucesso",
            "User" => $request->all()
        ], 200);
    }

    public function delete($id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::find($id);
            $user->delete();
            return response()->json([
                "message" => "Utilizador apagado com sucesso"
            ], 202);
        }else{
            return response()->json([
                "message" => "Utilizador não encontrado"
              ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::find($id);
            $user->name = is_null($request->name) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->password = is_null($request->password) ? $user->password : $request->password;
            $user->avatar = is_null($request->avatar) ? $user->avatar : $request->avatar;
            $user->save();


            return response()->json([
                "message" => "Utilizador atualizado com sucesso"
            ], 202);
        }else{
            return response()->json([
                "message" => "Utilizador não encontrado"
              ], 404);
        }

    }
}
