@extends('layouts.app')
@push('css')

<link href="/theme/docs/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Bidang</h1>
        <a href="/superadmin/bidang/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Bidang</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama Bidang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @php
                    $no =1;
                    @endphp
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->nama_bidang}}</td>
                            <td>
                                <a href="/superadmin/bidang/edit/{{$item->id}}"
                                    class="btn btn-success btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="/superadmin/bidang/delete/{{$item->id}}"
                                    class="btn btn-danger btn-circle btn-sm"
                                    onclick="return confirm('Yakin ingin di hapus?');">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')

<script src="/theme/docs/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/theme/docs/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="/theme/docs/js/demo/datatables-demo.js"></script>
@endpush