<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Siswa;
use App\Models\Tabungan;
use App\Models\Kelas;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (request()->ajax()) {
            $siswa = Siswa::select(['id', 'nis', 'nama', 'kelas']);

            return DataTables::of($siswa)
                ->addColumn('checkbox', function ($data) {
                    return '<input type="checkbox" class="sub_chk" data-id="' . $data->id . '">';
                })
                ->addColumn('aksi', function ($data) {
                    // $button = '<div data-toggle="tooltip" data-id="'.$data->id.'" data-original-title="Info" class="btn btn-sm btn-icon btn-primary btn-circle mr-2 info infoSiswa"><i class="bi bi-info-circle"></i></div>';
                    $button = ' <div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-success btn-circle mr-2 edit editSiswa"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                    <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                  </svg></div>';
                    $button .= ' <div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-danger btn-circle mr-2 deleteSiswa"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                  </svg></div>';
                    return $button;
                })->rawColumns(['checkbox', 'aksi'])->make();
        }
        return view('siswa', [
            'title' => 'Siswa',
            'datakelas' => Kelas::orderBy('kelas', 'asc')->get(),
            'jumlahSiswa' => Siswa::count()
        ]);
    }

    public function import(Request $request)
    {
        $validators = Validator::make(
            $request->all(),
            [
                'file' => 'required|mimes:csv,xls,xlsx'
            ],
            [
                'file.mimes' => 'Format salah, masukkan format seperti template!',
            'file.required' => 'File tidak boleh kosong!',
            ]
        );
        if ($validators->fails()) {
            return response()->json([
                'errors' => $validators->errors()
            ]);
        }
        $file = $request->file('file');
        // membuat nama file unik
        $nama_file = $file->hashName();
        //temporary file
        $path = $file->storeAs('public/excel/', $nama_file);
        // import data
        $import = Excel::import(new SiswaImport(), storage_path('app/public/excel/' . $nama_file));
        Storage::delete(Storage::allFiles('public/excel'));
        if ($import) {
            //redirect
            return response()->json([
                'jumlah' => Siswa::count(),
                'success' => 'Data Berhasil Ditambahkan!'
            ]);
        } else {
            //redirect
            return response()->json([
                'error' => 'Format Salah, Data Gagal Diimport!'
            ]);
        }
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
        if ($request->id_siswa != null || $request->id_siswa != '') {
            $user = Siswa::find($request->id_siswa);
            if ($user->nis == $request->nis) {
                $validator = Validator::make(
                    $request->all(),
                    [
                        'kelas' => 'required',
                        'nis' => 'required|numeric',
                        'nama' => 'required'
                    ],
                    [
                        'kelas.required' => 'Pilih data kelas yang tersedia!'
                    ]
                );
            } else {
                $validator = Validator::make(
                    $request->all(),
                    [
                        'kelas' => 'required',
                        'nis' => 'required|numeric|unique:siswa,nis',
                        'nama' => 'required'
                    ],
                    [
                        'kelas.required' => 'Pilih data kelas yang tersedia!'
                    ]
                );
            }
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    'kelas' => 'required',
                    'nis' => 'required|numeric|unique:siswa,nis',
                    'nama' => 'required'
                ],
                [
                    'kelas.required' => 'Pilih data kelas yang tersedia!'
                ]
            );
        }

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }
        Siswa::updateOrCreate(
            ['id' => $request->id_siswa],
            [
                'nis' => $request->nis,
                'nama' => $request->nama,
                'kelas' => $request->kelas,
            ]
        );

        return response()->json([
            'jumlah' => Siswa::count(),
            'success' => 'Data Berhasil Ditambahkan!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function show($id_siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return response()->json($siswa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Siswa  $siswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Siswa::find($id)->delete();

        return response()->json([
            'jumlah' => Siswa::count(),
            'success' => 'Data Berhasil Dihapus'
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Siswa::whereIn('id', explode(",", $ids))->delete();
        return response()->json([
            'jumlah' => Siswa::count(),
            'success' => "Products Deleted successfully."
        ]);
    }
}
