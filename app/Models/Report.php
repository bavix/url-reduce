<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{

    /**
     * @return BelongsTo
     */
    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }

    /**
     * @param Link $link
     * @return Report|null
     */
    public static function add(Link $link): ?self
    {
        $carbon = Carbon::create()->subDays(2);
        if ($carbon->greaterThan($link->reported_at)) {
            $self = new static();
            $self->link_id = $link->id;
            $self->ip = request()->getClientIp();
            if ($self->save()) {
                return $self;
            }
        }

        return null;
    }

}
