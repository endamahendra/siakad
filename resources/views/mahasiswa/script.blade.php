<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#mahasiswasTable').DataTable({
        ajax: {
            url: '/mahasiswa/datatables',
            type: 'GET',
            dataSrc: 'data' // Sesuaikan dengan nama kunci yang berisi data
        },
        columns: [
            { data: 'id' },
            { data: 'Nama' },
            { data: 'Alamat' },
            { data: 'Nomor_Telepon' },
            { data: 'Email' }, 
            { 
                data: 'Tanggal_Masuk',
                render: function (data, type, row) {
                    // Menggunakan moment.js untuk memformat tanggal
                    return moment(data).format('DD/MM/YYYY');
                }
            },
            { data: 'Program_Studi' },
            {
                data: null,
                render: function (data, type, row) {
                     return '<i class="fa-solid fa-pen-to-square" onclick="editMahasiswa(' + data.id + ')"></i> ' +
                             '<span style="margin-right: 10px;"></span>' +    
                           '<i class="fa-solid fa-trash" onclick="deleteMahasiswa(' + data.id + ')"></i>';
                }
            }
        ]
    });
});

function saveMahasiswa() {
    var id = $('#mahasiswaId').val();
    var method = (id === '') ? 'POST' : 'PUT';

    $.ajax({
        url: '/mahasiswa' + (method === 'POST' ? '' : '/' + id),
        type: method,
        data: {
            Nama: $('#namaInput').val(),
            Alamat: $('#alamatInput').val(),
            Nomor_Telepon: $('#teleponInput').val(),
            Email: $('#emailInput').val(),
            Tanggal_Masuk: $('#tanggalMasukInput').val(),
            Program_Studi: $('#programStudiInput').val(),
            // Sesuaikan dengan field-field yang ada pada entitas Mahasiswa
        },
        success: function (response) {
            toastr.success('Data berhasil disimpan', 'Sukses');
            clearForm();
            $('#mahasiswasTable').DataTable().ajax.reload();
            $('#mahasiswaFormModal').modal('hide');
        },
        error: function (error) {
            toastr.error('Gagal menyimpan data. Periksa kembali input Anda.', 'Error');
        }
    });
}

function editMahasiswa(id) {
    $.ajax({
        url: '/mahasiswa/' + id,
        type: 'GET',
        success: function (response) {
            $('#mahasiswaId').val(response.mahasiswa.id);
            $('#namaInput').val(response.mahasiswa.Nama);
            $('#alamatInput').val(response.mahasiswa.Alamat);
            $('#teleponInput').val(response.mahasiswa.Nomor_Telepon);
            $('#emailInput').val(response.mahasiswa.Email);
            $('#tanggalMasukInput').val(response.mahasiswa.Tanggal_Masuk);
            $('#programStudiInput').val(response.mahasiswa.Program_Studi);
            // Mengisi formulir dengan data yang akan diedit
            $('#mahasiswaFormModalLabel').text('Form Edit Data');
            $('#simpanMahasiswa').text('Simpan Perubahan');
            $('#mahasiswaFormModal').modal('show');
        },
        error: function (error) {
            toastr.error('Gagal mengambil data mahasiswa.', 'Error');
        }
    });
}

function deleteMahasiswa(id) {
    $('#deleteConfirmationModalMahasiswa').modal('show');

    $('#confirmDeleteMahasiswa').on('click', function () {
        $.ajax({
            url: '/mahasiswa/' + id,
            type: 'DELETE',
            success: function (response) {
                toastr.success('Data berhasil dihapus', 'Sukses');
                $('#mahasiswasTable').DataTable().ajax.reload();
            },
            error: function (xhr, status, error) {
                if (xhr.status == 404) {
                    toastr.warning('Data dengan ID tersebut tidak ditemukan.', 'Peringatan');
                } else {
                    toastr.error('Gagal menghapus data mahasiswa.', 'Error');
                }
            }
        });

        $('#deleteConfirmationModalMahasiswa').modal('hide');
    });
}

function clearForm() {
    $('#mahasiswaId').val('');
    $('#namaInput').val('');
    $('#alamatInput').val('');
    $('#teleponInput').val('');
    $('#emailInput').val('');
    $('#tanggalMasukInput').val('');
    $('#programStudiInput').val('');
    // Membersihkan formulir sesuai dengan field-field yang ada pada entitas Mahasiswa
}
</script>
