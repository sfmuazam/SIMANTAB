<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();

        return view('profil', [
            'title' => 'Profil',
            'user' => $user
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
    **/

    public function ganti_password(Request $request){
        $validator = Validator::make(
            $request->all(),
            [
                'old' => 'required',
                'new' => 'required',
                'conf' => 'required|same:new',
            ],
            [
                'old.required' => 'Kolom kata sandi lama harus diisi!',
                'new.required' => 'Kolom kata sandi baru harus diisi!',
                'conf.required' => 'Kolom konfirmasi kata sandi baru harus diisi!',
                'conf.same' => 'Konfirmasi kata sandi baru berbeda!'
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }
        $user = auth()->user();

        if (!(Hash::check($request->get('old'), $user->password))) {
            // The passwords matches
            return response()->json(['failed' => "Kata Sandi Gagal Diperbarui!"]);
        }

        if (strcmp($request->get('old'), $request->get('new')) == 0) {
            // Current password and new password same
            return response()->json(['failed' => "Kata Sandi Gagal Diperbarui!"]);
        }

        if ($request->get('new') != $request->get('conf')) {
            return response()->json(['failed' => "Kata Sandi Gagal Diperbarui!"]);
        }

        $id = strval(auth()->user()->id);
        if (auth()->user()->id === 0) {
            $id = 'admin';
        }
        // Change Password
        $pass = ['password' => bcrypt($request->new)];
        User::where('id', $id)->update($pass);

        return response()->json(['success' => 'Kata Sandi Berhasil Diperbarui!']);
    }
}
