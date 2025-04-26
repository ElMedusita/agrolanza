<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Models\User;
use App\Models\Cliente;
use App\Models\Parcela;
use App\Models\Maquinaria;
use App\Models\Fitosanitario;
use App\Models\Servicio;

class PDFController extends Controller
{
    function pdf_users()
    {
    $users = User::all();

    $pdf = PDF::loadView('users.pdf_users', ['users' => $users])->setPaper('a4', 'landscape');
    return $pdf->stream('users.pdf_users');
    }

    function pdf_user($id)
    {
        $user = User::findOrFail($id);

        $pdf = PDF::loadView('users.pdf_user', ['user' => $user]);
        return $pdf->stream("usuario_{$user->id}.pdf");
    }


    function pdf_clientes()
    {
    $clientes = Cliente::all();

    $pdf = PDF::loadView('clientes.pdf_clientes', ['clientes' => $clientes])->setPaper('a4', 'landscape');
    return $pdf->stream('clientes.pdf_clientes');
    }

    function pdf_cliente($id)
    {
        $cliente = Cliente::findOrFail($id);

        $pdf = PDF::loadView('clientes.pdf_cliente', ['cliente' => $cliente]);
        return $pdf->stream("cliente_{$cliente->id}.pdf");
    }


    function pdf_parcelas()
    {
    $parcelas = Parcela::all();

    $pdf = PDF::loadView('parcelas.pdf_parcelas', ['parcelas' => $parcelas])->setPaper('a4', 'landscape');
    return $pdf->stream('parcelas.pdf_parcelas');
    }

    function pdf_parcela($id)
    {
        $parcela = Parcela::findOrFail($id);

        $pdf = PDF::loadView('parcelas.pdf_parcela', ['parcela' => $parcela]);
        return $pdf->stream("parcela_{$parcela->id}.pdf");
    }


    function pdf_maquinarias()
    {
    $maquinarias = Maquinaria::all();

    $pdf = PDF::loadView('maquinarias.pdf_maquinarias', ['maquinarias' => $maquinarias])->setPaper('a4', 'landscape');
    return $pdf->stream('maquinarias.pdf_maquinarias');
    }

    function pdf_maquinaria($id)
    {
        $maquinaria = Maquinaria::findOrFail($id);

        $pdf = PDF::loadView('maquinarias.pdf_maquinaria', ['maquinaria' => $maquinaria]);
        return $pdf->stream("maquinaria_{$maquinaria->id}.pdf");
    }


    function pdf_fitosanitarios()
    {
        $fitosanitarios = Fitosanitario::all();

        $TIPOS     = Fitosanitario::TIPOS;
        $ESTADOS   = Fitosanitario::ESTADOS;

        $pdf = PDF::loadView('fitosanitarios.pdf_fitosanitarios', [
            'fitosanitarios' => $fitosanitarios,
            'TIPOS' => $TIPOS,
            'ESTADOS' => $ESTADOS
        ])->setPaper('a4', 'landscape');
        return $pdf->stream('fitosanitarios.pdf_fitosanitarios');
    }

    function pdf_fitosanitario($id)
    {
        $fitosanitario = Fitosanitario::findOrFail($id);

        $TIPOS   = Fitosanitario::TIPOS;
        $ESTADOS = Fitosanitario::ESTADOS;

        $pdf = PDF::loadView('fitosanitarios.pdf_fitosanitario', [
            'fitosanitario' => $fitosanitario,
            'TIPOS' => $TIPOS,
            'ESTADOS' => $ESTADOS
        ]);

        return $pdf->stream("fitosanitario_{$fitosanitario->id}.pdf");
    }


    function pdf_servicios()
    {
        $servicios = Servicio::all();

        $TIPOS_SERVICIO     = Servicio::TIPOS_SERVICIO;
        $METODOS_PAGO       = Servicio::METODOS_PAGO;
        $ESTADOS            = Servicio::ESTADOS;

        $pdf = PDF::loadView('servicios.pdf_servicios', [
            'servicios' => $servicios,
            'TIPOS_SERVICIO' => $TIPOS_SERVICIO,
            'METODOS_PAGO' => $METODOS_PAGO,
            'ESTADOS' => $ESTADOS
        ])->setPaper('a4', 'landscape');
        return $pdf->stream('servicios.pdf_servicios');
    }

    function pdf_servicio($id)
    {
        $servicio = Servicio::findOrFail($id);

        $TIPOS_SERVICIO     = Servicio::TIPOS_SERVICIO;
        $METODOS_PAGO       = Servicio::METODOS_PAGO;
        $ESTADOS            = Servicio::ESTADOS;

        $pdf = PDF::loadView('servicios.pdf_servicio', [
            'servicio' => $servicio,
            'TIPOS_SERVICIO' => $TIPOS_SERVICIO,
            'METODOS_PAGO' => $METODOS_PAGO,
            'ESTADOS' => $ESTADOS
        ]);

        return $pdf->stream("servicio_{$servicio->id}.pdf");
    }
}
