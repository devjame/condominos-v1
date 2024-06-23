<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Orcamento;

class OrcamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orcamentos = Orcamento::all();

        $orcamento_total = 0;

        foreach ($orcamentos as $orcamento) {
            $orcamento_total = $orcamento_total + $orcamento['valor'];
        }

        return view("orcamento/index", ['orcamentos' => $orcamentos, 'orcamentoTotal' => $orcamento_total]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("orcamento/create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rubrica' => ['required', 'string', 'max:150'],
            'valor' => ['required', 'numeric']
        ]);

        $orcamento = Orcamento::create([
            'rubrica' => $request->rubrica,
            'valor' => $request->valor
        ]);

        return redirect(route("orcamento.index"));
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
        $orcamento = Orcamento::findOrFail($id);

        return view("orcamento/edit", [
            "orcamento" => $orcamento
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orcamento = Orcamento::find($id);

        $request->validate([
            'valor' => ['required', 'decimal']
        ]);

        $orcamento->rubrica = $request->rubrica;
        $orcamento->valor = $request->valor;

        $orcamento->save();

        return redirect(route("orcamento.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orcamento = Orcamento::find($id);
        $orcamento->delete();

        return redirect(route("orcamento.index"));
    }
}
