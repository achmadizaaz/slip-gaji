<button type="button" class="btn btn-sm btn-warning edit" data-bs-toggle="modal" data-bs-target="#editModal" data-code="{{ $role->code }}" data-name="{{ $role->name }}" data-id="{{ $role->id }}" data-level="{{ $role->level }}"  data-is_admin="{{ $role->is_admin }}"
    data-description="{{ $role->description }}" data-bs-tooltip title="Edit">
    <i class="bi bi-pencil-square"></i>
</button>

<!-- Modal Change Password -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="editModalLabel">Edit Role</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" id="updateRole" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editCode" class="form-label">
                            Code Role <span class="fst-italic text-danger">*</span>
                        </label>
                        <input type="text" id="editCode"  name="code" class="form-control" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="editName">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="editLevel" class="form-label">
                            Level <span class="fst-italic text-danger">*</span>
                        </label>
                        <select name="level" class="form-select editLevel" required id="editLevel">
                            <option value="">Choose a option</option>
                            @for ($i = 1; $i < 11; $i++)
                            <option value="{{ $i }}"> {{ $i }} </option>
                            @endfor
                        </select>
                    </div> --}}
                    <div class="mb-3">
                        <label for="is_admin" class="form-label">
                            Level Admin <span class="fst-italic text-danger">*</span>
                        </label>
                        <select name="is_admin" id="editIsAdmin" class="form-select" required>
                            <option value="">Choose a option</option>
                            <option value="non-admin">Non Admin</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editDescription" class="form-label">Description</label>
                        <textarea name="description" class="form-control" id="editDescription" cols="30" rows="5">
                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Update role</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.edit').click(function(e) {
        let id = $(this).data('id');
        let code = $(this).data('code');
        let name = $(this).data('name');
        let level = $(this).data('level');
        let is_admin = $(this).data('is_admin');
        let description = $(this).data('description');
        let url = "{{ route('role.update', ':id') }}";
        route = url.replace(':id', id);

        // Insert Value Role
        $('#editCode').val(code);
        $('#editName').val(name);

        $('#editLevel').val(level ?? '');
        $('#editLevel').trigger('change');

        $('#editIsAdmin').val(is_admin ?? '');
        $('#editIsAdmin').trigger('change');
        $('#editDescription').text(description);

        $('#updateRole').attr('action', route);
    });
</script>