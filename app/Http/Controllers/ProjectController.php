<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Enums\Status;

class ProjectController extends Controller
{
    // Método que retorna a view com a lista dos projetos.
    public function index()
    {
        $projects = Project::paginate(05);
        $status = Status::class;

        return view('projects.index', compact('projects', 'status'));
    }

    // Método que retorna a view de criação dos projetos.
    public function create()
    {
        $status = Status::class;

        return view('projects.create',  compact('status'));
    }

    // Método que valida os dados preenchidos pelo usuário e perssiste no banco de dados.
    public function store(Request $request)
    {

        // Validação dos dados enviados pelo usuário.
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'start_date' => 'required|date',
            'status' =>'required|in:Pendente,Em Andamento,Concluído',
        ]);

        Project::create($request->all());

        flash()->option('position', 'bottom-right')->title('Sucesso')->success('Projeto cadastrado com sucesso.');
        return redirect()->route('projects.index');

    }

    // Método que retorna um projeto especifico baseado no su ID
    public function show($id)
    {
        $project = Project::findOrFail($id);
        $status = Status::class;

        return view('projects.show', compact('project', 'status'));
    }

    // Método que retorna um projeto para sua página de edição
    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $status = Status::class;

        return view('projects.edit', compact('project', 'status'));
    }

    // Método que atualiza os dados de um projeto caso haja alteração
    public function update(Request $request, Project $project)
    {
        $validateData = $request -> validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date',
            'status' => 'required|in:Pendente,Em Andamento,Concluído',
            'observation' => 'nullable|string',
        ]);

        $project->update($validateData);

        flash()->option('position', 'bottom-right')->title('Sucesso')->success('Projeto atualizado com sucesso!.');
        return redirect()->route('projects.index');
    }

    // método de deleção do projeto.
    public function destroy(Project $project)
    {
        $project->delete();

        flash()->option('position', 'bottom-right')->title('Sucesso')->success('Projeto excluido com sucesso!.');
        return redirect()->route('projects.index');
    }
}
