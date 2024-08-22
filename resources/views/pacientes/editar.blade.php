@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar Paciente</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="nome">Nome Completo</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $paciente->nome) }}" required>
                                @error('nome')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mae">Nome da Mãe</label>
                                <input type="text" name="mae" id="mae" class="form-control" value="{{ old('mae', $paciente->mae) }}" required>
                                @error('mae')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nascimento">Data de Nascimento</label>
                                <input type="date" name="nascimento" id="nascimento" class="form-control" value="{{ old('nascimento', $paciente->nascimento->format('Y-m-d')) }}" required>
                                @error('nascimento')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf', $paciente->cpf) }}" maxlength="11" required>
                                @error('cpf')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cns">CNS</label>
                                <input type="text" name="cns" id="cns" class="form-control" value="{{ old('cns', $paciente->cns) }}" maxlength="15" required>
                                @error('cns')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" id="cep" class="form-control" value="{{ old('cep', $paciente->cep) }}" required>
                                @error('cep')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" name="logradouro" id="logradouro" class="form-control" value="{{ old('logradouro', $paciente->logradouro) }}" required>
                                @error('logradouro')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="bairro" id="bairro" class="form-control" value="{{ old('bairro', $paciente->bairro) }}" required>
                                @error('bairro')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="localidade">Cidade</label>
                                <input type="text" name="localidade" id="localidade" class="form-control" value="{{ old('localidade', $paciente->localidade) }}" required>
                                @error('localidade')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="uf">Estado</label>
                                <input type="text" name="uf" id="uf" class="form-control" value="{{ old('uf', $paciente->uf) }}" required>
                                @error('uf')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="photo">Foto</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                                @if($paciente->photo)
                                    <img src="{{ asset('storage/' . $paciente->photo) }}" alt="Foto" class="img-thumbnail mt-2" style="max-width: 200px;">
                                @endif
                                @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
