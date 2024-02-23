{{-- Modal Konfirmasi Hapus Mahasiswa --}}
<div class="modal fade" id="deleteConfirmationModalMahasiswa" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Penghapusan Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus mahasiswa?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteMahasiswa">Ya</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk Form Mahasiswa -->
<div class="modal fade" id="mahasiswaFormModal" tabindex="-1" role="dialog" aria-labelledby="mahasiswaFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mahasiswaFormModalLabel">Form Tambah Data Mahasiswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> 
            <div class="modal-body">
                <form class="row g-3" id="mahasiswaForm">
                    @csrf
                    <input type="hidden" id="mahasiswaId">
                    <div class="col-md-12">
                        <input type="text" id="namaInput" class="form-control" placeholder="Nama...">
                    </div>
                    <div class="col-md-12">
                        <textarea id="alamatInput" class="form-control" placeholder="Alamat..."></textarea>
                    </div>
                    <div class="col-md-12">
                        <input type="number" id="teleponInput" class="form-control" placeholder="Nomor Telepon..." oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                    </div>
                    <div class="col-md-12">
                        <input type="text" id="emailInput" class="form-control" placeholder="Email...">
                    </div>
                    <div class="col-md-12">
                        <input type="text" id="tanggalMasukInput" class="form-control datepicker" placeholder="Tanggal Masuk...">
                    </div>
                    <div class="col-md-12">
                        <select id="programStudiInput" class="form-select">
                            <option value="DIII Manajemen Informatika">DIII Manajemen Informatika</option>
                            <option value="DIII Manajemen Administrasi">DIII Manajemen Administrasi</option>
                            <option value="S1 Usaha Perjalanan Wisata">S1 Usaha Perjalanan Wisata</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="button" onclick="saveMahasiswa()" id="simpanMahasiswa" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
// Inisialisasi datepicker
$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    todayHighlight: true,
});
</script>
