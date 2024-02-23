<!-- resources/views/pengguna/index.blade.php -->

@extends('layout.app')
@section('content')
@include('pengguna.modal')
<div id="contentContainerPengguna">
  <!-- Tabel untuk menampilkan data -->
          <div class="card">
            <div class="card-body">             
                 <h6 class="card-title">Daftar Data Pengguna</h6>
                 <div style="margin-bottom: 10px;">
                 <button type="button" class="btn btn-primary" onclick="clearForm(); $('#penggunaFormModal').modal('show');">
                    <i class="bi-plus-circle me-2"></i>Tambah Data
                </button>
                </div>
<table id="penggunasTable" class="table" style="width:100%">
    <thead>
        <tr>
            <th>Nama</th> 
            <th>Email</th>
            <th>Bagian</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Data akan ditambahkan oleh DataTables secara dinamis -->
    </tbody>
</table> 
</div>
</div>

</div>



<!-- Skrip Ajax dan DataTables -->
    

@include('pengguna.script')

@endsection
