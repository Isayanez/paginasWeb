<?php

namespace App\Http\Controllers;
use DB;
use App\Models\TipoPokemon;
use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    
    public function index()
    {
        $pokemon= Pokemon::select('pokemon.*',
        'tipo_pokemon.descripcion_tipo')
        ->join('tipo_pokemon', 'tipo_pokemon.id','=','pokemon.tipo_id')
        ->paginate(10);
        return response()->json($pokemon);
    }
  
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|min:1|max:255',
            'url_imagen' => 'required|string',
            'hp' => 'required|numeric',
            'defensa' => 'required|numeric',
            'ataque' => 'required|numeric',
            'rapidez' => 'required|numeric',
            'tipo_id' => 'required|numeric'
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }

        $pokemon = new Pokemon($request->all());
        $pokemon->save();

        return response()->json([
            'status' => true,
            'message' => 'Pokemon registrado'
        ], 200);
    }
    public function show(Pokemon $pokemon)
    {
        return response()->json(['status'=>true, 'data'=>$pokemon]);
    }

    
    public function update(Request $request, Pokemon $pokemon)
    {
        $rules = [
            'nombre' => 'required|string|min:1|max:100',
            'url_imagen' => 'required|string',
            'hp' => 'required|numeric',
            'defensa' => 'required|numeric',
            'ataque' => 'required|numeric',
            'rapidez' => 'required|numeric',
            'tipo_id' => 'required|numeric'
        ];

        $validator = \Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }

        $pokemon->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Pokemon actualizado'
        ], 200);
    }
    public function destroy(Pokemon $pokemon)
    {
        $pokemon->delete();
        return response()->json([
            'status'=> true,
            'message'=> 'Pokemon eliminado'
            ],200);
    }
    public function all()
    {
        $pokemon= Pokemon::select('pokemon.*',
        'tipo_pokemon.descripcion_tipo')
        ->join('tipo_pokemon', 'tipo_pokemon.id','=','pokemon.tipo_id');
        return response()->json($pokemon);
    }
}
