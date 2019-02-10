@if (session()->has('success-msg'))
    <div class="alert alert-success alertify s">
        {{ session('success-msg') }}
    </div>
@endif

@if (session()->has('error-msg'))
    <div class="alert alert-danger alertify r">
        {{ session('error-msg') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alertify r">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


