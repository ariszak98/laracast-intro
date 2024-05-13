<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\Employer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model {

    use HasFactory;

    protected $table ='job_listings';

    protected $fillable = ['title', 'salary'];

    /**
     * Use a Job Model to find the SPECIFIC Employer Model
     * connected to it. ( 1 Job => 1 Employer soooo => 'belongsTo()' )
     */
    public function employer() {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Use a Job Model to find ALL the Tags that it contains
     * ( 1 Job => (many) Tags == 'belongsToMany' )
     */
    public function tags(){
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
    
}