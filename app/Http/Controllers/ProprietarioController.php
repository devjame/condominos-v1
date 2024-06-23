<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orcamento;
use App\Models\Proprietario;

class ProprietarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proprietarios = Proprietario::all();

        return view("proprietario/index", [
            "proprietarios" => $proprietarios,
            "orcamentoTotal" => self::getOrcamentoTotal(),
            "permilagemTotal" => self::getPermilagemTotal()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            "fracao" => ['required', 'string'],
            "permilagem" => ['required', 'numeric']
        ]);

        // check if permilagem is greater than 100% or lower, throw an error

        
        // calcular a divida com base na permilagem do proprietario
        $permilagem = (float) $request->permilagem;

        /*
        // Invalidar o criação  proprietario caso a permilagem for maior que 100%
        
        $totalPermilagem = self::getPermilagemTotal()

        if($totalPermilagem > 100){
            return back()->with([
                'message' => 'A permilagem tem que ser a igual 100%! ',
            ]);
        }*/

        $divida = self::calcDivida($permilagem);

        Proprietario::create([
            "nome" => $request->nome,
            "email" => $request->email,
            "phone" => $request->phone,
            "fracao" => $request->fracao,
            "permilagem" => $request->permilagem,
            "divida" => $divida,
            "divida_atual" => $divida // valor a ser decrementado
        ]);

        return redirect(route("proprietario.index"));

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proprietario = Proprietario::findOrFail($id);

        return view("proprietario/edit", [
            "proprietario" => $proprietario
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proprietario = Proprietario::findOrFail($id);

        $request->validate([
            'nome' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email'],
            "fracao" => ['required', 'string'],
            "permilagem" => ['required', 'numeric']
        ]);

        $proprietario->nome = $request->nome;
        $proprietario->email = $request->email;
        $proprietario->fracao = $request->fracao;
        $proprietario->permilagem = $request->permilagem;

        $proprietario->save();

        return redirect(route("proprietario.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proprietario = Proprietario::findOrFail($id);

        $proprietario->delete();

        return redirect(route("proprietario.index"));

    }

    public static function getOrcamentoTotal(){
        return Orcamento::all()->sum('valor');
    }
    public static function getPermilagemTotal(){
        return Proprietario::all()->sum('permilagem');
    }
    
    public static function calcDivida(float $permilagem) {
        $orcamentoTotal = self::getOrcamentoTotal();

        return $orcamentoTotal * ($permilagem / 100);
    }
}