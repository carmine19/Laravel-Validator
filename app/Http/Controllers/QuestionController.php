<?php

namespace App\Http\Controllers;

use App\Survey;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Survey $survey)
    {
        return view('question.create', compact('survey'));
    }

    public function store(Survey $survey)
    {
        $data = request()->validate([
            'question.question' => 'required',
            'answers.*.answer' => 'required'
        ]);

        //dd(request()->all());

        $question = $survey->questions()->create($data['question']);
        $question->answers()->createMany($data['answers']);
        //'seconda domanda 3'
        //"question" => "test"
        //'question' => 'seconda domanda 3'
        //$question = $survey->questions()->create(['question' => $data['question']]);

        return redirect('/survey/' . $survey->id);
    }

    public function delete(Survey $survey, Question $question)
    {

        $question->responses()->delete();
        $question->answers()->delete();
        $question->delete();

        return redirect($survey->link());
    }
}
