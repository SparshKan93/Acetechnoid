<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class QuestionType extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = [
         'name', 'description', 'marks', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_at'
    ];

    public static function boot()
     {
        parent::boot();
        static::creating(function($model)
        {
            $model->status = 1;
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

    public function pages()
    {
        return $this->hasMany('App\EbookPage')->orderBy('position', 'asc');
    }
}
