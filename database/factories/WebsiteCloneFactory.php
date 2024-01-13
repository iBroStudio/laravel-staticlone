<?php

namespace IBroStudio\StatiClone\Database\Factories;

use IBroStudio\StatiClone\Models\Website;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class WebsiteCloneFactory extends Factory
{
    protected $model = Website::class;

    public function definition()
    {
        return [
           'website_id' => Website::factory(),
            'state' => 'started',
            'disk_name' => '',
            'path',
            'size_in_kb'
        ];
    }
}
/*
Schema::create('website_clones', function (Blueprint $table) {
    $table->bigIncrements('id');
    $table->foreignId('website_id')
        ->constrained(
            table: config('staticlone.database.websites_table') ,
            indexName: 'clone_website_id'
        )
        ->onDelete('cascade');
    $table->string('state');
    $table->string('disk_name');
    $table->string('path')->nullable();
    $table->unsignedBigInteger('size_in_kb')->nullable();
    $table->timestamps();
    $table->timestamp('completed_at')->nullable();
*/
