<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Exceptions\Handler;
use App\Exceptions\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class EventosController extends Controller
{
    public function index()
    {
        $evento = new Evento;
        $arrEvento = $evento->get()->toArray();

        if (!$arrEvento) {
            return "Voce nao possui registro de eventos";
        } else {
            return $arrEvento;
        }
    }

    public static function show($id)
    {
        $evento = new Evento;
        $arrEvento = $evento::findOrFail($id);

        return $arrEvento->toArray();
    }
}
