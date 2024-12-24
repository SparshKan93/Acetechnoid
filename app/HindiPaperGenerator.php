<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class HindiPaperGenerator extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = [
    'subject', 'chapter', 'chapter_num', 'que_type', 'que_type_id', 'question', 'diagrams', 'answer', 'created_by', 'updated_by', 'ebook_id'
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
    
    public static function all_que_type($chapter_num,$ebook_id)
    {
        $data = HindiPaperGenerator::select('que_type_id as que_type', 'name')
            ->leftJoin('hindi_question_types', 'hindi_question_types.id', 'hindi_paper_generators.que_type_id')
            ->distinct()
            ->where(['ebook_id' => $ebook_id, 'chapter_num' => $chapter_num])
            ->orderBy('que_type_id')
            ->get();
            
        foreach ($data as $key => $value) {
            $value->ques = HindiPaperGenerator::select('id', 'question', 'que_type_id as que_type', 'answer')->where(['ebook_id' => $ebook_id, 'chapter_num' => $chapter_num, 'que_type_id' => $value->que_type])->get();
        }

        return $data;
    }

    public static function que_type2($chapter_num,$ebook_id) //old 13-06-2022
    {
        $data = HindiPaperGenerator::select('que_type as name')
            // ->leftJoin('question_types', 'question_types.id', 'paper_generators.que_type')
            ->distinct()
            ->where(['ebook_id' => $ebook_id, 'chapter_num' => $chapter_num])
            ->orderBy('que_type')
            ->get();
            
        foreach ($data as $key => $value) {
            $value->ques = HindiPaperGenerator::select('id', 'question', 'que_type', 'answer')->where(['ebook_id' => $ebook_id, 'chapter_num' => $chapter_num, 'que_type' => $value->name])->get();
        }

        return $data;
    }
    
    public static function queTypeAuto($chapter_num,$ebook_id)
    {
        $data = HindiPaperGenerator::select('que_type_id as que_type', 'name')
            ->leftJoin('hindi_question_types', 'hindi_question_types.id', 'hindi_paper_generators.que_type_id')
            ->distinct()
            ->where(['ebook_id' => $ebook_id])
            ->whereIn('chapter_num', $chapter_num)
            ->orderBy('que_type')
            ->get();
            
        foreach ($data as $key => $value) {
            $value->ques = HindiPaperGenerator::select('id', 'question', 'answer')->where(['ebook_id' => $ebook_id, 'que_type_id' => $value->que_type])
                ->whereIn('chapter_num', $chapter_num)
                ->get();
        }

        return $data;
    }
    
    public static function finalPaper($ebook_id, $chapter_num, $ques_array)
    {
        foreach ($ques_array as $key => $value) {

            if($value['questions'][0]>0){
                $value['que_type_name'] = HindiQuestionType::where('id', $key)->pluck('name')->first();
                $value['que_type_id'] = $key;

                $value['ques'] = HindiPaperGenerator::select('id', 'question', 'que_type', 'answer')
                                ->where([
                                    'ebook_id' => $ebook_id, 
                                    'que_type_id' => $key])
                                ->whereIn('chapter_num', $chapter_num)
                                ->inRandomOrder()
                                ->limit($value['questions'][0])
                                ->get();
            }
            $ques_array[$key] = $value;
        }

        return $ques_array;
    }

}
