<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesakit extends Model
{
    use HasFactory;

    // Maklumkan kepada model ini, nama table yang perlu dihubungi
    protected $table = 'pesakit';

    protected $fillable = [
        'nama_pesakit',
        'jenis_pengenalan',
        'id_pengenalan',
        'kewarganegaraan',
        'jenis_appointment'
    ];

    // Mutator Accessor
    public function getNamaPesakitAttribute($value)
    {
        return strtoupper($value);
    }
}
