<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Pengawai Baru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="formUpdate">
          @csrf
          @method('PUT')
        <div class="modal-body">

            <div class="row">
              <div class="col mb-3">
                  <label for="nip" class="form-label">NIP</label>
                  <input type="text" name="nip" class="form-control" placeholder="0001 YPTM" autofocus required id="editNIP">
              </div>
              <div class="col mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="Employee name" required id="editName">
              </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="example@unmerpas.ac.id" required id="editEmail">
            </div>

            <div class="row">
              <div class="col">
                <div class="mb-3">
                    <label for="status" class="form-label">Status Kepengawaian</label>
                    <select name="status_kepegawaian" class="form-select" required id="editStatusKepegawaian">
                        <option value="">Silahkan pilih satu</option>
                        <option value="Kontrak">Kontrak</option>
                        <option value="Honorer">Honorer</option>
                        <option value="Tetap">Tetap</option>
                    </select>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="is-active" class="form-label">Aktif?</label>
                    <select name="is_active" class="form-select" required id="editIsActive">
                        <option value="">Silahkan pilih satu</option>
                        <option value="1">Aktif</option>
                        <option value="0">Non Aktif</option>
                    </select>
                </div>
              </div>

            </div>


            <div class="mb-3">
              <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
              <div class="input-group mb-3">
                  <span class="input-group-text">Rp</span>
                  <input type="text" class="form-control rupiah"  name="gaji_pokok" placeholder="2.XXX.XXX"  id="editGajiPokok">
                  <span class="input-group-text">.00</span>
              </div>
          </div>


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-warning">Update</button>
        </div>
       </form>
    </div>
  </div>
</div>

<script>

    function formatRupiah(value) {
        value = value.toString().replace(/\D/g, "");
        return value
            ? new Intl.NumberFormat('id-ID', { minimumFractionDigits: 0 }).format(value)
            : "";
    }

  $('.edit').click(function(e) {
        let slug = $(this).data('slug');
        let nip = $(this).data('nip');
        let name = $(this).data('name');
        let email = $(this).data('email');
        let statusKepegawaian = $(this).data('kepegawaian');
        let isActive = $(this).data('is_active');
        let url = "{{ route('employee.update', ':slug') }}";
        route = url.replace(':slug', slug);

        // ambil dari data attribute
        let gajiPokok = $(this).data('gaji'); // contoh "10000.00"

        // buang .00 kalau ada
        gajiPokok = gajiPokok.toString().split('.')[0];

        // masukkan ke input sudah terformat
        $('#editGajiPokok').val(formatRupiah(gajiPokok));

        // Insert Value Role
        $('#editName').val(name);
        $('#editNIP').val(nip);
        $('#editGajiPokok').val(formatRupiah(gajiPokok));
        $('#editEmail').val(email);

        $('#editStatusKepegawaian').val(statusKepegawaian ?? '');
        $('#editStatusKepegawaian').trigger('change');

        $('#editIsActive').val(isActive ?? '');
        $('#editIsActive').trigger('change');


        $('#formUpdate').attr('action', route);
    });
</script>
