<?php

namespace App\Http\Controllers;

use App\Models\TipoPokemon;
use Illuminate\Http\Request;

class TipoPokemonController extends Controller
{
    public function index()
    {
        $tipo= TipoPokemon::all();
        return response()->json($tipo);
    }

    public function store(Request $request)
    {
        $rules = ['descripcion_tipo' => 'required|string|min:1|max:255'];
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }

        $tipos = new TipoPokemon($request->all());
        $tipos->save();

        return response()->json([
            'status' => true,
            'message' => 'Tipo de Pokemon registrado'
        ], 200);
    }
    public function show(TipoPokemon $tipoPokemon)
    {
        return response()->json(['status'=>true, 'data'=>$tipoPokemon]);
    }
    
    public function update(Request $request, TipoPokemon $tipoPokemon)
    {
        $rules = ['descripcion_tipo' => 'required|string|min:1|max:100'];
        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }

        $tipoPokemon->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Tipo de Pokemon modificado'
        ], 200);
    }

    public function destroy(TipoPokemon $tipoPokemon)
    {
        $tipoPokemon->delete();
        return response()->json([
            'status'=> true,
            'message'=> 'Tipo de Pokemon eliminado'
            ],200);
    }
    public function all()
    {
        $tipos= TipoPokemon::select('tipo_pokemon.*')->get();
        return response()->json($tipos);
    }
    
}
