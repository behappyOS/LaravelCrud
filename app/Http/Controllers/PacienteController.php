<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Rules\Cns;
use Illuminate\Http\Request;
use App\Rules\Cpf;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all()->map(function ($paciente) {
            $paciente->nascimento = \Carbon\Carbon::parse($paciente->nascimento);
            return $paciente;
        });

        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.cadastro');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'mae' => 'required|string|max:255',
            'nascimento' => 'required|date',
            'cpf' => ['required', 'string', 'size:11', new Cpf()],
            'cns' => ['required', 'string', 'size:15', new Cns],
            'endereco' => 'required|string',
            'photo' => 'nullable|image',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $data['photo'] = $photoPath;
        }

        Paciente::create($data);

        return redirect()->route('pacientes.index');
    }

    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->nascimento = \Carbon\Carbon::parse($paciente->nascimento);
        return view('pacientes.editar', compact('paciente'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'mae' => 'required|string|max:255',
            'nascimento' => 'required|date',
            'cpf' => ['required', 'string', 'size:11', new Cpf()],
            'cns' => ['required', 'string', 'size:15', new Cns],
            'endereco' => 'required|string',
            'photo' => 'nullable|image',
        ]);

        $paciente = Paciente::findOrFail($id);
        $paciente->update($request->all());

        return redirect()->route('pacientes.index');
    }

    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return redirect()->route('pacientes.index');
    }
}

