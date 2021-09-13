<?php

namespace App\Http\Controllers;

use App\Survey;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['take', 'takeStore']);
    }

    public function create()
    {
        return view('survey.create');
    }

    public function show(Survey $survey)
    {
        return view('survey.show', compact('survey'));
    }

    public function store()
    {
        //dd(auth()->user());
        //dd(request()->all());

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        /*      $survey = new Survey();

        $survey->title = $data['title'];
        $survey->description = $data['description'];
        $survey->user_id = auth()->user()->id;
        $survey->save(); */
        $survey = auth()->user()->surveys()->create($data);

        return redirect('/survey/' . $survey->id);
    }


    public function take(Survey $survey, $slug)
    {
        return view('survey.take', compact('survey'));
    }

    public function takeStore(Survey $survey)
    {
        $data = request()->validate([
            'info.name' => 'required',
            'info.email' => 'required|email',
            'responses.*.question_id' => 'required',
            'responses.*.answer_id' => 'required'
        ]);

        //dd(request()->all());
        $surveyCompilation = $survey->surveyCompilations()->create($data['info']);
        $surveyCompilation->responses()->createMany($data['responses']);

        return view('survey.thank-you');
    }
}
