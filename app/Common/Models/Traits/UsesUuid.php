<?php

namespace App\Common\Models\Traits;

use Illuminate\Support\Str;

trait UsesUuid{
    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }

    public static function bootUsesUuid(){
        static::creating(function ($model) {
            if (! $model->getKey()) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
