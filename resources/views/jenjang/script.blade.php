<script>
$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#jenjangsTable').DataTable({
        ajax: {
            url: '/jenjang/datatables',
            type: 'GET',
            dataSrc: 'data' // Sesuaikan dengan nama kunci yang berisi data
        },
        columns: [
            
            { data: 'id' },
            { data: 'jenjang' },
            // Sesuaikan dengan kolom-kolom yang ada pada entitas Jenjang
            {
                data: null,
                render: function (data, type, row) {
                    return '<i class="fa-solid fa-pen-to-square" onclick="editJenjang(' + data.id + ')"></i> ' +
                             '<span style="margin-right: 10px;"></span>' +    
                           '<i class="fa-solid fa-trash" onclick="deleteJenjang(' + data.id + ')"></i>';
                }
            } 
        ]
    });
});

function saveJenjang() {
    var id = $('#jenjangId').val();
    var method = (id === '') ? 'POST' : 'PUT';

    $.ajax({
        url: '/jenjang' + (method === 'POST' ? '' : '/' + id),
        type: method,
        data: {
            jenjang: $('#jenjangInput').val(),
            // Sesuaikan dengan field-field yang ada pada entitas Jenjang
        },
        success: function (response) {
            toastr.success('Data berhasil disimpan', 'Sukses');
            clearForm();
            $('#jenjangsTable').DataTable().ajax.reload();
            $('#jenjangFormModal').modal('hide');
        },
        error: function (error) {
            toastr.error('Gagal menyimpan data. Periksa kembali input Anda.', 'Error');
        }
    });
}

function editJenjang(id) {
    $.ajax({
        url: '/jenjang/' + id,
        type: 'GET',
        success: function (response) {
            $('#jenjangId').val(response.jenjang.id);
            $('#jenjangInput').val(response.jenjang.jenjang);
            // Mengisi formulir dengan data yang akan diedit
            $('#jenjangFormModalLabel').text('Form Edit Data');
            $('#simpan').text('Simpan Perubahan');
            $('#jenjangFormModal').modal('show');
        },
        error: function (error) {
            toastr.error('Gagal mengambil data jenjang.', 'Error');
        }
    });
}

function deleteJenjang(id) {
    $('#deleteConfirmationModal').modal('show');

    $('#confirmDelete').on('click', function () {
        $.ajax({
            url: '/jenjang/' + id,
            type: 'DELETE',
            success: function (response) {
                toastr.success('Data berhasil dihapus', 'Sukses');
                $('#jenjangsTable').DataTable().ajax.reload();
            },
            error: function (xhr, status, error) {
                if (xhr.status == 404) {
                    toastr.warning('Data dengan ID tersebut tidak ditemukan.', 'Peringatan');
                } else {
                    toastr.error('Gagal menghapus data jenjang.', 'Error');
                }
            }
        });

        $('#deleteConfirmationModal').modal('hide');
    });
}

function clearForm() {
    $('#jenjangId').val('');
    $('#jenjangInput').val('');
    // Membersihkan formulir sesuai dengan field-field yang ada pada entitas Jenjang
}

</script>