@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Gaji</h1>
        <a href="/superadmin/gaji" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Input Gaji</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/gaji/create">
                @csrf
                <div class="form-group">
                    <div class="mb-1 small">Bulan</div>
                    <select name="bulan" class="form-control" required>
                        <option value="">-pilih-</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Tahun</div>
                    <select name="tahun" class="form-control" required>
                        <option value="">-pilih-</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Pegawai</div>
                    <select name="pegawai_id" class="form-control" required>
                        <option value="">-pilih-</option>
                        @foreach ($pegawai as $item)
                        <option value="{{$item->id}}">{{$item->status_pegawai == 'PNS' ? $item->nip:$item->nik}} -
                            {{$item->nama}}</option>
                        @endforeach
                    </select>
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