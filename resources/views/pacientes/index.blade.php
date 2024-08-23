@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Pacientes</h3>
                        <a href="{{ route('pacientes.create') }}" class="btn btn-primary">Adicionar Paciente</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pacientes as $paciente)
                                <tr>
                                    <td>{{ $paciente->nome }}</td>
                                    <td>
                                        <button
                                            class="btn btn-info btn-sm"
                                            data-toggle="modal"
                                            data-target="#pacienteModal{{ $paciente->id }}"
                                        >Ver</button>
                                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>

                                <div class="modal fade" id="pacienteModal{{ $paciente->id }}" tabindex="-1" role="dialog" aria-labelledby="pacienteModalLabel{{ $paciente->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="pacienteModalLabel{{ $paciente->id }}">Detalhes do Paciente</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center mb-3">
                                                    <img src="{{ asset('storage/' . $paciente->photo) }}" alt="Foto do Paciente" class="img-fluid rounded-circle" style="max-height: 150px;">
                                                </div>
                                                <p><strong>Nome Completo:</strong> {{ $paciente->nome }}</p>
                                                <p><strong>Nome da Mãe:</strong> {{ $paciente->mae }}</p>
                                                <p><strong>Data de Nascimento:</strong> {{ $paciente->nascimento->format('d/m/Y') }}</p>
                                                <p><strong>CPF:</strong> {{ $paciente->cpf }}</p>
                                                <p><strong>CNS:</strong> {{ $paciente->cns }}</p>
                                                <p><strong>Endereço:</strong> {{ $paciente->cep }} - {{ $paciente->logradouro }} - {{ $paciente->bairro }} - {{ $paciente->localidade }} - {{ $paciente->uf }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
