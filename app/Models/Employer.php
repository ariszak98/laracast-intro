<?php

namespace App\Models;

use App\Models\Job;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employer extends Model
{
    use HasFactory;


    /**
     * Use a Employer Model to find ALL Job Models
     * related to that model
     * ( 1 Employer => MANY Jobs sooo => 'hasMany()' )
     */
    public function jobs(){
        return $this->hasMany(Job::class);
    }


}
