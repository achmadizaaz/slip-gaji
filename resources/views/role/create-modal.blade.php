    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
        <i class="bi bi-cloud-arrow-up me-1"></i> Create a role
    </button>


    <!-- Modal Create -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="createModalLabel">Create Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('role.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">
                            Name Role <span class="fst-italic text-danger">*</span>
                        </label>
                        <input type="text" name="name" class="form-control" required placeholder="Masukan nama role">
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">
                            Level <span class="fst-italic text-danger">*</span>
                        </label>
                        <select name="level" id="level" class="form-select" required>
                            <option value="">Choose a option</option>
                            @for ($i = 1; $i < 11; $i++)
                            <option value="{{ $i }}"> {{ $i }} </option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">
                            Description
                        </label>
                        <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="(Opsional) Silakan isikan deskripsi role"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Create role</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
            </div>
        </div>
    </div>