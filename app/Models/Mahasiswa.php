<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $fillable = [
        'nim',
        'nama',
        'kelas',
        'jurusan',
        'no_hp',
        'email',
        'tgl_lahir',
    ];

    public function getRouteKeyName()
    {
        return 'nim';        
    }
}
