<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['id','classroom_id','majors_id','nisn','name','lp','birthplace','birthdate','address','religion','contact','prev_sch','photo'];
    //protected $date = ['birthdate'];

    // public function classroom(){
    // 	return $this->belongsTo('App\Models\Classroom');
    // }

    // public function majors(){
    // 	return $this->belongsTo('App\Models\Major');
    // }
}
