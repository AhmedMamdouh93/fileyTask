<?php

namespace App\Filey\BaseApp\Traits;

use App\Filey\Users\User;
use Illuminate\Support\Facades\DB;

trait CreatedBy
{
    public static function bootCreatedBy()
    {
        static::saved(function ($model) {
            if (!$model->user_id && $model->table != null) {
                if ($user = auth()->user()) {
                    DB::table($model->table)->where('id', $model->id)->update(['user_id' => (@$user->id)? : null]);
                }
            }
        });
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id')->withDefault();
    }
}
