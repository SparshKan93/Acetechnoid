<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Order extends Model
{
    use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $fillable = [
        'name', 'publication', 'series', 'author', 'standard', 'subject', 'ref_id', 'uid', 'cost', 'remark', 'company_id', 'group_id', 'created_by', 'updated_by', 'key_link', 'key_code'
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

    public function page()
    {
        return $this->hasOne('App\OrderPage')->orderBy('position');
    }
    
    public function pages()
    {
        return $this->hasMany('App\OrderPage')->orderBy('position');
    }

    public function firstPages()
    {
        return $this->hasOne('App\OrderPage');
    }
}
