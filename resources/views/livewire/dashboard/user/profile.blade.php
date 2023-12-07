<div wire:poll.1s>
    @if (!auth()->user()->isAdmin)
        <div class="card">
            <div class="card-header">
                <h2>Empresa</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label>Nome empresa:</label>
                        <input type="text" class="form-control" disabled readonly value="{{ $employee->company->legal_name }}"/>
                    </div>
                    <div class="col-md-6">
                        <label>Nome fantasia:</label>
                        <input type="text" class="form-control" disabled readonly value="{{ $employee->company->trade_name }}"/>
                    </div>
                    <div class="col-md-4">
                        <label>CNPJ:</label>
                        <input type="text" class="form-control" disabled readonly value="{{ $employee->company->cnpj }}"/>
                    </div>
                    <div class="col-md-4">
                        <label>Email:</label>
                        <input type="text" class="form-control" disabled readonly value="{{ $employee->company->contact_email }}"/>
                    </div>
                    <div class="col-md-4">
                        <label>Email:</label>
                        <input type="text" class="form-control" disabled readonly value="{{ $employee->company->contact_phone }}"/>
                    </div>
                    <div class="col-md-2">
                        <label>CEP:</label>
                        <input type="text" class="form-control" disabled readonly value="{{ $employee->company->address->post_code }}"/>
                    </div>
                    <div class="col-md-5">
                        <label>Rua:</label>
                        <input type="text" class="form-control" disabled readonly value="{{ $employee->company->address->address }}"/>
                    </div>
                    <div class="col-md-5">
                        <label>Cidade:</label>
                        <input type="text" class="form-control" disabled readonly value="{{ $employee->company->address->city }}"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3 mb-3">
            <div class="card-header">
                <h2>Sobre você</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <label>Nome:</label>
                        <input type="text" readonly disabled value="{{ $employee->name }}" class="form-control"/>
                    </div>
                    <div class="col-md-4">
                        <label>CPF:</label>
                        <input type="text" readonly disabled value="{{ $employee->cpf }}" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label>Email:</label>
                        <input type="text" readonly disabled value="{{ $employee->email }}" class="form-control"/>
                    </div>
                    <div class="col-md-6">
                        <label>Cargo:</label>
                        <input type="text" readonly disabled value="{{ $employee->jobTitle->name }}" class="form-control"/>
                    </div>
                    <fieldset>
                        <legend>Informações de endereço</legend>
                    </fieldset>
                    <div class="col-md-2">
                        <label>CEP:</label>
                        <input type="text" readonly disabled value="{{ $employee->employeeAddress->postcode }}" class="form-control"/>
                    </div>
                    <div class="col-md-5">
                        <label>Rua:</label>
                        <input type="text" readonly disabled value="{{ $employee->employeeAddress->street }}" class="form-control"/>
                    </div>
                    <div class="col-md-5">
                        <label>Bairro:</label>
                        <input type="text" readonly disabled value="{{ $employee->employeeAddress->neighborhood ? $employee->employeeAddress->neighborhood: 'Não informado'}}" class="form-control"/>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
