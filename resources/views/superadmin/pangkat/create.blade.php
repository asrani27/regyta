@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Pangkat & Golongan</h1>
        <a href="/superadmin/pangkat" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Input Pangkat & Golongan</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/pangkat/create">
                @csrf
                <div class="form-group">
                    <div class="mb-1 small">Nama Pangkat</div>
                    <input type="text" class="form-control" required name="nama_pangkat">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Golongan</div>
                    <select name="golongan" class="form-control" required>
                        <option value="">-pilih-</option>
                        <option value="I">I</option>
                        <option value="II">II</option>
                        <option value="III">III</option>
                        <option value="IV">IV</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Ruang</div>
                    <select name="ruang" class="form-control" required>
                        <option value="">-pilih-</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
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