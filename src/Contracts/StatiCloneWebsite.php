<?php

namespace IBroStudio\StatiClone\Contracts;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Sluggable\SlugOptions;

interface StatiCloneWebsite
{
    public function url(): Attribute;

    public function clone(): HasOne;
}
