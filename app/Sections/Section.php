<?php

namespace App\Sections;

use App\Common\Models\Traits\UsesUuid;
use App\Topics\Topic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Section extends Model
{
    use UsesUuid;

    protected $guarded = ['id', 'created_at'];

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }
}
