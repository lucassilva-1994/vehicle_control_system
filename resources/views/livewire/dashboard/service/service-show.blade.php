<div wire:poll.1s>
    <h3>Serviços ({{ $services->count() }})</h3>
    @foreach ($services->load('vehicle','user','employee') as $service)
        <div class="card mb-3">
            <div class="card-header">
                <h5>{{ $service->description }}</h5>
            </div>
            <div class="card-body row">
                <div class="col-md-9">
                    <label>Veículo:</label>
                    <input type="text" class="form-control" readonly value="{{ $service->vehicle->brand }} - {{ $service->vehicle->model }} - {{ $service->vehicle->plate }}"/>
                </div>
                <div class="col-md-3">
                    <label>Valor:</label>
                    <input type="text" class="form-control" readonly value="R$ {{ number_format($service->value, 2, ",", "."); }}"/>
                </div>
                <div class="col-md-6">
                    <label>Criado por:</label>
                    <input type="text" class="form-control" readonly value="{{ $service->user->name }}"/>
                </div>
                <div class="col-md-6">
                    <label>Executado por:</label>
                    <input type="text" class="form-control" readonly value="{{  $service->employee->name  }}"/>
                </div>
            </div>
        </div>
    @endforeach

    <div class="row">
        @if ($services->hasMorePages())
            <div class="col-md-12 d-grid mb-3">
                <button class="btn btn-outline-primary btn-sm" wire:click="loadMore">Carregar mais...</button>
            </div>
        @endif
    </div>

</div>
