<div wire:poll.1s>
    <div class="card">
        <div class="card-header">
            <h3>{{ $user->name }}</h3>
        </div>
        <div class="card-body">
            <form class="row">
                <div class="col-md-6">
                    <label>Nome:</label>
                    <input type="text" class="form-control" value="{{ $user->name }}"/>
                </div>
                <div class="col-md-6">
                    <label>Email:</label>
                    <input type="email" class="form-control" value="{{ $user->email }}"/>
                </div>
                <div class="col-md-12">
                    <label>Permissões:</label>
                    @foreach ($roles as $role)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input"
                         wire:model="permission" value="{{ $role->id }}">
                        <label class="form-check-label">
                            {{ $role->description }}
                        </label>
                    </div>
                    @endforeach
                </div>
            </form>
        </div>
    </div>
</div>
