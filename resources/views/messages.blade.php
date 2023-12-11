<div>
    @if (session('success'))
        <div class="alert alert-success">
            <h7><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</h7>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            <h7><i class="bi bi-x-circle-fill"></i> {{ session('error') }}</h7>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <h7><i class="bi bi-x-circle-fill"></i> {{ $error }}<br /></h7>
            @endforeach
        </div>
    @endif
</div>
