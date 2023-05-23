<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tagihan;
use App\Models\Siswa;
use App\Models\Tabungan;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class Kelas10Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bayar = Tagihan::where('jenis','tagihan_kelas10')->value('nilai');
        if (request()->ajax()) {
            $rekap = Siswa::select('siswa.id','siswa.nis','siswa.nama','siswa.slug','siswa.kelas')->with(['tabungan'])
            ->withSum('tabungan', 'keluar')
            ->withSum('tabungan', 'masuk')->where('kelas','LIKE',"X-%");

        return DataTables::of($rekap)->addColumn('bayar', $bayar)->addColumn('kekurangan','')
        ->addColumn('kekurangan', function ($data) {
            $bayar = Tagihan::where('jenis', 'tagihan_kelas10')->value('nilai');
            $masuk = Tabungan::where('id_siswa', $data->id)->sum('masuk');
            $keluar_pribadi = Tabungan::where('id_siswa', $data->id)->where('keterangan', 'LIKE', "%Kelas 10%")->sum('keluar');
            $kurang = $bayar - $masuk + $data->tabungan_sum_keluar - $keluar_pribadi;
            return  $kurang;
        })
        ->addColumn('aksi', function ($data) {
            $link = route('totalpersiswa.index').'/'.$data->slug;
            $button = '<a href="'.$link.'"><div data-toggle="tooltip" data-id="' . $data->id . '"  data-original-title="Info" class="btn btn-sm btn-icon btn-primary btn-circle mr-2 info infoSiswa"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z" clip-rule="evenodd" />
          </svg>
          </div></a>';
            return $button;
        })->rawColumns(['aksi'])->make();
        }
        return view('kelas10', [
            'title' => 'Kelas 10',
            'harusBayar' => $bayar,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tagihan::updateOrCreate(
            ['jenis' => $request->jenis,],
            [
                'nilai' => str_replace(".","",$request->nilai),
            ]
        );

        return response()->json([
            'tagihan' => Tagihan::where('jenis','tagihan_kelas10')->value('nilai'),
            'success' => 'Data Berhasil Ditambahkan!']);
    }

}
