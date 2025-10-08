<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departemen extends Model
{
    use HasFactory;
    protected $table = 'departemen' ;
    protected $primaryKey = 'id';
    protected $fillable = ['nama_departemen'];
    
    public function karyawan()
        {
            return $this->hasMany(Karyawan::class, 'departemen_id');
        }
}