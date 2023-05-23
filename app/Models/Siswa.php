<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Siswa extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'siswa';

    protected $fillable = ['nis','nama','slug','kelas'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas', 'kelas');
    }

    public function tabungan(){
        return $this->hasMany(Tabungan::class, 'id_siswa', 'id');
    }
}
