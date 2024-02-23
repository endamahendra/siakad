<div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="penggunaFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus pengguna?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger btn-sm" id="confirmDelete">Ya</button>
            </div>
        </div>
    </div>
</div>


              <!-- Modal untuk Form Pengguna -->
<div class="modal fade" id="penggunaFormModal" tabindex="-1" role="dialog" aria-labelledby="penggunaFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="penggunaFormModalLabel">Form Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="penggunaForm">
                @csrf
                 <input type="hidden" id="penggunaId">
               <div class="col-md-6">
                <div class="col-md-12">
                  <input type="text" id="nama" class="form-control" placeholder="Nama...">
                </div>
                </div>
                <div class="col-md-6">
                <div class="col-md-12">
                  <input type="email" id="emailInput"  class="form-control" placeholder="Email...">
                </div>
                </div>
                <div class="col-md-6">
                <div class="col-md-12">
                  <input type="password" id="password"  class="form-control" placeholder="Password">
                </div>
                </div>
                <div class="col-md-6">
                <div class="col-md-12">
                  <select id="bagian" class="form-select">
                      <option selected>--Pilihan Bagian--</option>
                      <option value="Akademik">Akademik</option>
                      <option value="Pengajar">Pengajar</option>
                      <option value="Mahasiswa">Mahasiswa</option>
                  </select>
                </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <!-- Tombol Simpan dan tombol lainnya dapat ditempatkan di sini -->
              <div class="text-center">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="submit" onclick="savePengguna()" id="simpan" class="btn btn-primary btn-sm">Simpan</button>
              </div>
            </div>
        </div>
    </div>
</div>
