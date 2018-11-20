@if ($errors->any())
    <div class="card-body alert alert-danger col-md-12">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
