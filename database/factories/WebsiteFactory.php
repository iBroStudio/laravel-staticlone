<?php

namespace IBroStudio\StatiClone\Database\Factories;

use IBroStudio\StatiClone\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WebsiteFactory extends Factory
{
    protected $model = Website::class;

    public function definition()
    {
        return [
            'url' => Str::of(fake()->url())
                ->beforeLast('/')
                ->append('/')
                ->value(),
            'name' => Str::ucfirst(fake()->domainWord()),
            'slug' => function (array $attributes) {
                return Str::slug($attributes['name']);
            },
            'state' => 'active',
        ];
    }
}
