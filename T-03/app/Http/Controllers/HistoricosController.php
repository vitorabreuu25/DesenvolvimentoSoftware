<?php

namespace App\Http\Controllers;

use App\Models\Historico;

class   HistoricosController extends Controller
{
    public function index()
    {
        $idUsuario = UsuariosController::get($_SESSION["hash"]);

        $historico = new Historico;
        $arrHistorico = $historico::where('id_usuario', $idUsuario)->orderBy('id', 'desc')->get()->toArray();

        $msg = "Sucesso";
        $status = 200;

        if (!$arrHistorico) {
            $msg = "Voce nao possui historico de transacoes";
            $status = 500;
        }

        return view('auditoria.historico', [
            'data' => $arrHistorico,
            'msg' => $msg,  
            'status' => $status
        ]);
    }

    public static function log($dadoUsuario, $acao, $receptor = false)
    {
        if ($receptor) {
            $idUsuario = UsuariosController::getPorRg($dadoUsuario);
            $idUsuario['id'] = $idUsuario[0]['id'];

            $rgProprietario = UsuariosController::get($_SESSION["hash"]);
            $acao = $acao . " do RG " . $rgProprietario['st_rg'];
        } else {
            $idUsuario = UsuariosController::get($dadoUsuario);
        }

        if (isset($idUsuario['id'])) {
            Historico::insert([
                [
                    'id_usuario' => $idUsuario['id'],
                    'dt_historico' => date("Y-m-d H:i"),
                    'st_mensagem' => $acao
                ]
            ]);
        }
        
        return false;
    }
}
