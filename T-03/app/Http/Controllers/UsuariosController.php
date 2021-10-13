<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuariosController extends Controller
{   
    public static function get($token) {
        $usuario = new Usuario;
        $arrUsuario = $usuario::where('st_token', $token)->first()->toArray();

        if (isset($arrUsuario)) {
            return $arrUsuario;    
        }

        return false;
    }

    public static function getPorRg($rg) {
        $usuario = new Usuario;
        $arrUsuario = $usuario::where('st_rg', $rg)->get()->toArray();

        if (is_array($arrUsuario)) {
            return $arrUsuario;    
        }
        
        return false;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'st_nome' => 'required',
            'st_rg' => 'required|size:9',
            'st_senha' => 'required|min:6|required_with:st_senha_confirmacao|same:st_senha_confirmacao',
            'st_senha_confirmacao' => 'min:6'
        ]);
        
        if ($validator->fails()) {
            return view('usuario.registro', ['errors' => $validator->errors()->toArray()]);
        } 

        $usuario = new Usuario;
        $usuario->st_nome = $request->st_nome;
        $usuario->st_rg = $request->st_rg;
        $usuario->st_token = app('hash')->make($request->st_rg);
        $usuario->st_senha = app('hash')->make($request->st_senha);
        $usuario->save();

        return redirect('/home');
    }

    public function login(Request $request)
    {    
        $validator = Validator::make($request->all(), [
            'st_rg' => 'required|size:9',
            'st_senha' => 'required|min:6'
        ]);
        
        if ($validator->fails()) {
            return view('usuario.login', ['errors' => $validator->errors()->toArray()]);
        }

        $result = $this->autenticador($request->st_rg, $request->st_senha);

        if ($result) {
            return redirect('/home'); 
        } else {
            $data['msg'][0] = "Numero de RG ou Senha invalido, tente novamente";
            return view('usuario.login', ['errors' => $data]);
        }
    }

    public function logout(Request $request)
    {
        session_destroy();
        $msg = "Usuario desconectou do sistema";
        HistoricosController::log($_SESSION["hash"], $msg);
        return redirect('/home');
    }

    private function autenticador($rg, $senha)
    {
        $usuario = new Usuario;
        $arrUsuario = $usuario::where('st_rg', $rg)->first();

        if ($arrUsuario) {
            if ((!$rg) || (!Hash::check($senha, $arrUsuario->st_senha))) {
                return false;
            }
        
            $_SESSION["hash"] = $arrUsuario->st_token;
            $msg = "Usuario realizou o login no sistema";
            HistoricosController::log($_SESSION["hash"], $msg);

            return true;
        }

        return false;
    }
}
