<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Section extends Model
{
    use HasTranslations;
    public $translatable = ['Name_Section'];
    protected $fillable=['Name_Section','Grade_id','Class_id'];

    protected $table = 'sections';
    public $timestamps = true;


    // علاقة بين الاقسام والصفوف لجلب اسم الصف في جدول الاقسام

    public function My_classs()
    {
        return $this->belongsTo('App\Model\Classroom', 'Class_id');
    }

}
