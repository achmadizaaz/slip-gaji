
<button type="button" class="btn btn-sm btn-danger confirm_delete" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-name="{{ $employee->nama }}" data-slug="{{ $employee->slug }}" data-bs-tooltip="tooltip" title="Remove">
    <i class="bi bi-trash"></i>
</button>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="deleteModalLabel">Delete</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="#" id="formDelete" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <label for="confirm_delete" class="form-label">Anda yakin ingin menghapus pengawai,   <span id="deleteName" class="fw-bold text-danger"></span></label>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('.confirm_delete').click(function(e) {
        let name = $(this).data('name');
        let slug = $(this).data('slug');
        let url = "{{ route('employee.delete', ':slug') }}";
        route = url.replace(':slug', slug);
        $('#deleteName').text(name);
        $('#formDelete').attr('action', route);
    });
</script>