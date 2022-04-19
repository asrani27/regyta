@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Bidang</h1>
        <a href="/superadmin/bidang" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Bidang</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/bidang/edit/{{$data->id}}">
                @csrf
                <div class="form-group">
                    <div class="mb-1 small">Nama Bidang</div>
                    <input type="text" class="form-control" required name="nama_bidang" value="{{$data->nama_bidang}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary">Update</button>
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