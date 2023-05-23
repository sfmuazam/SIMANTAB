<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;

    protected $table = 'tabungan';

    protected $fillable = ['tanggal','id_siswa','masuk','keluar','saldo','keterangan','id_user'];

    public function siswa(){
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
