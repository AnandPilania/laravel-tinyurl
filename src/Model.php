<?php

namespace AP\Tinyurl;

use AP\Support\Model as Base;

class Model extends Base
{
	protected $table = 'tinyurl';
	protected $fillable = ['user_id', 'title', 'url', 'hash', 'privacy', 'password', 'expires_at'];
	protected $hidden = ['password'];
	protected $casts = ['privacy' => 'enum'];
	protected $dates = ['expires_at'];

    public function user()
    {
        $model = config('auth.providers.users.model');
        return $this->hasOne($model);
    }
}