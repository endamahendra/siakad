@extends('layout.app')
@section('content')
@include('prodi.modal')
<div id="contentContainerProdi">
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Daftar Data Prodi</h6>
            <div style="margin-bottom: 10px;">
                <button type="button" class="btn btn-primary" onclick="clearFormProdi(); $('#prodiFormModal').modal('show');">Tambah data
                    {{-- <i class="bi-plus-circle me-2" >Tambah data</i> --}}
                </button> 
                <button class="btn btn-danger delete-btn" onclick="deleteProdiAll()">Hapus Semua Data</button>
            </div>
            <table id="prodisTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenjang</th>
                        <th>Nama Prodi</th>
                        <th>Waktu Input</th>
                        <th>Waktu Update</th>
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

<!-- resources/views/prodi/script.blade.php -->
<!-- resources/views/prodi/script.blade.php -->
  {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
@include('prodi.script')

@endsection
