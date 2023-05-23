<?php

namespace App\Http\Controllers;

use App\Models\Tabungan;
use App\Models\Siswa;
use App\Models\Kelas;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TabunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $tabungan = Tabungan::select(['tabungan.id', 'tanggal', 'id_siswa', 'masuk', 'keluar', 'keterangan', 'id_user'])->with(['siswa','user'])->where('tanggal','>=','2023-05-09')->where('tanggal','<=','9999-12-31')->get();
        // dd($tabungan);
        if (request()->ajax()) {
            if($request->minDate == '')
                $request->minDate = '0000-00-00';
            if($request->maxDate == '')
                $request->maxDate = '9999-12-31';
            $tabungan = Tabungan::select(['tabungan.id', 'tanggal', 'id_siswa', 'masuk', 'keluar', 'keterangan', 'id_user'])->with(['siswa','user'])->where('tanggal','>=',$request->minDate)->where('tanggal','<=',$request->maxDate);

            return DataTables::of($tabungan)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="sub_chk" data-id="' . $data->id . '">';
                })->addColumn('aksi', function ($data) {
                    // $button = '<div data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Info" class="btn btn-sm btn-icon btn-primary btn-circle mr-2 info infoTabungan"><i class="bi bi-info-circle"></i></div>';
                    $button = ' <div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-success btn-circle mr-2 edit editTabungan"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                    <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                  </svg></div>';
                    $button .= ' <div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-danger btn-circle mr-2 deleteTabungan"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                  </svg></div>';
                    return $button;
                })->rawColumns(['checkbox', 'aksi'])->make();
        }
        $tgl = date('Y-m-d');
        return view('tabungan', [
            'title' => 'Tabungan',
            'datasiswa' => Siswa::orderBy('kelas', 'asc')->orderBy('nama', 'asc')->get(),
            'datakelas' => Kelas::all(),
            'masukHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('masuk'),
            'keluarHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('keluar'),
            'saldoHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('masuk') - Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('keluar'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->masuk == null)
            $request->masuk = '0';
        if ($request->keluar == null)
            $request->keluar = '0';

        $validator = Validator::make(
            $request->all(),
            [
                'tanggal' => 'required',
                'id_siswa' => 'required',
                'masuk' => 'required_without:keluar',
                'keluar' => 'required_without:masuk',
            ],
            [
                'id_siswa.required' => 'Pilih data siswa yang tersedia!',
                'masuk.required_without' => 'Salah satu kolom masuk atau keluar harus diisi!',
                'keluar.required_without' => 'Salah satu kolom masuk atau keluar harus diisi!',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        Tabungan::updateOrCreate(
            ['id' => $request->id_tabungan],
            [
                'tanggal' => $request->tanggal,
                'id_siswa' => $request->id_siswa,
                'masuk' => str_replace(".","",$request->masuk),
                'keluar' => str_replace(".","",$request->keluar),
                'keterangan' => $request->keterangan,
                'id_user' => auth()->user()->id,
            ]
        );
        $tgl = date('Y-m-d');
        return response()->json([
            'masukHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('masuk'),
            'keluarHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('keluar'),
            'saldoHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('masuk') - Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('keluar'),
            'totalSaldo' => Tabungan::where('id_siswa', $request->id_siswa)->sum('masuk') - Tabungan::where('id_siswa', $request->id_siswa)->sum('keluar'),
            'totalMasuk' => Tabungan::where('id_siswa', $request->id_siswa)->sum('masuk'),
            'totalKeluar' => Tabungan::where('id_siswa', $request->id_siswa)->sum('keluar'),
            'success' => 'Data Berhasil Ditambahkan!'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMulti(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'tanggalMulti' => 'required',
                'kelasMulti' => 'required',
                'masukMulti' => 'required_without:keluarMulti',
                'keluarMulti' => 'required_without:masukMulti',
            ],
            [
                'tanggalMulti.required' => 'Kolom tanggal harus diisi!',
                'kelasMulti.required' => 'Pilih data kelas yang tersedia!',
                'masukMulti.required_without' => 'Salah satu kolom masuk atau keluar harus diisi!',
                'keluarMulti.required_without' => 'Salah satu kolom masuk atau keluar harus diisi!',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        if ($request->masukMulti == null)
            $request->masukMulti = '0';
        if ($request->keluarMulti == null)
            $request->keluarMulti = '0';

        $kls = $request->kelasMulti;
        $siswa = Siswa::where('kelas', 'LIKE', "$kls%")->get();
        foreach ($siswa as $row) {
            Tabungan::updateOrCreate(
                [
                    'tanggal' => $request->tanggalMulti,
                    'id_siswa' => $row->id,
                    'masuk' => str_replace(".","",$request->masukMulti),
                    'keluar' => str_replace(".","",$request->keluarMulti),
                    'keterangan' => $request->keteranganMulti,
                    'id_user' => auth()->user()->id,
                ]
            );
        }
        $tgl = date('Y-m-d');
        return response()->json([
            'masukHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('masuk'),
            'keluarHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('keluar'),
            'saldoHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('masuk') - Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('keluar'),
            'success' => 'Data Berhasil Ditambahkan!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function show(Tabungan $tabungan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tabungan = Tabungan::find($id);
        return response()->json($tabungan);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tabungan  $tabungan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id_siswa = Tabungan::where('id', $id)->value('id_siswa');
        Tabungan::find($id)->delete();
        $tgl = date('Y-m-d');
        return response()->json([
            'masukHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('masuk'),
            'keluarHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('keluar'),
            'saldoHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('masuk') - Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('keluar'),
            'totalSaldo' => Tabungan::where('id_siswa', $id_siswa)->sum('masuk') - Tabungan::where('id_siswa', $id_siswa)->sum('keluar'),
            'totalMasuk' => Tabungan::where('id_siswa', $id_siswa)->sum('masuk'),
            'totalKeluar' => Tabungan::where('id_siswa', $id_siswa)->sum('keluar'),
            'success' => 'Data Berhasil Dihapus'
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        $id_siswa = Tabungan::whereIn('id', explode(",", $ids))->value('id_siswa');
        Tabungan::whereIn('id', explode(",", $ids))->delete();
        $tgl = date('Y-m-d');
        return response()->json([
            'masukHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('masuk'),
            'keluarHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('keluar'),
            'saldoHariIni' => Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('masuk') - Tabungan::where('tanggal', "LIKE", "$tgl%")->sum('keluar'),
            'totalSaldo' => Tabungan::where('id_siswa', $id_siswa)->sum('masuk') - Tabungan::where('id_siswa', $id_siswa)->sum('keluar'),
            'totalMasuk' => Tabungan::where('id_siswa', $id_siswa)->sum('masuk'),
            'totalKeluar' => Tabungan::where('id_siswa', $id_siswa)->sum('keluar'),
            'success' => "Products Deleted successfully."
        ]);
    }
}
