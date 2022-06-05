<?php

namespace App\Messages;

use App\Common\Models\Traits\UsesUuid;
use App\Users\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use UsesUuid;

    protected $guarded = ['id', 'created_at'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owned_by_user_id');
    }
}
