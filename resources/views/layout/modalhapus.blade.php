<!-- Tambahkan di dalam body -->
{{-- <div id="deleteConfirmationModalContainer"></div>
<!-- Template Modal Konfirmasi Penghapusan -->
<div class="modal fade" id="deleteConfirmationModalTemplate" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin menghapus ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="deleteConfirmationModalConfirm">Hapus</button>
            </div>
        </div>
    </div> --}}
{{-- </div>
<script>
    // Fungsi untuk membuka modal konfirmasi penghapusan
    function openDeleteConfirmationModal(callback) {
        $('#deleteConfirmationModalContainer').html($('#deleteConfirmationModalTemplate').html());

        $('#deleteConfirmationModalConfirm').on('click', function() {
            // Panggil callback saat tombol "Hapus" diklik
            callback();
            // Tutup modal setelah mengkonfirmasi penghapusan
            $('#deleteConfirmationModalTemplate').modal('hide');
        });

        // Tampilkan modal
        $('#deleteConfirmationModalTemplate').modal('show');
    }
</script> --}}
