<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    public $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function surveyCompilations()
    {
        return $this->hasMany(SurveyCompilation::class);
    }

    public function link()
    {
        return '/survey/' . $this->id;
    }

    public function publicUrl()
    {
        return url('/survey/take/' . $this->id . '-' . Str::slug($this->title));
    }
}
