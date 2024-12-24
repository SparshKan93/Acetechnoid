<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use App\Series;

class OrderItem extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = [
        'ebook_id', 'title', 'position', 'caption', 'url', 'created_by', 'updated_by'
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

    public static function que_type($chapter_num,$ebook_id)
    {
        $data = Series::all(); dd($data);
        
            
        foreach ($data as $key => $value) {
            $value->ques = PaperGenerator::select('id', 'question', 'que_type')->where(['ebook_id' => $ebook_id, 'chapter_num' => $chapter_num, 'que_type' => $value->que_type])->get();
        }

        return $data;
    }

}
