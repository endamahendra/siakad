<script>
    $(document).ready(function () {
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        var table = $('#penggunasTable').DataTable({
            "serverSide": true,
            "processing": true,
        ajax: {
            url: '/pengguna/datatables', 
            type: 'GET',
            dataSrc: 'data' // Sesuaikan dengan nama kunci yang berisi data
        },
        columns: [
            { data: 'nama' },
            { data: 'email' },
            { data: 'bagian' },
            {
                data: null,
                render: function (data, type, row) {
                    return '<i class="fa-solid fa-pen-to-square" onclick="editPengguna(' + data.id + ')"></i> ' +
                             '<span style="margin-right: 10px;"></span>' +    
                           '<i class="fa-solid fa-trash" onclick="deletePengguna(' + data.id + ')"></i>';
                }
            }
        ]
    });
});

// Fungsi untuk menambahkan atau mengedit pengguna
function savePengguna() {
    var id = $('#penggunaId').val();
    var method = (id === '') ? 'POST' : 'PUT';

    $.ajax({
        url: '/pengguna' + (method === 'POST' ? '' : '/' + id),
        type: method,
        data: {
            nama: $('#nama').val(),
            email: $('#emailInput').val(),
            password: $('#password').val(),
            bagian: $('#bagian').val(),
        },
        success: function (response) {
            toastr.success('Data berhasil disimpan', 'Sukses');
            clearForm();
            $('#penggunasTable').DataTable().ajax.reload();
            // Menonaktifkan modal jika menggunakan modal Bootstrap
            $('#penggunaFormModal').modal('hide');
        },
        error: function (error) {
            toastr.error('Gagal menyimpan data. Periksa kembali input Anda.', 'Error');
        }
    });
}


    // Fungsi untuk mengisi formulir dengan data pengguna yang akan diedit
 // Fungsi untuk mengisi formulir dengan data pengguna yang akan diedit
function editPengguna(id) {
    $.ajax({
        url: '/pengguna/' + id,
        type: 'GET',
        success: function (response) {
            $('#penggunaId').val(response.pengguna.id);
            $('#nama').val(response.pengguna.nama);
            $('#emailInput').val(response.pengguna.email);
            // Jangan mengisi password di sini untuk menghindari tampilan password di formulir
            // $('#password').val('');
            $('#bagian').val(response.pengguna.bagian);
             $('#penggunaFormModalLabel').text('Form Edit Data');
             $('#simpan').text('Simpan Perubahan');

            // Menampilkan modal formulir setelah data diisi
            $('#penggunaFormModal').modal('show');
        },
        error: function (error) {
            toastr.error('Gagal mengambil data pengguna.', 'Error');
        }
    });
}


    // Fungsi untuk menghapus pengguna
function deletePengguna(id) {
    // Menampilkan konfirmasi penghapusan menggunakan modal Bootstrap
    $('#deleteConfirmationModal').modal('show');

    // Mengonfigurasi aksi yang akan diambil jika pengguna menekan "Ya"
    $('#confirmDelete').on('click', function () {
        $.ajax({
            url: '/pengguna/' + id,
            type: 'DELETE',
            success: function (response) {
                toastr.success('Data berhasil dihapus', 'Sukses');
                $('#penggunasTable').DataTable().ajax.reload();
            },
            error: function (xhr, status, error) {
                if (xhr.status == 404) {
                    // ID tidak ditemukan di database
                    toastr.warning('Data dengan ID tersebut tidak ditemukan.', 'Peringatan');
                } else {
                    // Kesalahan lain
                    toastr.error('Gagal menghapus data pengguna.', 'Error');
                }
            }
        });

        // Menutup modal setelah pengguna menekan "Ya"
        $('#deleteConfirmationModal').modal('hide');
    });
}




    // Fungsi untuk membersihkan formulir
    function clearForm() { 
        $('#penggunaId').val('');
        $('#nama').val('');
        $('#emailInput').val('');
        $('#password').val('');
        $('#bagian').val('Akademik');
    }
</script>