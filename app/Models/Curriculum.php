<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
        // テーブル名を明示的に指定する
    protected $table = 'curriculums';
    
    public function progress()
    {
        return $this->hasMany(CurriculumProgress::class, 'curriculums_id');
    }
}
