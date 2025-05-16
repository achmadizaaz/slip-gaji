@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <button type="button" class="btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        <strong>Errors:</strong>
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif