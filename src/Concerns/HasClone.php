<?php

namespace IBroStudio\StatiClone\Concerns;

use IBroStudio\StatiClone\Models\WebsiteClone;
use Illuminate\Database\Eloquent\Relations\HasOne;

trait HasClone
{
    public function clone(): HasOne
    {
        return $this->hasOne(WebsiteClone::class);
    }
}
