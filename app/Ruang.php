<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table="ruang";
    protected $primaryKey='id';
    protected $fillable = [
        'id',
        'nama_ruang',
        'kode_ruangan',
    ];
    public $timestamps=false;
}
