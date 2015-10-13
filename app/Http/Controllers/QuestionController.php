<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SurveyQuestion;
use App\Survey;
use App\AnswerType;
use App\Http\Requests\StoreQuestionRequest;
use Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

     $questions = SurveyQuestion::where('survey_id', $request->segment(1) )->paginate(10);
     return view('survey_questions.index', ['questions'=>$questions, 'ser'=>1] );
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $survey_list = Survey::lists('title', 'id');
        $answer_types = AnswerType::lists('name', 'id');
        return view('survey_questions.add', ['survey_list' => $survey_list, 'answer_types' => $answer_types]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {

        $question = new SurveyQuestion();
        $question->survey_id = $request->get('survey_id');
        $question->topic = $request->get('topic');
        $question->answer_type = $request->get('answer_type');
        $question->question_status = $request->get('question_status');
        $question->user_id = Auth::user()->id;
        $question->save();
        return \Redirect::route('index-question', [$request->get('survey_id')])
        ->with('message', 'Record has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Survey_id, $id)
    {
        $survey_list = Survey::lists('title', 'id');
        $answer_types = AnswerType::lists('name', 'id');
        $question = SurveyQuestion::findOrFail($id);
        return view('survey_questions.edit', ['question' => $question, 'survey_list'=>$survey_list, 'answer_types'=>$answer_types]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreQuestionRequest $request)
    {
       $question = SurveyQuestion::findOrFail($request->get('id'));
       $question->survey_id = $request->get('survey_id');
       $question->topic = $request->get('topic');
       $question->answer_type = $request->get('answer_type');
       $question->question_status = $request->get('question_status');
       $question->save();
       return \Redirect::route('index-question', [$request->get('survey_id')])
       ->with('message', 'Record has been added');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
