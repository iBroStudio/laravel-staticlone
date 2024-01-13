<?php

namespace IBroStudio\StatiClone\Models;

use IBroStudio\DataRepository\ValueObjects\Uri;
use IBroStudio\StatiClone\Concerns\HasClone;
use IBroStudio\StatiClone\Contracts\StatiCloneWebsite;
use IBroStudio\StatiClone\Database\Factories\WebsiteFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Website extends Model implements StatiCloneWebsite
{
    use HasClone;
    use HasFactory;
    use HasSlug;

    protected $fillable = [
        'name',
        'url',
        'slug',
        'state',
    ];

    public function url(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Uri::make($value)
        );
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected static function newFactory(): Factory
    {
        return WebsiteFactory::new();
    }
}
