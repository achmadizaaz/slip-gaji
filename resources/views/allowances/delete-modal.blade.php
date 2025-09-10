
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
                    <label for="confirm_delete" class="form-label">Anda yakin ingin menghapus tunjangan,   <span id="deleteName" class="fw-bold text-danger"></span></label>
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
        let id = $(this).data('id');
        let url = "{{ route('allowance.delete', ':id') }}";
        route = url.replace(':id', id);
        $('#deleteName').text(name);
        $('#formDelete').attr('action', route);
    });
</script>
