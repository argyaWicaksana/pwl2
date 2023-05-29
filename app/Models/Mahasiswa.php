<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $guarded = [];
    protected $primaryKey = 'nim';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function mataKuliah()
    {
        return $this->belongsToMany(MataKuliah::class, 'mahasiswa_matakuliah', 'mahasiswa_nim', 'matakuliah_id')
            ->withPivot('nilai');
    }

    public function getRouteKeyName()
    {
        return 'nim';
    }
}
