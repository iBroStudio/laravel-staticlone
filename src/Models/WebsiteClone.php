<?php

namespace IBroStudio\StatiClone\Models;

use IBroStudio\DataRepository\ValueObjects\Uri;
use IBroStudio\StatiClone\Database\Factories\WebsiteCloneFactory;
use IBroStudio\StatiClone\Database\Factories\WebsiteFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class WebsiteClone extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'disk_name',
        'path',
        'size_in_kb',
        'completed_at',
    ];

    protected $casts = [
        'size_in_kb' => 'int',
        'completed_at' => 'datetime',
    ];

    public function disk(): Attribute
    {
        return Attribute::make(
            get: fn (mixed $value, array $attributes) => Storage::disk($attributes['disk_name'])
        );
    }

    public function website(): BelongsTo
    {
        return $this->belongsTo(config('staticlone.models.website'));
    }

    protected static function newFactory(): Factory
    {
        return WebsiteCloneFactory::new();
    }
}
