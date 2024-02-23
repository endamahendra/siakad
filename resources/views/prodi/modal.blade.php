{{-- Modal Konfirmasi Hapus Prodi --}}

<div class="modal fade" id="deleteConfirmationModalProdi" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Penghapusan Prodi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus prodi?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteProdi">Ya</button>
            </div>
        </div>
    </div>
</div><!-- End Disabled Backdrop Modal-->
<!-- Modal konfirmasi hapus semua data -->
<div class="modal fade" id="deleteAllConfirmationModal" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus Semua Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus semua data Prodi? Operasi ini tidak dapat dibatalkan.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteAllBtn">Ya, Hapus Semua</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal untuk Form Prodi -->
<div class="modal fade" id="prodiFormModal" tabindex="-1" role="dialog" aria-labelledby="prodiFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"> 
                <h5 class="modal-title" id="prodiFormModalLabel">Form Tambah Data Prodi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="prodiForm">
                    @csrf
                    <input type="hidden" id="prodiId">
                    <div class="col-md-12">
                        <label for="namaProdi" class="form-label">Nama Prodi</label>
                        <input type="text" id="namaProdi" class="form-control" placeholder="Nama Prodi..." required>
                    </div> 
                    <div class="col-md-12">
                        <label for="jenjangProdi" class="form-label">Jenjang</label>
                        <select id="jenjangProdi" class="form-select" required>
                            <option value="" selected disabled>-- Pilih Jenjang --</option>
                            @foreach($jenjang_id as $data) 
                                <option value="{{ $data->id }}">{{ $data->jenjang }}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer"> 
                <div class="text-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="button" onclick="saveProdi()" id="simpanProdi" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

