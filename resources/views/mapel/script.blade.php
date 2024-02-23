<script>
    $(document).ready(function () {
        // Setup AJAX headers for CSRF token
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Initialize DataTable
        var table = $('#mapelsTable').DataTable({
            ajax: {
                url: '/mapel/datatables',
                type: 'GET',
                dataSrc: 'data' // Sesuaikan dengan nama kunci yang berisi data
            },
            columns: [ 
                { data: 'kode' },
                { data: 'nama' },
                // { data: 'jenjang' }, 
                { data: 'nama_prodi' },
                {
                    data: null,
                    render: function (data, type, row) {
                        return '<i class="fa-solid fa-pen-to-square" onclick="editMapel(' + data.id + ')"></i> ' +
                            '<span style="margin-right: 10px;"></span>' +
                            '<i class="fa-solid fa-trash" onclick="deleteMapel(' + data.id + ')"></i>';
                    }
                }
            ]
        });

        // Function to save mapel
        window.saveMapel = function () {
            var id = $('#mapelId').val();
            var method = (id === '') ? 'POST' : 'PUT';

            $.ajax({
                url: '/mapel' + (method === 'POST' ? '' : '/' + id),
                type: method,
                data: {
                    kode: $('#kode').val(),
                    nama: $('#namaMapel').val(),
                    prodi_ids: $('#prodiMapel').val(),
                },
                success: function (response) {
                    toastr.success('Data berhasil disimpan', 'Sukses');
                    clearForm();
                    $('#mapelsTable').DataTable().ajax.reload();
                    // Disable modal if using Bootstrap modal
                    $('#mapelFormModal').modal('hide');
                },
                error: function (error) {
                    toastr.error('Gagal menyimpan data. Periksa kembali inputan anda.', 'Error');
                }
            });
        };

        // Function to edit mapel
        function editMapel(id) {
            $.ajax({
                url: '/mapel/' + id,
                type: 'GET',
                success: function (response) {
                    $('#mapelId').val(response.mapel.id);
                    $('#kode').val(response.mapel.kode);
                    $('#namaMapel').val(response.mapel.nama);

                    // Set selected values in Select2
                    $('#prodiMapel').val(response.mapel.prodi_ids).trigger('change');

                    $('#mapelFormModalLabel').text('Form Edit Data');
                    $('#simpanMapel').text('Simpan Perubahan');

                    // Show modal form after data is filled
                    $('#mapelFormModal').modal('show');
                },
                error: function (error) {
                    toastr.error('Gagal mengambil data mapel.', 'Error');
                }
            });
        }

        // Function to delete mapel
        window.deleteMapel = function (id) {
            $('#deleteConfirmationModal').modal('show');

            $('#confirmDelete').off('click').on('click', function () {
                $.ajax({
                    url: '/mapel/' + id,
                    type: 'DELETE',
                    success: function (response) {
                        toastr.success('Data berhasil dihapus', 'Sukses');
                        $('#mapelsTable').DataTable().ajax.reload();
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status == 404) {
                            toastr.warning('Data dengan ID tersebut tidak ditemukan.', 'Peringatan');
                        } else {
                            toastr.error('Gagal menghapus data mapel.', 'Error');
                        }
                    }
                });

                $('#deleteConfirmationModal').modal('hide');
            });
        };

        // Function to clear the form
        window.clearForm = function () {
            $('#mapelForm')[0].reset();
            $('#mapelId').val('');
            $('#kode').val('');
            $('#namaMapel').val('');
            $('#prodiMapel').val(null).trigger('change');
        };
    });
</script>
