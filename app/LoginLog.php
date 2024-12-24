<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class LoginLog extends Model
{
    use SoftDeletes;
    protected $connection = 'mysql2';
	protected $dates = ['deleted_at'];
	protected $fillable = [
        'id', 'activity', 'created_by', 'updated_by', 'user_sys', 'created_at', 'updated_at', 'deleted_at'
    ];

    public static function boot()
     {
        parent::boot();
        static::creating(function($model)
        {
            $model->created_by = Auth::id();
			// $model->updated_by = Auth::id();
            $model->user_ip = json_encode([
                                    'system' => gethostbyname(gethostname()), 
                                    'public' => file_get_contents("http://ipecho.net/plain"), 
                                    'mac_add' => substr(exec('getmac'), 0, 17),
                                    'device' => $_SERVER["HTTP_USER_AGENT"]
                                ]);
        });
        static::updating(function($model)
        {
            $model->updated_by = Auth::id(); 
            // $model->user_ip = json_encode([
                                //     'system' => gethostbyname(gethostname()), 
                                    // 'public' => file_get_contents("http://ipecho.net/plain"), 
                                    // 'mac_add' => substr(exec('getmac'), 0, 17),
                                    // 'device' => $_SERVER["HTTP_USER_AGENT"],
                                // ]);
        });
    }

    public function page()
    {
        return $this->hasOne('App\EbookPage');
    }
    
    public function pages()
    {
        return $this->hasMany('App\EbookPage')->orderBy('position');
    }

    public function firstPages()
    {
        return $this->hasOne('App\EbookPage');
    }
}
