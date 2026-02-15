<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Services\ModelActivityLogger;

class ModelActivityObserver
{
    public function created(Model $model)
    {
        ModelActivityLogger::log('created', $model, [], $model->getAttributes());
    }

    public function updating(Model $model)
    {
        $model->oldAttributes = $model->getOriginal() ?? null;
    }

    public function updated(Model $model)
    {
        $old = $model->oldAttributes ?? [];
        $new = $model->getChanges();

        ModelActivityLogger::log('updated', $model, $old, $new);
    }

    public function deleting(Model $model)
    {
        $model->deletedAttributes = $model->getOriginal();
    }

    public function deleted(Model $model)
    {
        ModelActivityLogger::log('deleted', $model, $model->deletedAttributes ?? [], []);
    }
    
}
