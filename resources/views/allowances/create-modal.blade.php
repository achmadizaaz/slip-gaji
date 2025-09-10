<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
    Tambah baru
</button>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Tunjangan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('allowance.store') }}" method="POST">
        <div class="modal-body">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="defaultValue" class="form-label">Default Amount</label>
                <input type="text" name="default_amount" class="form-control rupiah" required id="defaultValue">
            </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambahkan</button>
        </div>
       </form>
    </div>
  </div>
</div>


