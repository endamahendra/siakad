@extends('layouts.app')

@section('content')
<!-- Pastikan untuk menyertakan jQuery jika belum terpasang -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Pastikan telah menyertakan DataTables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
<section class="section">
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Datatables</h5>
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#penggunaForm">
            <i class="bi-plus-circle me-2"></i>Tambah Data
          </button>
          <!-- Table with stripped rows -->
          <table id="penggunasTable" class="table datatable">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Bagian</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <!-- Data akan dimasukkan oleh DataTables melalui AJAX -->
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
          @include('beranda.modal')
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('script')
<script>
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var table = $('#penggunasTable').DataTable({
      ajax: {
        url: '/penggunas/datatables',
        type: 'GET',
        dataSrc: 'data'
      },
      columns: [
        { data: 'nama' },
        { data: 'email' },
        { data: 'bagian' },
        {
          data: null,
          render: function (data, type, row) {
            return '<button class="btn btn-sm btn-warning" onclick="editPengguna(' + data.id + ')">Edit</button>' +
              '<button class="btn btn-sm btn-danger" onclick="deletePengguna(' + data.id + ')">Delete</button>';
          }
        }
      ]
    });
  });

  function editPengguna(id) {
    // Fungsi untuk mengisi formulir dengan data pengguna yang akan diedit
    $.ajax({
      url: '/penggunas/' + id,
      type: 'GET',
      success: function (response) {
        $('#penggunaId').val(response.pengguna.id);
        $('#nama').val(response.pengguna.nama);
        $('#email').val(response.pengguna.email);
        $('#password').val('');
        $('#bagian').val(response.pengguna.bagian);
      },
      error: function (error) {
        alert('Gagal mengambil data pengguna.');
      }
    });
  }

  function deletePengguna(id) {
    if (confirm('Apakah Anda yakin ingin menghapus pengguna?')) {
      // Fungsi untuk menghapus pengguna
      $.ajax({
        url: '/penggunas/' + id,
        type: 'DELETE',
        success: function (response) {
          alert('Data berhasil dihapus');
          $('#penggunasTable').DataTable().ajax.reload();
        },
        error: function (error) {
          alert('Gagal menghapus data pengguna.');
        }
      });
    }
  }
</script>
@endpush
