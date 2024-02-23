<!-- resources/views/mahasiswa/index.blade.php -->

@extends('layout.app')
@section('content')
@include('mahasiswa.modal')
<div id="contentContainerMahasiswa">
    <!-- Tabel untuk menampilkan data -->
    <div class="card">
        <div class="card-body">             
            <h6 class="card-title">Daftar Data Mahasiswa</h6>
            <div style="margin-bottom: 10px;">
                <button type="button" class="btn btn-primary" onclick="clearForm(); $('#mahasiswaFormModal').modal('show');">
                    <i class="bi-plus-circle me-2"></i>Tambah Data
                </button>
            </div>
            <table id="mahasiswasTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Email</th>
                        <th>Tanggal Masuk</th>
                        <th>Program Studi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be added dynamically by DataTables -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Ajax and DataTables script -->
@include('mahasiswa.script')

@endsection
