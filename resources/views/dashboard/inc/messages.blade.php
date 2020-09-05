@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
        <div class="alert alert-success bg-info" style="text-align: center">
            {{ session('success') }}
        </div>
@endif

@if(session('error'))
        <div class="alert alert-danger bg-danger" style="text-align: center">
            {{ session('error') }}
        </div>
@endif