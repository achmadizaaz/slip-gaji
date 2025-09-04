<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
    Add new
</button>

<!-- Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="createModalLabel">Pengawai Baru</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('employee.store') }}" method="POST">
        <div class="modal-body">
            @csrf
            
            <div class="row">
              <div class="col mb-3">
                  <label for="nip" class="form-label">NIP</label>
                  <input type="text" name="nip" class="form-control" placeholder="0001 YPTM" autofocus required>
              </div>
              <div class="col mb-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" name="nama" class="form-control" placeholder="Employee name" required>
              </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="example@unmerpas.ac.id" required>
            </div>

            <div class="row">
              <div class="col">
                <div class="mb-3">
                    <label for="status" class="form-label">Status Kepengawaian</label>
                    <select name="status_kepegawaian" class="form-select" required>
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
                    <select name="is_active" class="form-select" required>
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
                  <input type="text" class="form-control" id="rupiah" name="gaji_pokok" placeholder="2.XXX.XXX" >
                  <span class="input-group-text">.00</span>
              </div>
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

<script>
  const rupiahInput = document.getElementById('rupiah');

  rupiahInput.addEventListener('input', function (e) {
    let value = this.value.replace(/\D/g, ""); // hanya angka
    value = new Intl.NumberFormat('id-ID').format(value); // format dengan titik
    this.value = value;
  });

  // biar saat pertama kali submit tidak kirim format "1.000.000"
  // form.addEventListener('submit', function () {
  //   let raw = rupiahInput.value.replace(/\D/g, "");
  //   amountInput.value = raw;
  // });
</script>
