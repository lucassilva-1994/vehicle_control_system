<div>
    <div class="card mb-5">
        <div class="card-header">
            <h3>Colaboradores</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-nowrap">
                            <th>Nome:</th>
                            <th>Email:</th>
                            <th>CPF:</th>
                            <th>Cargo:</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees->load('jobTitle','user') as $employee)
                            <tr class="text-nowrap">
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->cpf }}</td>
                                <td>{{ str($employee->jobTitle->name)->words(4) }}</td>
                                <td class="btn-group btn-group-sm">
                                    <button class="btn btn-primary" {{ $employee->user ? 'disabled' : ''}}
                                        wire:click="createUser('{{ $employee->id }}')">
                                        Criar usuário
                                    </button>
                                    <button class="btn btn-danger" wire:click="delete('{{ $employee->id }}')">Excluir</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
