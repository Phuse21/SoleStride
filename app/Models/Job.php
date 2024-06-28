<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use WisdomDiala\Countrypkg\Models\Country;
use WisdomDiala\Countrypkg\Models\State;

class Job extends Model
{
    use HasFactory;

    public function tag(string $name)
    {

        $tag = Tag::firstOrCreate(['name' => $name]);
        $this->tags()->attach($tag);
    }


    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function job_details()
    {
        return $this->hasOne(JobDetails::class);
    }


    public function getLocationAttribute()
    {
        $country = $this->Country ?? 'N/A';
        $state = $this->state ?? 'N/A';
        return $state . ', ' . $country;
    }

}