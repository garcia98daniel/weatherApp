<?php

namespace App\Http\Controllers;

use App\Models\Clima;
use App\Models\User;
use App\Http\Requests\StoreClimaRequest;
use App\Http\Requests\UpdateClimaRequest;
use Carbon\Carbon;
class ClimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClima()
    {
        return view("clima");
    }

    public function getPrevision()
    {
        $datos = Clima::where('usuario', '=', auth()->user()->id)->get();

        //dd($datos);
        return view("prevision")->with('datos', $datos);
    }

    public function getMuyfrioAPI()
    {
        $datos = Clima::where('temperatura', '<=', '283')->get();

        //dd($datos);
        $response = [
            'data' => $datos,
            'message' => "Climas listados con exíto.",
        ];

        return response($response , 200);
    }

    public function getFrioAPI()
    {
        $datos = Clima::whereBetween('temperatura', ['283','298'])->get();

        //dd($datos);
        $response = [
            'data' => $datos,
            'message' => "Climas listados con exíto.",
        ];

        return response($response , 200);
    }
    public function getCalorAPI()
    {
        $datos = Clima::whereBetween('temperatura', ['298','310'])->get();

        //dd($datos);
        $response = [
            'data' => $datos,
            'message' => "Climas listados con exíto.",
        ];

        return response($response , 200);
    }

    public function getMuchoCalorAPI()
    {
        $datos = Clima::where('temperatura', '>=', '310')->get();

        //dd($datos);
        $response = [
            'data' => $datos,
            'message' => "Climas listados con exíto.",
        ];

        return response($response , 200);
    }

    public function getListado()
    {
        $usuarios = User::where('id', "!=", auth()->user()->id)->get();
        return view("listado")->with('usuarios', $usuarios);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClimaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClimaRequest $request)
    {
        //
        $clima = new Clima();
        $clima->temperatura = $request->get('temperatura');
        $clima->cielo = $request->get('cielo');
        $clima->usuario = auth()->user()->id;
        $clima->ubicacion = $request->get('ubicacion');
        $clima->fecha = Carbon::now()->format('y-m-d');
        $clima->hora = Carbon::now()->format('H:i:s');

        $resul=$clima->save();

        if($resul){
            return view("clima");   
            //return view("mensajes.msj_correcto")->with("msj","Reserva realizada");   
        }
        else
        {
             
             //return view("mensajes.msj_rechazado")->with("msj","Ups!, hubo un error");  

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function show(Clima $clima)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function edit(Clima $clima)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClimaRequest  $request
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClimaRequest $request, Clima $clima)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clima  $clima
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clima = Clima::find($id);

        if($clima->delete()){

            return redirect('/prevision');
        }
        //dd($clima);
    }
}
