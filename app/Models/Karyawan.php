<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $table = 'karyawan';
    protected $primaryKey = 'nip';
    protected $fillable = ['nip','nama_karyawan','gaji_karyawan','alamat','jenis_kelamin','departemen_id'];
    
    public function departemen()
    {
        return $this->belongsTo(Departemen::class, 'departemen_id');
    }
}
