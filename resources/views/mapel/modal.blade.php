              <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" data-bs-backdrop="false">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Konfirmasi Penghapusan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     Apakah Anda yakin ingin menghapus pengguna? 
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                      <button type="button" class="btn btn-danger" id="confirmDelete">Ya</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Disabled Backdrop Modal-->
<!-- Modal untuk Form Mapel -->
<div class="modal fade" id="mapelFormModal" tabindex="-1" role="dialog" aria-labelledby="mapelFormModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mapelFormModalLabel">Form Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="mapelForm">
                    @csrf
                    <input type="hidden" id="mapelId">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <input type="text" id="kode" class="form-control" placeholder="Kode Mata Kuliah...">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <input type="text" id="namaMapel" class="form-control" placeholder="Nama Mata Kuliah...">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <select id="prodiMapel" class="form-control" multiple>

                            </select>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <!-- Tombol Simpan dan tombol lainnya dapat ditempatkan di sini -->
                <div class="text-center">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" onclick="saveMapel()" id="simpanMapel" class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Skrip Ajax dan DataTables -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function () {
    var prodisOptions = [
        @foreach($prodis as $data) 
            { id: '{{ $data->id }}', text: '{{ $data->jenjang->jenjang }} - {{ $data->nama_prodi }}' },
        @endforeach
    ];

    $('#prodiMapel').select2({
        data: prodisOptions,
        placeholder: 'Pilih Program Studi',
        allowClear: true,
        dropdownParent: $('#mapelFormModal') // Tentukan parent dropdown
    });

    // Skrip lainnya tetap sama
});

</script>



