<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    /**
     * Use a Tag Model to find all Jobs connected to it
     * ( 1 Tag can be placed on MANY Jobs: 1 Tag 'belongsToMany' Jobs )
     */
    public function jobs(){
        return $this->belongsToMany(Job::class, relatedPivotKey: "job_listing_id");
    }


}
 