<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoRequest;
use App\Models\Servico;

class ServicoController extends Controller
{
    /**
     * Lista os Serviços.
     * @return  \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $servicos = Servico::paginate(10);

        return view('servicos.index')->with('servicos', $servicos);
    }

    /**
     * Exibe o formulário para criação de um Serviço.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('servicos.create');
    }

    /**
     * Registra um novo Serviço na base de dados.
     * @param ServicoRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */

    public function store(ServicoRequest $request)
    {
        $dados = $request->except('_token');

        Servico::create($dados);

        return redirect()->route('servicos.index')->with('mensagem', 'Serviço criado com sucesso');
    }

    /**
     * Exibe o formulário para edição de um Serviço.
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(int $id)
    {
        $servico = Servico::findOrFail($id);

        return view('servicos.edit')->with('servico', $servico);
    }

    /**
     * Altera um Serviço na base de dados.
     * @param int $id
     * @param ServicoRequest $request
     * @return  \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(int $id, ServicoRequest $request)
    {
        $dados = $request->except(['_token', '_method']);

        $servico = Servico::findOrFail($id);
        $servico->update($dados);

        return redirect()->route('servicos.index')->with('mensagem', 'Serviço atualizado com sucesso');

    }
}