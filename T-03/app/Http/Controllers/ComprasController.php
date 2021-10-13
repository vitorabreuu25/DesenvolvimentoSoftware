<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use DateTime;

class ComprasController extends Controller
{
    const HR_LIMITE_TROCA = 6;

    public function index()
    {
        $idUsuario = UsuariosController::get($_SESSION["hash"]);
        $arrCompra = DB::table('compras')
            ->join('eventos', 'compras.id_evento', '=', 'eventos.id')
            ->select('compras.id as id_compra', 'eventos.id as id_evento', 'eventos.st_nome', 'eventos.dt_evento', 'compras.dt_compra', 'eventos.vl_preco', 'compras.dt_estorno')
            ->where([
                ['st_rg', $idUsuario['st_rg']]
            ])
            ->orderByDesc('compras.id')
            ->get()->toArray();

        $msg = "Sucesso";
        $status = 200;

        if (!$arrCompra) {
            $msg = "Voce nao possui historico de compras";
            $status = 500;
        }

        return view('compra.minhas', [
            'data' => $arrCompra,
            'msg' => $msg,  
            'status' => $status
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'st_rg' => 'required',
            'st_numero_cartao' => 'required|size:16',
            'st_vencimento_cartao' => 'required',
            'st_codigo_cartao' => 'required|size:3',
        ]);

        if ($validator->fails()) {
            return view('compra.carrinho', [
                'errors' => $validator->errors()->toArray(),
                'data' => PageController::getDadosCompraCarrinho($request->id_evento)
            ]);
        }

        try {
            $data = PageController::getDadosCompraCarrinho($request->id_evento);
            $App_Model_Compra = new Compra;
            DB::beginTransaction();

                $arrCompra = [
                    'st_rg' => $data['usuarios']['st_rg'],
                    'id_evento' => $data['eventos']['id'],
                    'dt_compra' => date("y-m-d"),
                    'vl_preco' => $data['eventos']['vl_preco'] 
                ];

                $App_Model_Compra::insert($arrCompra);

        } catch (\Throwable $th) {
            DB::rollback();
            return $th;
        }

        DB::commit();
        $arrEvento = EventosController::show($data['eventos']['id']);
        $msg = "Realizado a compra do evento '" . $arrEvento['st_nome'] . "' no valor de R$ " . number_format($arrEvento['vl_preco'], 2);
        HistoricosController::log($_SESSION["hash"], $msg);

        return redirect('/compra/minhas');
    }
    
    public function estornar($id)
    {
        if ($this->validacao($id)) {
            return view('compra.errors', [
                'data' => $this->getEvento($id)
            ]);
        }

        Compra::where('id', $id)->update(array('dt_estorno' => date("Y-m-d")));

        $msg = "Realizado o estorno da compra #" . $id;
        HistoricosController::log($_SESSION["hash"], $msg);

        return redirect('/compra/minhas');    
    }

    public function presente($id)
    {
        if ($this->validacao($id)) {
            return view('compra.errors', [
               'data' => $this->getEvento($id)
            ]);
        }
        
        return view('compra.presente', [
            'idCompra' => $id
        ]);
    }

    private function validacao($idCompra)
    {
        $dataEventoQuery = DB::table('compras')
            ->join('eventos', 'compras.id_evento', '=', 'eventos.id')
            ->select('eventos.dt_evento as data_evento', 'eventos.id')
            ->where('compras.id', $idCompra)
            ->get()->toArray();

        $dataAtual = new DateTime(); 
        $dataEvento = new DateTime($dataEventoQuery[0]->data_evento); 
        $dataRestante = $dataAtual->diff($dataEvento);

        $horasRestanteEvento = $dataRestante->h;
        $horasRestanteEvento = $horasRestanteEvento + ($dataRestante->days*24);

        if ($horasRestanteEvento < self::HR_LIMITE_TROCA) {
            return true;
        }

        return false;
    }

    public function realizarPresente(Request $request)
    {        
        if (!$request['st_rg']) {
            return redirect('/compra/presente/' . $request->idCompra);
        }

        if (isset($request['st_rg'])) {
            Compra::where('id', $request['idCompra'])->update(array('st_rg' => $request['st_rg']));
        }

        $msg = "Realizado o presente da compra #" . $request['idCompra'] . " para o RG " . $request['st_rg'];
        HistoricosController::log($_SESSION["hash"], $msg);

        $msg = "Voce acaba de ganhar um evento";
        HistoricosController::log($request['st_rg'], $msg, true);
        
        return redirect('/compra/minhas');
    }

    private function getEvento($idEvento)
    {
        $evento = new Evento;
        return $evento::findOrFail($idEvento)->toArray();
    }
}
