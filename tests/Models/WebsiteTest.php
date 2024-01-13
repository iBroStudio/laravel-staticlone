<?php

/*
it('can test', function () {
    $staticlone = new \IBroStudio\StatiClone\StatiClone('https://www.laetitia-maltese.com');
    $process = $staticlone->run();
    expect($process)->toBeTrue();
});
*/

use IBroStudio\DataRepository\ValueObjects\Uri;
use IBroStudio\StatiClone\Models\Website;
use Illuminate\Support\Str;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\assertModelExists;

it('can create website', function () {
    $website = Website::factory()->create();

    assertModelExists($website);
    assertDatabaseHas(Website::class, [
        'name' => $website->name,
        'url' => $website->url,
        'slug' => $website->slug,
        'state' => $website->state,
    ]);
});

it('has a ValueObject attribute for url', function () {
    $website = Website::factory()->create();

    expect($website->url)->toBeInstanceOf(Uri::class);
});

it('can generate a slug', function () {
    $website = Website::factory()->create();

    assertDatabaseHas(Website::class, [
        'slug' => Str::slug($website->name),
    ]);
});
