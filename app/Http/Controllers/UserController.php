<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $user = User::select(['id', 'nama', 'username', 'role', 'password']);

            return DataTables::of($user)
                ->addColumn('checkbox', function ($data) {
                    if ($data->role != 'Admin')
                        return '<input type="checkbox" class="sub_chk" data-id="' . $data->id . '">';
                    else
                        return '';
                })->addColumn('aksi', function ($data) {
                    if ($data->role != 'Admin') {
                        $button = ' <div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="ResetPass" class="btn btn-sm btn-icon btn-primary btn-circle mr-2 edit resetPass"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M15.312 11.424a5.5 5.5 0 01-9.201 2.466l-.312-.311h2.433a.75.75 0 000-1.5H3.989a.75.75 0 00-.75.75v4.242a.75.75 0 001.5 0v-2.43l.31.31a7 7 0 0011.712-3.138.75.75 0 00-1.449-.39zm1.23-3.723a.75.75 0 00.219-.53V2.929a.75.75 0 00-1.5 0V5.36l-.31-.31A7 7 0 003.239 8.188a.75.75 0 101.448.389A5.5 5.5 0 0113.89 6.11l.311.31h-2.432a.75.75 0 000 1.5h4.243a.75.75 0 00.53-.219z" clip-rule="evenodd" />
                      </svg>
                      </div>';
                        $button .= ' <div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Edit" class="btn btn-sm btn-icon btn-success btn-circle mr-2 edit editKelas"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                        <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                      </svg></div>';
                        $button .= ' <div data-toggle="tooltip" data-id="' . $data->id . '" data-original-title="Delete" class="btn btn-sm btn-icon btn-danger btn-circle mr-2 deleteKelas"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                        <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                      </svg></div>';
                        return $button;
                    } else
                        return '';
                })->rawColumns(['checkbox', 'aksi'])->make(true);
        }
        return view('user', [
            'title' => 'User',
            'jumlahUser' => User::count(),
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
        if($request->id_kelas != null || $request->id_kelas != ''){
            $user = User::find($request->id_kelas);
            if($user->username == $request->username){
                $validator = Validator::make($request->all(), [
                    'nama' => 'required',
                    'username' => 'required',
                    'role' => 'required'
                ]);
            }else{
                $validator = Validator::make($request->all(), [
                    'nama' => 'required',
                    'username' => 'required|unique:users,username',
                    'role' => 'required'
                ]);
            }
        }else{
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'username' => 'required|unique:users,username',
                'role' => 'required'
            ]);
        }

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        User::updateOrCreate(
            ['id' => $request->id_kelas],
            [
                'nama' => $request->nama,
                'username' => $request->username,
                'role' => $request->role,
                'password' => bcrypt($request->username)
            ]
        );

        return response()->json([
            'jumlah' => User::count(),
            'success' => 'Data Berhasil Ditambahkan!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = User::find($id);
        return response()->json($kelas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelasRequest  $request
     * @param  \App\Models\User  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Tabungan::where('id_user',$id)->update(['id_user' => '1']);
        User::find($id)->delete();


        return response()->json([
            'jumlah' => User::count(),
            'success' => 'Data Berhasil Dihapus'
        ]);
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        User::whereIn('id', explode(",", $ids))->delete();
        return response()->json([
            'jumlah' => User::count(),
            'success' => "Products Deleted successfully."
        ]);
    }

    public function reset(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $update = [
            'password' => bcrypt($user->username)
        ];
        User::where('id', $request->id)->update($update);
        return response()->json([
            'a' => $user,
            'success' => 'Kata sandi berhasil direset']);
    }
}
