<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyCompilation extends Model
{
    //
    public $guarded = [];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}
