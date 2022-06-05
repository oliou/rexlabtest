<?php

namespace App\Topics;

use App\Common\Models\Traits\UsesUuid;
use App\Messages\Message;
use App\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    use UsesUuid;

    protected $guarded = ['id', 'created_at'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owned_by_user_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }
}
