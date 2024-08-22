@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Cadastrar Paciente</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pacientes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="nome">Nome Completo</label>
                                <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome') }}" required>
                                @error('nome')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="mae">Nome da Mãe</label>
                                <input type="text" name="mae" id="mae" class="form-control" value="{{ old('mae') }}" required>
                                @error('mae')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nascimento">Data de Nascimento</label>
                                <input type="date" name="nascimento" id="nascimento" class="form-control" value="{{ old('nascimento') }}" required>
                                @error('nascimento')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input type="text" name="cpf" id="cpf" class="form-control" value="{{ old('cpf') }}" maxlength="11" required>
                                @error('cpf')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cns">CNS</label>
                                <input type="text" name="cns" id="cns" class="form-control" value="{{ old('cns') }}" maxlength="15" required>
                                @error('cns')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="cep">CEP</label>
                                <input type="text" name="cep" id="cep" class="form-control" value="{{ old('cep') }}" required>
                                @error('cep')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="logradouro">Logradouro</label>
                                <input type="text" name="logradouro" id="logradouro" class="form-control" value="{{ old('logradouro') }}" required>
                                @error('logradouro')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="bairro">Bairro</label>
                                <input type="text" name="bairro" id="bairro" class="form-control" value="{{ old('bairro') }}" required>
                                @error('bairro')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="localidade">Cidade</label>
                                <input type="text" name="localidade" id="localidade" class="form-control" value="{{ old('localidade') }}" required>
                                @error('localidade')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="uf">Estado</label>
                                <input type="text" name="uf" id="uf" class="form-control" value="{{ old('uf') }}" required>
                                @error('uf')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="photo">Foto</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                                @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                            <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#cep').on('blur', function() {
                var cep = $(this).val().replace(/\D/g, '');

                if (cep.length === 8) {
                    $.ajax({
                        url: "{{ route('buscar.cep') }}",
                        type: 'POST',
                        data: {
                            cep: cep,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            if (!data.erro) {
                                $('#logradouro').val(data.logradouro);
                                $('#bairro').val(data.bairro);
                                $('#localidade').val(data.localidade);
                                $('#uf').val(data.uf);
                            } else {
                                alert('CEP não encontrado.');
                            }
                        },
                        error: function(xhr) {
                            console.error('Erro na requisição:', xhr.responseText);
                            alert('Erro ao buscar dados do CEP.');
                        }
                    });
                } else {
                    $('#logradouro').val('');
                    $('#bairro').val('');
                    $('#localidade').val('');
                    $('#uf').val('');
                }
            });
        });
    </script>
@endsection
