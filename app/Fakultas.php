<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jurusan;

class Fakultas extends Model
{
    protected $table = 'fakultas';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_fakultas'];
}
