<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proprietario;
use App\Models\Pagamento;
use DB;

class ContaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dividasProprietarios = Proprietario::query()->select(['proprietarios.id','nome', 'divida_atual'])
        ->join('pagamentos', "pagamentos.proprietario_id", '=', "proprietarios.id")
        ->addSelect(DB::raw("divida - SUM(pagamentos.valor) as saldoAtual" ))
        ->groupBy('proprietarios.id')
        ->get();

        return view("conta/index", [
            "dividasProprietarios" => $dividasProprietarios,
        ]);
    }


    public function divida()
    {
        $dividasProprietarios = Proprietario::query()->select(['proprietarios.id','nome', 'divida', 'fracao', 'divida_atual'])
        ->join('pagamentos', "proprietarios.id", '=', "pagamentos.proprietario_id")
        ->addSelect(DB::raw("proprietarios.divida - SUM(pagamentos.valor) as saldoAtual" ))
        ->groupBy('proprietarios.id')
        ->get();

        return view("conta/dividas", [
            "dividasProprietarios" => $dividasProprietarios,
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
    public function store(Request $request, string $proprietario)
    {
        $request->validateWithBag("pagamentoCreate", [
            "valor" => ['required', 'numeric'],
            "metodo" => ['required', 'string'],
            "data" => ['required', 'date']
        ]);

        $pagamento = new Pagamento([
            "valor" => $request->valor,
            "data" => $request->data,
            "metodo" => $request->metodo
        ]);

        $proprietario = Proprietario::findOrFail($proprietario);

        $payload = $proprietario->pagamentos()->save($pagamento);

        // abatar a divida com o valor do pagamento
        $proprietario->divida_atual = $proprietario->divida_atual - $request->valor;

        $proprietario->save();

        return redirect(route('conta.corrente', [$proprietario]));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $proprietario = Proprietario::query()->select(['proprietarios.id','nome', 'divida', 'fracao', 'divida_atual'])
        ->join('pagamentos', "proprietarios.id", '=', "pagamentos.proprietario_id")
        ->addSelect(DB::raw("proprietarios.divida - SUM(pagamentos.valor) as saldoAtual" ))
        ->where('proprietarios.id', $id)
        ->groupBy('proprietarios.id')
        ->get();

        $proprietario->load('pagamentos');

        return view("conta/show", [
            "proprietario" => $proprietario[0]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $proprietario, string $id)
    {
        $pagamento = Pagamento::findOrfail($id);

        $pagamento->delete();

        return redirect(route('conta.corrente', ['id', $proprietario]));
    }
}
