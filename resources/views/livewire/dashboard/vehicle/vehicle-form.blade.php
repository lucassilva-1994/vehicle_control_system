<div>
    <h2>Veículos</h2>
    <div class="card">
        <div class="card-header">
            <h3>{{ $vehicle ? 'Atualizar veículo' : 'Novo veículo' }}</h3>
        </div>
        <form class="row card-body" wire:submit="{{ $vehicle ? 'update' : 'create' }}">
            <div class="col-md-3">
                <label for="brand">Marca:</label>
                <input type="text" class="form-control" wire:model="brand" />
            </div>
            <div class="col-md-6">
                <label for="model">Modelo:</label>
                <input type="text" class="form-control" wire:model="model" />
            </div>
            <div class="col-md-3">
                <label for="renavan">Renavan:</label>
                <input type="text" class="form-control" wire:model="renavan" />
            </div>
            <div class="col-md-3">
                <label for="plate">Placa:</label>
                <input type="text" class="form-control" wire:model="plate" />
            </div>
            <div class="col-md-2">
                <label for="color">Cor:</label>
                <input type="text" class="form-control" wire:model="color" />
            </div>
            <div class="col-md-2">
                <label for="year">Ano:</label>
                <input type="text" class="form-control" wire:model="year" />
            </div>
            <div class="col-md-5 d-grid">
                <br />
                <button class="btn btn-success">Enviar</button>
            </div>
        </form>
        <div class="row">
            <div class="col-md-12">
                @include('messages')
            </div>
        </div>
    </div>
    @if ($vehicles->count())
        <div class="card mt-5 mb-5">
            <div class="card-header">
                <h3>Últimos registros</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Marca:</th>
                                <th>Modelo:</th>
                                <th>Placa:</th>
                                <th>Ano:</th>
                                <th>Cor:</th>
                                <th>Renavan:</th>
                                <th>Cadastrado por:</th>
                                <th>Cadastrado em:</th>
                                <th>Ações:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicles as $vehicle)
                                <tr class="text-nowrap">
                                    <td>{{ $vehicle->brand }}</td>
                                    <td>{{ $vehicle->model }}</td>
                                    <td>{{ $vehicle->plate }}</td>
                                    <td>{{ $vehicle->year }}</td>
                                    <td>{{ $vehicle->color }}</td>
                                    <td>{{ $vehicle->renavan }}</td>
                                    <td>{{ $vehicle->user->username }}</td>
                                    <td>{{ $vehicle->created_at }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('vehicle.edit',$vehicle->id) }}" class="btn btn-success" wire:navigate>
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <button class="btn btn-danger" wire:click="delete('{{ $vehicle->id }}')" wire:confirm="Tem certeza que deseja excluir esse item?">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
