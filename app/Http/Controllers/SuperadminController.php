<?php

namespace App\Http\Controllers;

use App\Gaji;
use App\Role;
use App\User;
use App\Bidang;
use App\Jabatan;
use App\Pangkat;
use App\Pegawai;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SuperadminController extends Controller
{
    public function beranda()
    {
        return view('superadmin.beranda');
    }

    //Function Jenis Pengaduan
    public function bidang()
    {
        $data = Bidang::orderBy('id', 'DESC')->get();
        return view('superadmin.bidang.index', compact('data'));
    }
    public function bidangcreate()
    {
        return view('superadmin.bidang.create');
    }
    public function bidangstore(Request $req)
    {
        $n = new Bidang;
        $n->nama_bidang = $req->nama_bidang;
        $n->save();
        toastr()->success('Berhasil disimpan');
        return redirect('/superadmin/bidang');
    }
    public function bidangedit($id)
    {
        $data = Bidang::find($id);
        return view('superadmin.bidang.edit', compact('data'));
    }
    public function bidangupdate(Request $req, $id)
    {
        $n = Bidang::find($id);
        $n->nama_bidang = $req->nama_bidang;
        $n->save();
        toastr()->success('Berhasil diupdate');
        return redirect('/superadmin/bidang');
    }
    public function bidangdelete($id)
    {
        Bidang::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function jabatan()
    {
        $data = Jabatan::get();
        return view('superadmin.jabatan.index', compact('data'));
    }

    public function jabatancreate()
    {
        $bidang = Bidang::get();
        return view('superadmin.jabatan.create', compact('bidang'));
    }
    public function jabatanstore(Request $req)
    {
        $attr = $req->all();

        Jabatan::create($attr);
        toastr()->success('Berhasil disimpan');
        return redirect('/superadmin/jabatan');
    }
    public function jabatanedit($id)
    {
        $bidang = Bidang::get();
        $data = Jabatan::find($id);
        return view('superadmin.jabatan.edit', compact('data', 'bidang'));
    }
    public function jabatanupdate(Request $req, $id)
    {
        $attr = $req->all();
        Jabatan::find($id)->update($attr);
        toastr()->success('Berhasil diupdate');
        return redirect('/superadmin/jabatan');
    }
    public function jabatandelete($id)
    {
        Jabatan::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    //Function Pangkat
    public function pangkat()
    {
        $data = Pangkat::orderBy('id', 'DESC')->get();
        return view('superadmin.pangkat.index', compact('data'));
    }
    public function pangkatcreate()
    {
        return view('superadmin.pangkat.create');
    }
    public function pangkatstore(Request $req)
    {
        $attr = $req->all();
        Pangkat::create($attr);
        toastr()->success('Berhasil disimpan');
        return redirect('/superadmin/pangkat');
    }
    public function pangkatedit($id)
    {
        $data = Pangkat::find($id);
        return view('superadmin.pangkat.edit', compact('data'));
    }
    public function pangkatupdate(Request $req, $id)
    {
        $attr = $req->all();
        Pangkat::find($id)->update($attr);
        toastr()->success('Berhasil diupdate');
        return redirect('/superadmin/pangkat');
    }
    public function pangkatdelete($id)
    {
        Pangkat::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function petugas()
    {
        $data = User::get();
        return view('superadmin.petugas.index', compact('data'));
    }
    public function petugascreate()
    {
        return view('superadmin.petugas.create');
    }
    public function petugasstore(Request $req)
    {
        //Check NIP dan Username
        if (User::where('nip', $req->nip)->first() != null) {
            toastr()->error('NIP Sudah Ada');
            return back();
        }

        if (User::where('username', $req->username)->first() != null) {
            toastr()->error('Username Sudah Ada');
            return back();
        }

        $role = Role::where('name', 'superadmin')->first();

        $u = new User;
        $u->nip = $req->nip;
        $u->name = $req->name;
        $u->username = $req->username;
        $u->password = bcrypt($req->password);
        $u->save();

        $u->roles()->attach($role);

        toastr()->success('Berhasil disimpan');
        return redirect('/superadmin/petugas');
    }
    public function petugasedit($id)
    {
        $data = User::find($id);
        return view('superadmin.petugas.edit', compact('data'));
    }
    public function petugasupdate(Request $req, $id)
    {
        $u = User::find($id);
        $u->nip = $req->nip;
        $u->name = $req->name;
        $u->username = $req->username;
        if ($req->password != null) {
            $u->password = bcrypt($req->password);
        }
        $u->save();
        toastr()->success('Berhasil diupdate');
        return redirect('/superadmin/petugas');
    }
    public function petugasdelete($id)
    {
        if (User::get()->count() == 1) {
            toastr()->error('Tidak Bisa Di Hapus Karena tersisa 1');
            return back();
        } else {
            User::find($id)->delete();
            toastr()->success('Berhasil dihapus');
            return back();
        }
    }

    public function gaji()
    {
        $data = Gaji::get();
        return view('superadmin.gaji.index', compact('data'));
    }

    public function gajicreate()
    {
        $pegawai = Pegawai::get();
        return view('superadmin.gaji.create', compact('pegawai'));
    }
    public function gajistore(Request $req)
    {
        if (Gaji::where('bulan', $req->bulan)->where('tahun', $req->tahun)->where('pegawai_id', $req->pegawai_id)->first() != null) {
            toastr()->error('Data Ini sudah di rekap');
            return back();
        }
        $pegawai = Pegawai::find($req->pegawai_id);
        $tj_jabatan = $pegawai->jabatan == null ? 0 : $pegawai->jabatan->tunjangan;
        $tj_pangkat = $pegawai->pangkat == null ? 0 : $pegawai->pangkat->tunjangan;
        $total = $tj_pangkat + $tj_jabatan + $pegawai->tunjangan_keluarga + $pegawai->gaji;
        if ($pegawai->status_pegawai == "NON PNS" || $pegawai->pangkat == null) {
            $pph21 = 0;
        } else {
            if ($pegawai->pangkat->golongan == 'III') {
                $pph21 = 5;
            } elseif ($pegawai->pangkat->golongan == 'IV') {
                $pph21 = 15;
            } else {
                $pph21 = 0;
            }
        }
        $attr = $req->all();
        if ($pegawai->status_pegawai == 'NON PNS') {
            $attr['gaji'] = $pegawai->gaji;
            $attr['tunjangan_keluarga'] = 0;
            $attr['tunjangan_jabatan'] = 0;
            $attr['tunjangan_golongan'] = 0;
            $attr['status_pegawai'] = $pegawai->status_pegawai;
            $attr['total'] = $pegawai->gaji;
            $attr['pph21'] = 0;
            $attr['diterima'] = $pegawai->gaji;
        } else {
            $attr['gaji'] = $pegawai->gaji;
            $attr['tunjangan_keluarga'] = $pegawai->tunjangan_keluarga;
            $attr['tunjangan_jabatan'] = $tj_jabatan;
            $attr['tunjangan_golongan'] = $tj_pangkat;
            $attr['status_pegawai'] = $pegawai->status_pegawai;
            $attr['total'] = $total;
            $attr['pph21'] = $pph21;
            $attr['diterima'] = $total - $pph21;
        }

        Gaji::create($attr);
        toastr()->success('Berhasil disimpan');
        return redirect('/superadmin/gaji');
    }

    public function pegawai()
    {
        $data = Pegawai::get();
        return view('superadmin.pegawai.index', compact('data'));
    }
    public function pegawaicreate()
    {
        $jabatan = Jabatan::get();
        $pangkat = Pangkat::get();
        return view('superadmin.pegawai.create', compact('jabatan', 'pangkat'));
    }
    public function pegawaistore(Request $req)
    {
        $attr = $req->all();
        $attr['bidang_id'] = Jabatan::find($req->jabatan_id)->bidang->id;
        if ($req->status_pegawai == 'NON PNS') {
            $attr['nip'] = null;
            $attr['tunjangan_keluarga'] = 0;
            $attr['jabatan_id'] = null;
            $attr['pangkat_id'] = null;
            $attr['bidang_id'] = null;
        }

        Pegawai::create($attr);
        toastr()->success('Berhasil disimpan');
        return redirect('/superadmin/pegawai');
    }
    public function pegawaiedit($id)
    {
        $data = Pegawai::find($id);
        $jabatan = Jabatan::get();
        $pangkat = Pangkat::get();
        return view('superadmin.pegawai.edit', compact('data', 'jabatan', 'pangkat'));
    }
    public function pegawaiupdate(Request $req, $id)
    {
        $attr = $req->all();
        $attr['bidang_id'] = $req->jabatan_id == null ? null : Jabatan::find($req->jabatan_id)->bidang->id;
        if ($req->status_pegawai == 'NON PNS') {
            $attr['nip'] = null;
            $attr['tunjangan_keluarga'] = 0;
            $attr['jabatan_id'] = null;
            $attr['pangkat_id'] = null;
            $attr['bidang_id'] = null;
        }

        Pegawai::find($id)->update($attr);
        toastr()->success('Berhasil diupdate');
        return redirect('/superadmin/pegawai');
    }
    public function pegawaidelete($id)
    {
        Pegawai::find($id)->delete();
        toastr()->success('Berhasil dihapus');
        return back();
    }

    public function laporan()
    {
        $bidang = Bidang::get();
        $pangkat = Pangkat::get();
        return view('superadmin.laporan.index', compact('bidang', 'pangkat'));
    }

    public function datapns()
    {
        $data = Pegawai::where('status_pegawai', 'PNS')->get();
        $pdf = PDF::loadView('superadmin.laporan.pdf_pns', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }

    public function datanonpns()
    {
        $data = Pegawai::where('status_pegawai', 'NON PNS')->get();
        $pdf = PDF::loadView('superadmin.laporan.pdf_nonpns', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }

    public function pergolongan(Request $req)
    {
        $data = Pegawai::where('pangkat_id', $req->pangkat_id)->get();
        $golongan = Pangkat::find($req->pangkat_id);
        $pdf = PDF::loadView('superadmin.laporan.pdf_pergolongan', compact('data', 'golongan'))->setPaper('legal');
        return $pdf->stream();
    }

    public function perbidang(Request $req)
    {
        $data = Pegawai::where('bidang_id', $req->bidang_id)->get();

        $pdf = PDF::loadView('superadmin.laporan.pdf_perbidang', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }

    public function gajipns(Request $req)
    {
        $data = Gaji::where('bulan', $req->bulan)->where('tahun', $req->tahun)->where('status_pegawai', 'PNS')->get();

        $pdf = PDF::loadView('superadmin.laporan.pdf_gajipns', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }

    public function gajinonpns(Request $req)
    {
        $data = Gaji::where('bulan', $req->bulan)->where('tahun', $req->tahun)->where('status_pegawai', 'NON PNS')->get();

        $pdf = PDF::loadView('superadmin.laporan.pdf_gajinonpns', compact('data'))->setPaper('legal');
        return $pdf->stream();
    }
}
