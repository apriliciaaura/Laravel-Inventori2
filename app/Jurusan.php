<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    protected $fillable = ['nama_jurusan', 'fakultas_id'];

    public function fakultas(){
    	return $this->belongsTo(Fakultas::class);
	}
}
