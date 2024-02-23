    <script>
        $(document).ready(function () {
             $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                         }
                         });
                                var table = $('#prodisTable').DataTable({
                                        "serverSide": true,
                                        "processing": true,
                                        ajax: {
                                            url: '{{ route('prodi.datatables') }}', // URL for server-side processing
                                            type: 'GET',
                                            dataSrc: 'data' // Key containing the data array in the server response
                                        },
                                        columns: [ 
                                            { data: 'DT_RowIndex', name: 'DT_RowIndex' }, 
                                            { data: 'jenjang' },// Index column
                                            { data: 'nama_prodi' },// Index column
                                            { data: 'created_at' , render: DataTable.render.date('DD MMM YYYY')},
                                            { data: 'updated_at' , render: DataTable.render.date('DD MMM YYYY')},
                                            {
                                                data: null,
                                                render: function (data, type, row) {
                                                    return '<i class="fa-solid fa-pen-to-square" onclick="editProdi(' + data.id + ')"></i> ' +
                                                                '<span style="margin-right: 10px;"></span>' +    
                                                            '<i class="fa-solid fa-trash" onclick="deleteProdi(' + data.id + ')"></i>';
                                                },orderable: false 
                                            }
                                        ]
                                    });


                                    // Tangani perubahan pengurutan
                                    $('#prodisTable thead').on('click', 'th', function () {
                                        var columnIndex = table.column(this).index();
                                        var currentOrder = table.order()[0];
                                        var direction = 'asc';

                                        if (currentOrder[0] === columnIndex && currentOrder[1] === 'asc') {
                                            direction = 'desc';
                                        }

                                        table.order([columnIndex, direction]).draw();
                                    });


                        // Fungsi untuk menambah atau mengedit Prodi
                        // function saveProdi() 
                        saveProdi= function (){
                            var id = $('#prodiId').val();
                            var method = (id === '') ? 'POST' : 'PUT';

                            $.ajax({
                                url: '/prodi' + (method === 'POST' ? '' : '/' + id),
                                type: method,
                                data: {
                                    nama_prodi: $('#namaProdi').val(),
                                    jenjang_id: $('#jenjangProdi').val(),
                                },
                                success: function (response) {
                                  toastr.success(response.success, 'Sukses');
                                    clearFormProdi();
                                    $('#prodisTable').DataTable().ajax.reload();
                                    // Menonaktifkan modal jika menggunakan modal Bootstrap
                                    $('#prodiFormModal').modal('hide');
                                },
                                error: function (error) {
                                    toastr.error('Gagal menyimpan data karena adanya duplikasi. Mohon memastikan bahwa data yang dimasukkan tidak identik dengan yang telah ada dalam basis data. Harap untuk mengevaluasi kembali input yang diberikan.', 'Error');
                                }
                            });
                        }
                        // Fungsi untuk mengisi formulir dengan data Prodi yang akan diedit

                        editProdi = function (id) {
                            $.ajax({
                                url: '/prodi/' + id + '/edit',
                                type: 'GET',
                                success: function (response) {
                                    // console.log('Data Prodi yang Ditemukan:', response);
                                    if (response.prodi) {
                                        $('#namaProdi').val(response.prodi.nama_prodi);
                                        $('#jenjangProdi').val(response.prodi.jenjang_id).trigger('change'); // Trigger select2 change event
                                        $('#prodiId').val(response.prodi.id);
                                        $('#prodiFormModal').modal('show');
                                         $('#prodiFormModalLabel').text('Form Edit Data');
                                         $('#simpanProdi').text('Simpan Perubahan');
                                    } else {
                                        toastr.error('Data Prodi tidak ditemukan.', 'Error');
                                    }
                                },
                                error: function (xhr, status, error) {
                                    toastr.error('Gagal mengambil data Prodi. Status: ' + status, 'Error');
                                    console.error(xhr.responseText); // Log full error response to console
                                }
                            });
                        }




                                                // Fungsi untuk menghapus Prodi
                                                // function deleteProdi(id) {
                                            deleteProdi = function (id){
                                                // console.log('Delete Button Clicked. ID:', id);
                                                    // Menampilkan konfirmasi penghapusan menggunakan modal Bootstrap
                                                    $('#deleteConfirmationModalProdi').modal('show');

                                                    // Mengonfigurasi aksi yang akan diambil jika pengguna menekan "Ya"
                                                    $('#confirmDeleteProdi').on('click', function () {
                                                        $.ajax({
                                                            url: '/prodi/' + id,
                                                            type: 'DELETE',
                                                            success: function (response) {
                                                                toastr.success(response.success, 'Sukses');
                                                                $('#prodisTable').DataTable().ajax.reload();
                                                            },
                                                            error: function (xhr, status, error) {
                                                                if (xhr.status == 404) {
                                                                    // ID tidak ditemukan di database
                                                                    toastr.warning('Data dengan ID tersebut tidak ditemukan.', 'Peringatan');
                                                                } else {
                                                                    // Kesalahan lain
                                                                    toastr.error('Gagal menghapus data Prodi.', 'Error');
                                                                }
                                                            }
                                                        });

                                                        // Menutup modal setelah pengguna menekan "Ya"
                                                        $('#deleteConfirmationModalProdi').modal('hide');
                                                    });
                                                }

                                clearFormProdi  = function () {
                                    $('#prodiForm')[0].reset();
                                    $('#jenjangProdi').val(null).trigger('change'); // Trigger select2 change event
                                    $('#prodiId').val('');
                                    }




                                     deleteProdiAll = function (){
                                                // console.log('Delete Button Clicked. ID:', id);
                                                    // Menampilkan konfirmasi penghapusan menggunakan modal Bootstrap
                                                    $('#deleteAllConfirmationModal').modal('show');

                                                    // Mengonfigurasi aksi yang akan diambil jika pengguna menekan "Ya"
                                                    $('#confirmDeleteAllBtn').on('click', function () {
                                                        $.ajax({
                                                            url: '{{ route('prodi.destroy.all') }}',
                                                            type: 'DELETE',
                                                            success: function (response) {
                                                                toastr.success(response.success, 'Sukses');
                                                                $('#prodisTable').DataTable().ajax.reload();
                                                            },
                                                            error: function (xhr, status, error) {
                                                                if (xhr.status == 404) {
                                                                    // ID tidak ditemukan di database
                                                                    toastr.warning('Data PROGRAM STUDI tidak ada.', 'Peringatan');
                                                                } else {
                                                                    // Kesalahan lain
                                                                    toastr.error('Gagal menghapus data Prodi.', 'Error');
                                                                }
                                                            }
                                                        });

                                                        // Menutup modal setelah pengguna menekan "Ya"
                                                        $('#deleteAllConfirmationModal').modal('hide');
                                                    });
                                                }

                                    // clearFormProdi  = function () {
                                    // $('#prodiForm')[0].reset();
                                    // $('#jenjangProdi').val(null).trigger('change'); // Trigger select2 change event
                                    // $('#prodiId').val('');
                                    // }
                        });

                       

</script>