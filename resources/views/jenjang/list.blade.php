<!-- resources/views/jenjang/index.blade.php -->

@extends('layout.app')
@section('content')
@include('jenjang.modal')
<div id="contentContainerJenjang">
    <!-- Tabel untuk menampilkan data -->
    <div class="card">
        <div class="card-body">             
            <h6 class="card-title">Daftar Data Jenjang</h6>
            <div style="margin-bottom: 10px;">
                <button type="button" class="btn btn-primary" onclick="clearForm(); $('#jenjangFormModal').modal('show');">
                    <i class="bi-plus-circle me-2"></i>Tambah Data
                </button>
            </div>
            <table id="jenjangsTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenjang</th>
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
@include('jenjang.script')

@endsection
