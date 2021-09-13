<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    //
    public $guarded = [];

    public function surveyCompilation()
    {
        return $this->belongsTo(SurveyCompilation::class);
    }
}
