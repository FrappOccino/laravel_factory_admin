<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use App\Services\ModelActivityLogger;

class ModelActivityObserver
{
    protected $oldAttributes = [];

    public function created(Model $model)
    {
        ModelActivityLogger::log('created', $model, [], $model->getAttributes());
    }

    public function updating(Model $model)
    {
        $this->oldAttributes[$model->getKey()] = $model->getOriginal();
    }

    public function updated(Model $model)
    {
        $old = $this->oldAttributes[$model->getKey()] ?? [];
        $new = $model->getChanges();

        ModelActivityLogger::log('updated', $model, $old, $new);

        unset($this->oldAttributes[$model->getKey()]);
    }

    public function deleting(Model $model)
    {
        $this->oldAttributes[$model->getKey()] = $model->getOriginal();
    }

    public function deleted(Model $model)
    {
        $old = $this->oldAttributes[$model->getKey()] ?? [];
        ModelActivityLogger::log('deleted', $model, $old, []);

        unset($this->oldAttributes[$model->getKey()]);
    }
}
