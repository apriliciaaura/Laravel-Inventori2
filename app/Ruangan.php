<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jurusan;

class Ruangan extends Model
{
    public $table = 'ruangan';
    protected $primaryKey = 'id_ruangan';
    protected $fillable = ['nama_ruangan', 'jurusan_id'];

    public function jurusan(){
    	return $this->belongsTo(Jurusan::class);
	}	
}
