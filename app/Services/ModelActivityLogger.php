<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ModelActivityLogger
{
    public static function log(string $event, Model $model, array $old = [], array $new = [])
    {
        $userId = Auth::id() ?? 'guest';
    
        $message = [
            'event'      => $event,
            'model'      => class_basename($model),
            'record_id'  => $model->getKey(),
            'user_id'    => $userId,
            'old_values' => $old,
            'new_values' => $new,
        ];

        Log::info('MODEL_ACTIVITY', $message);
    }
}
