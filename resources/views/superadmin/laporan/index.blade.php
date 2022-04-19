@extends('layouts.app')
@push('css')

@endpush
@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 mb-12">
            <!-- Project Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="/superadmin/laporan/datapns" class="btn btn-primary btn-icon-split" target="_blank">
                        <span class="icon text-white-50">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="text">Data PNS</span>
                    </a>
                    <a href="/superadmin/laporan/datanonpns" class="btn btn-primary btn-icon-split" target="_blank">
                        <span class="icon text-white-50">
                            <i class="fas fa-users"></i>
                        </span>
                        <span class="text">Data NON PNS</span>
                    </a>
                </div>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data PNS Per Golongan</h6>
                </div>
                <form method="post" action="/superadmin/laporan/pergolongan" target="_blank">
                    @csrf
                    <div class="card-body">
                        <select name="pangkat_id" class="form-control" required>
                            <option value="">-pilih-</option>
                            @foreach ($pangkat as $item)
                            <option value="{{$item->id}}">{{$item->nama_pangkat}} - {{$item->golongan}}</option>
                            @endforeach
                        </select><br />
                        <button type="submit" class="btn btn-primary btn-sm">Print</button>
                    </div>
                </form>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data PNS Per Bidang</h6>
                </div>
                <form method="post" action="/superadmin/laporan/perbidang" target="_blank">
                    @csrf
                    <div class="card-body">
                        <select name="bidang_id" class="form-control" required>
                            <option value="">-pilih-</option>
                            @foreach ($bidang as $item)
                            <option value="{{$item->id}}">{{$item->nama_bidang}}</option>
                            @endforeach
                        </select><br />
                        <button type="submit" class="btn btn-primary btn-sm">Print</button>
                    </div>
                </form>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Gaji PNS</h6>
                </div>
                <form method="post" action="/superadmin/laporan/gajipns" target="_blank">
                    @csrf
                    <div class="card-body">
                        <select class="form-control" name="bulan" required>
                            <option value="">-Bulan-</option>
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
                        <br />
                        <select class="form-control" name="tahun" required>
                            <option value="">-Tahun-</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select><br />
                        <button type="submit" class="btn btn-primary btn-sm">Print</button>
                    </div>
                </form>
            </div>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Gaji NON PNS</h6>
                </div>
                <form method="post" action="/superadmin/laporan/gajinonpns" target="_blank">
                    @csrf
                    <div class="card-body">
                        <select class="form-control" name="bulan" required>
                            <option value="">-Bulan-</option>
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
                        <br />
                        <select class="form-control" name="tahun" required>
                            <option value="">-Tahun-</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                        </select><br />
                        <button type="submit" class="btn btn-primary btn-sm">Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- <main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-list"></i> Laporan</h1>
            <p>Selamat Datang, {{Auth::user()->name}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <form method="post" action="/superadmin/laporan">
                    @csrf
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">

                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Bulan</span>
                                        </div>
                                        <select class="form-control" name="bulan">
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
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Tahun</span>
                                        </div>
                                        <select class="form-control" name="tahun">
                                            <option value="">-pilih-</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-prepend"><span class="input-group-text">Jenis
                                                Laporan</span>
                                        </div>
                                        <select class="form-control" name="jenis">
                                            <option value="">-pilih-</option>
                                            <option value="1">Pengadu</option>
                                            <option value="2">Pengaduan</option>
                                            <option value="3">Perusahaan</option>
                                            <option value="4">Pengawas</option>
                                            <option value="5">Penanganan</option>
                                            <option value="6">Penyidik</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button type="submit" class="btn btn-primary" type="submit">Export PDF</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</main> --}}
@endsection

@push('js')
<script type="text/javascript" src="/theme/docs/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/theme/docs/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
    $('#sampleTable').DataTable();
</script>
@endpush