<div>
    <div class="card">
        <div class="card-header">
            <h2>Novo colaborador</h2>
        </div>
        <div class="card-body">
            <form class="row mb-3" wire:submit="create">
                <fieldset>
                    <legend>Dados pessoais</legend>
                </fieldset>
                <div class="col-md-8">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" wire:model="name" class="form-control"
                        placeholder="Nome do novo colaborador" />
                </div>
                <div class="col-md-4">
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" wire:model="cpf" class="form-control" placeholder="CPF" />
                </div>
                <div class="col-md-6">
                    <label for="email">Email:</label>
                    <input type="email" id="email" wire:model="email" class="form-control"
                        placeholder="Email do colaborador" />
                </div>
                <div class="col-md-6">
                    <label for="job_title">Cargo:</label>
                    <select class="form-select" wire:model="job_title_id">
                        <option value="">Selecione uma opção</option>
                        @foreach ($jobTitles as $jobTitle)
                            <option value="{{ $jobTitle->id }}">{{ $jobTitle->name }}</option>
                        @endforeach
                    </select>
                </div>
                <fieldset>
                    <legend>Informações de endereço</legend>
                </fieldset>
                <div class="col-md-12 text-info" wire:loading wire:target="findAddress">
                    Carregando endereço...
                </div>
                <div class="col-md-2">
                    <label for="cep">CEP:</label>
                    <input type="text" class="form-control" wire:model.defer="zipcode" id="zipcode" placeholder="CEP"
                        wire:change="findAddress" />
                </div>
                <div class="col-md-5">
                    <label for="street">Rua:</label>
                    <input type="street" id="street" class="form-control" wire:model="street" placeholder="Rua" />
                </div>
                <div class="col-md-5">
                    <label for="neighborhood">Bairro:</label>
                    <input type="text" id="neighborhood" class="form-control" wire:model="neighborhood"
                        placeholder="Bairro" />
                </div>
                <div class="col-md-2">
                    <label for="number">Número:</label>
                    <input type="text" id="number" class="form-control" wire:model="number"
                        placeholder="Número" />
                </div>
                <div class="col-md-4">
                    <label for="complement">Complemento:</label>
                    <input type="text" id="complement" class="form-control" wire:model="complement"
                        placeholder="Complemento" />
                </div>
                <div class="col-md-5">
                    <label for="city">Cidade:</label>
                    <input type="text" id="city" wire:model="city" class="form-control" placeholder="Cidade" />
                </div>
                <div class="col-md-1">
                    <label for="state">Estado:</label>
                    <input type="text" id="state" class="form-control" wire:model="state" placeholder="Estado" />
                </div>
                <div class="col-md-4 d-grid">
                    <br />
                    <button type="submit" class="btn btn-sm btn-success">Enviar</button>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    @include('messages')
                </div>
            </div>
        </div>
    </div>
</div>
