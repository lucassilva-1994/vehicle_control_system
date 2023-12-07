<div class=" d-flex align-items-center justify-content-center">
    <div class="col-12 col-md-5 mt-5">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Entrar</h5>
            </div>
            <div class="card-body">
                    <form wire:submit="auth">
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" wire:model="email" id="email"
                                placeholder="Seu e-mail">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" wire:model="password" id="password"
                                placeholder="Sua senha">
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>
                    </form>
            </div>
            @include('messages')
        </div>
    </div>
</div>
