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
                                            data-target="#pacienteModal"
                                            data-id="{{ $paciente->id }}"
                                            data-nome="{{ $paciente->nome }}"
                                            data-mae="{{ $paciente->mae }}"
                                            data-nascimento="{{ $paciente->nascimento }}"
                                            data-cpf="{{ $paciente->cpf }}"
                                            data-cns="{{ $paciente->cns }}"
                                            data-endereco="{{ $paciente->endereco }}"
                                        >Ver</button>
                                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                        <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="pacienteModal" tabindex="-1" role="dialog" aria-labelledby="pacienteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pacienteModalLabel">Detalhes do Paciente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @if(!empty($paciente))
                <div class="modal-body">
                    <p><span id="modal-nome">{{ $paciente->photo }}</span></p>
                    <p><strong>Nome Completo:</strong> <span id="modal-nome">{{ $paciente->nome }}</span></p>
                    <p><strong>Nome da Mãe:</strong> <span id="modal-mae">{{ $paciente->mae }}</span></p>
                    <p><strong>Data de Nascimento:</strong> <span id="modal-nascimento">{{ $paciente->nascimento->format('d/m/Y') }}</span></p>
                    <p><strong>CPF:</strong> <span id="modal-cpf">{{ $paciente->cpf }}</span></p>
                    <p><strong>CNS:</strong> <span id="modal-cns">{{ $paciente->cns }}</span></p>
                    <p><strong>Endereço:</strong> <span id="modal-endereco">{{ $paciente->cep }} - {{ $paciente->logradouro }} - {{ $paciente->bairro }} - {{ $paciente->localidade }} - {{ $paciente->uf }}</span></p>
                </div>
                @endif
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@endsection
