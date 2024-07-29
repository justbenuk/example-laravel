<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';
    // below is a safe way to protect entered fields
    //protected $fillable = ['employer_id', 'title', 'salary'];

    // some people say this isnt that safe
    protected $guarded = [];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}
