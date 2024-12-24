<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Series extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = [
         'name', 'description', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by', 'deleted_at'
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

    public function ebooks()
    {
        return $this->hasMany('App\Ebook', 'series', 'name')->orderBy('subject');
    }

    public static function ebooks_list()
    {
        $data = Series::where('status', 1)->get();
        foreach ($data as $key => $value) {
            $value->ebook = Ebook::with('pages')->where('series', 'LIKE', '%'.$value->name)->orderBy('subject')->get();
            // $value->temp = 'No'; dd($value);
        }
        return $data;
    }
}
