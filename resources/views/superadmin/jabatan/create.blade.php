@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Jabatan</h1>
        <a href="/superadmin/jabatan" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Input Jabatan</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/jabatan/create">
                @csrf
                <div class="form-group">
                    <div class="mb-1 small">Bidang</div>
                    <select name="bidang_id" class="form-control" required>
                        <option value="">-pilih-</option>
                        @foreach ($bidang as $item)
                        <option value="{{$item->id}}">{{$item->nama_bidang}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Nama Jabatan</div>
                    <input type="text" class="form-control" required name="nama_jabatan">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Tunjangan</div>
                    <input type="text" class="form-control" required name="tunjangan">
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@push('js')
<script type="text/javascript" src="/theme/docs/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/theme/docs/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $('#sampleTable').DataTable();
</script>
@endpush