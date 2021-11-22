<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function index()
    {
        $arrEvento = new EventosController;
        return view('home', ['data' => $arrEvento->index()]);
    }

    public function ajuda()
    {
        return view('ajuda');
    }

    public function login()
    {
        return view('usuario.login');
    }

    public function registro()
    {
        return view('usuario.registro');
    }

    public function eventoDetalhes($id)
    {
        $arrEvento = new EventosController;
        return view('evento.detalhes', ['data' => $arrEvento->show($id)]);
    }

    public function compraCarrinho($id)
    {
        return view('compra.carrinho', [
            'data' => $this->getDadosCompraCarrinho($id)
        ]);
    }

    public static function getDadosCompraCarrinho($id)
    {
        $arrEventos = EventosController::show($id);
        $arrUsuarios = UsuariosController::get($_SESSION['hash']);

        $data = [
            'eventos' => $arrEventos,
            'usuarios' => $arrUsuarios
        ];

        return $data;
    }
}
