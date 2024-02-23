{{-- Modal Konfirmasi Hapus Jenjang --}}
<div class="modal fade" id="deleteConfirmationModalJenjang" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Penghapusan Jenjang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus jenjang?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteJenjang">Ya</button>
            </div>
        </div>
    </div>
</div><!-- End Disabled Backdrop Modal-->

<!-- Modal untuk Form Jenjang -->
<div class="modal fade" id="jenjangFormModal" tabindex="-1" role="dialog" aria-labelledby="jenjangFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jenjangFormModalLabel">Form Tambah Data Jenjang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> 
            <div class="modal-body">
                <form class="row g-3" id="jenjangForm">
                    @csrf
                    <input type="hidden" id="jenjangId">
                    <div class="col-md-12">
                        <input type="text" id="jenjangInput" class="form-control" placeholder="Jenjang...">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="button" onclick="saveJenjang()" id="simpanJenjang" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>
