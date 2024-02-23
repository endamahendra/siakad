<!-- resources/views/mapel/index.blade.php -->

@extends('layout.app')
@section('content')
@include('mapel.modal')

<!-- Tabel untuk menampilkan data -->
<div id="contentContainerMapel">
<div class="card">
    <div class="card-body">             
        <h6 class="card-title">Daftar Data Mata Kuliah</h6>
        <div style="margin-bottom: 10px;">
            <button type="button" class="btn btn-primary" onclick="clearForm(); $('#mapelFormModal').modal('show');">
                <i class="bi-plus-circle me-2"></i>Tambah Data
            </button>
        </div>
        <table id="mapelsTable" class="table" style="width:100%">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Prodi</th>
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


@include('mapel.script')



@endsection 
