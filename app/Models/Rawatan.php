<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rawatan extends Model
{
    use HasFactory;

    // Bila model ejaan dalam singular,
    // model akan mencari table dalam ejaan plural secara auto

    protected $fillable = [
        'pesakit_id',
        'nama_doktor',
        'id_doktor',
        'diagnosis'
    ];

    // Relation diantara table rawatan kepada table pesakit
    public function pesakit()
    {
        return $this->belongsTo(Pesakit::class);
    }
}
