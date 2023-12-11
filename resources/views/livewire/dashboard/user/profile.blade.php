<div wire:poll.1s>
    @if (!auth()->user()->isAdmin)
        <div class="card mt-3 mb-3">
            <div class="card-header">
                <h4>Suas informações</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <fieldset>
                        <legend>Dados pessoais</legend>
                    </fieldset>
                    <div class="col-md-4">
                        <label>Nome:</label>
                        <input type="text" class="form-control" readonly disabled value="{{ $user->name }}" />
                    </div>
                    <div class="col-md-4">
                        <label>Usuário:</label>
                        <input type="text" class="form-control" readonly disabled value="{{ $user->username }}" />
                    </div>
                    <div class="col-md-4">
                        <label>Email:</label>
                        <input type="text" class="form-control" readonly disabled value="{{ $user->email }}" />
                    </div>
                    <div class="col-md-4">
                        <label>CPF:</label>
                        <input type="text" class="form-control" readonly disabled
                            value="{{ $user->employee->cpf }}" />
                    </div>
                    <div class="col-md-4">
                        <label>Cargo:</label>
                        <input type="text" class="form-control" readonly disabled
                            value="{{ $user->employee->jobTitle->name }}" />
                    </div>
                    <div class="col-md-4">
                        <label>Cadastrado em:</label>
                        <input type="text" class="form-control" readonly disabled
                            value="{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}" />
                    </div>
                    <fieldset>
                        <legend>Endereço</legend>
                    </fieldset>
                    <div class="col-md-2">
                        <label>CEP:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->employee->address->zipcode }}" />
                    </div>
                    <div class="col-md-5">
                        <label>Rua:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->employee->address->street }}" />
                    </div>
                    <div class="col-md-4">
                        <label>Bairro:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->employee->address->neighborhood }}" />
                    </div>
                    <div class="col-md-1">
                        <label>Número:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->employee->address->number }}" />
                    </div>
                    <div class="col-md-6">
                        <label>Complemento:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->employee->address->complement }}" />
                    </div>
                    <div class="col-md-5">
                        <label>Cidade:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->employee->address->city }}" />
                    </div>
                    <div class="col-md-1">
                        <label>UF:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->employee->address->state }}" />
                    </div>
                    @if ($user->employee->contacts->count())
                        <fieldset>
                            <legend>Seus contatos</legend>
                        </fieldset>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nome:</th>
                                        <th>Telefone:</th>
                                        <th>Email:</th>
                                        <th>Criado em:</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user->employee->contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->phone_number }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h4>Empresa</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <fieldset>
                        <legend>Dados da empresa:</legend>
                    </fieldset>
                    <div class="col-md-6">
                        <label>Nome empresa:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->company->legal_name }}" />
                    </div>
                    <div class="col-md-6">
                        <label>Nome fantasia:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->company->trade_name }}" />
                    </div>
                    <div class="col-md-4">
                        <label>CNPJ:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->company->cnpj }}" />
                    </div>
                    <div class="col-md-4">
                        <label>Email:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->company->contact_email }}" />
                    </div>
                    <div class="col-md-4">
                        <label>Email:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->company->contact_phone }}" />
                    </div>
                    <div class="col-md-2">
                        <label>CEP:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->company->address->zipcode }}" />
                    </div>
                    <div class="col-md-5">
                        <label>Rua:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->company->address->address }}" />
                    </div>
                    <div class="col-md-5">
                        <label>Cidade:</label>
                        <input type="text" class="form-control" disabled readonly
                            value="{{ $user->company->address->city }}" />
                    </div>
                    <fieldset>
                        <legend>Números da empresa:</legend>
                    </fieldset>
                    <div class="col-md-3">
                        <label>Veículos:</label>
                        <input type="text" class="form-control" disabled value="{{ $user->company->vehicles->count() }}"/>
                    </div>
                    <div class="col-md-3">
                        <label>Colaboradores:</label>
                        <input type="text" class="form-control" disabled value="{{ $user->company->employees->count() }}"/>
                    </div>
                    <div class="col-md-3">
                        <label>Cargos:</label>
                        <input type="text" class="form-control" disabled value="{{ $user->company->jobTitles->count() }}"/>
                    </div>
                    <div class="col-md-3">
                        <label>Serviços:</label>
                        <input type="text" class="form-control" disabled value="{{ $user->company->services->count() }}"/>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
