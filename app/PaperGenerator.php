<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use DB;

class PaperGenerator extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = [
    'subject', 'chapter', 'chapter_num', 'que_type', 'question', 'diagrams', 'answer', 'created_by', 'updated_by', 'ebook_id'
    ];  

    public static function boot()
     {
        parent::boot();
        static::creating(function($model)
        {
            $model->created_by = Auth::id();
			$model->updated_by = Auth::id();
            // $model->user_ip = \Request::ip();
        });
        static::updating(function($model)
        {
            $model->updated_by = Auth::id(); 
            // $model->user_ip = \Request::ip();
        });
    }

    public function que_type1()
    {
        return $this->belongsTo('App\QuestionType', 'que_type')->as('name')->withTimestamps();
    }

    public static function que_type($chapter_num,$ebook_id)
    {
        $data = PaperGenerator::select('que_type', 'name')
            ->leftJoin('question_types', 'question_types.id', 'paper_generators.que_type')
            ->distinct()
            ->where(['ebook_id' => $ebook_id, 'chapter_num' => $chapter_num])
            ->orderBy('que_type')
            ->get();
            
        foreach ($data as $key => $value) {
            $value->ques = PaperGenerator::select('id', 'question', 'que_type')->where(['ebook_id' => $ebook_id, 'chapter_num' => $chapter_num, 'que_type' => $value->que_type])->get();
        }

        return $data;
    }

}
