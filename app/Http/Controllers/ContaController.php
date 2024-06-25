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
        $contaCorrente = Proprietario::all();

        return view("conta/index", [
            "contaCorrente" => $contaCorrente,
        ]);
    }


    public function divida()
    {
        $dividas = Proprietario::query()->select(['proprietarios.id', 'nome', 'divida', 'fracao', 'divida_atual'])->get();

        return view("conta/dividas", [
            "dividas" => $dividas,
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

        $proprietario->pagamentos()->save($pagamento);

        // abater a divida com o valor do pagamento

        // verificar se a divida_atual está liquidada
        if ($proprietario->divida_atual === 0) {
            return redirect()->back()->with('status', "Divida liquidada!");
        } else if ($request->valor > $proprietario->divida_atual) {
            return redirect()->back()->with('status', "Valor maior do que a ívida!");
        }

        $divida = $proprietario->divida_atual - $request->valor;

        /* se resultado for negativo ou igual a zero, divida_atual -> 0; valor_a_retornar -> o excedente
        * se for positivo, divida_atual -> resultado
        */
        if ($divida <= 0) {
            $proprietario->divida_atual = 0;
            // como guardar o execendente??
        } else {
            $proprietario->divida_atual = $divida;
        }
        $proprietario->save();

        return redirect(route('conta.corrente', [$proprietario]));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $proprietario = Proprietario::findOrFail($id);

        $proprietario->load('pagamentos');

        $pagamentos = $proprietario['pagamentos'];

        $total = 0;
        foreach ($pagamentos as $pagamento) {
            $total += $pagamento['valor'];
        }

        return view("conta/show", [
            "proprietario" => $proprietario,
            "divida_atual" => $total - $proprietario['divida_atual'],
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
