<div>
    <div class="card mb-3">
        <div class="card-header">
            <h2>Seus veículos ({{ $vehicles->count() }})</h2>
        </div>
        <div class="card-body">
            <div class="mb-2">
                <select wire:model.live="perPage" class="form-select">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <input type="text" class="form-control mb-2" placeholder="Digite sua busca aqui..." wire:model.live="search"/>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Marca:</th>
                            <th>Modelo:</th>
                            <th>Placa:</th>
                            <th>Cor:</th>
                            <th>Ano:</th>
                            <th>Renavan:</th>
                            <th>Serviços:</th>
                            <th>Valores:</th>
                            <th>Cadastrado por:</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles->load('user','services') as $vehicle)
                            <tr class="text-nowrap">
                                <td>{{ $vehicle->brand }}</td>
                                <td>{{ $vehicle->model }}</td>
                                <td>{{ $vehicle->plate }}</td>
                                <td>{{ $vehicle->color }}</td>
                                <td>{{ $vehicle->year }}</td>
                                <td>{{ $vehicle->renavan }}</td>
                                <td>{{ $vehicle->services->count() }}</td>
                                <td>R$ {{ number_format($vehicle->services_sum_value, 2, ",", ".") }}</td>
                                <td>{{ $vehicle->user->username }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="mt-3">
                    <ul class="pagination justify-content-center">
                        <li>
                            {{ $vehicles->appends(request()->except('_token'))->links() }}
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>


</div>
