@extends('layouts.app')
@push('css')

@endpush
@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-2 text-gray-800">Pegawai</h1>
        <a href="/superadmin/pegawai" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Pegawai</h6>
        </div>
        <div class="card-body">
            <form method="post" action="/superadmin/pegawai/edit/{{$data->id}}">
                @csrf
                <div class="form-group">
                    <div class="mb-1 small">Jenis Pegawai</div>
                    <select name="status_pegawai" class="form-control" required>
                        <option value="">-pilih-</option>
                        <option value="PNS" {{$data->status_pegawai == 'PNS' ? 'selected':''}}>PNS</option>
                        <option value="NON PNS" {{$data->status_pegawai == 'NON PNS' ? 'selected':''}}>NON PNS</option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="mb-1 small">NIK</div>
                    <input type="text" class="form-control" required name="nik" value="{{$data->nik}}">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">NIP</div>
                    <input type="text" class="form-control" name="nip" value="{{$data->nip}}">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Nama</div>
                    <input type="text" class="form-control" required name="nama" value="{{$data->nama}}">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Tempat Lahir</div>
                    <input type="text" class="form-control" required name="tempat_lahir"
                        value="{{$data->tempat_lahir}}">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Tanggal Lahir</div>
                    <input type="date" class="form-control" required name="tanggal_lahir"
                        value="{{$data->tanggal_lahir}}">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Alamat</div>
                    <input type="text" class="form-control" required name="alamat" value="{{$data->alamat}}">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Status Kawin</div>
                    <select name="status_nikah" class="form-control" required>
                        <option value="">-pilih-</option>
                        <option value="KAWIN" {{$data->status_nikah == 'KAWIN' ? 'selected':''}}>KAWIN</option>
                        <option value="BELUM KAWIN" {{$data->status_nikah == 'BELUM KAWIN' ? 'selected':''}}>BELUM KAWIN
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Jumlah Anak</div>
                    <input type="text" class="form-control" required name="jumlah_anak" value="{{$data->jumlah_anak}}">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Tunjangan Keluarga</div>
                    <input type="text" class="form-control" required name="tunjangan_keluarga"
                        value="{{$data->tunjangan_keluarga}}">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Telp</div>
                    <input type="text" class="form-control" required name="telp" value="{{$data->telp}}">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Pendidikan Terakhir</div>
                    <input type="text" class="form-control" required name="pendidikan" value="{{$data->pendidikan}}">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Jabatan</div>
                    <select name="jabatan_id" class="form-control">
                        <option value="">-pilih-</option>
                        @foreach ($jabatan as $item)
                        <option value="{{$item->id}}" {{$data->jabatan_id == $item->id ?
                            'selected':''}}>{{$item->nama_jabatan}}, {{$item->bidang->nama_bidang}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Pangkat</div>
                    <select name="pangkat_id" class="form-control">
                        <option value="">-pilih-</option>
                        @foreach ($pangkat as $item)
                        <option value="{{$item->id}}" {{$data->pangkat_id == $item->id ?
                            'selected':''}}>{{$item->nama_pangkat}} - {{$item->golongan}}.{{$item->ruang}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <div class="mb-1 small">Gaji</div>
                    <input type="text" class="form-control" required name="gaji" value="{{$data->gaji}}">
                </div>
                <div class="form-group">
                    <div class="mb-1 small">No Rekening</div>
                    <input type="text" class="form-control" required name="rekening" value="{{$data->rekening}}">
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