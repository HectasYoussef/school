<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];
    protected $fillable=['Name','Notes'];
    protected $table = 'Grades';
    public $timestamps = true;


public function Sections()
{
    return $this->hasMany('App\Model\Section','Grade_id');
}


}
