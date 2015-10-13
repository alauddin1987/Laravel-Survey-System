<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSurveyRequest;
use App\Survey;
use App\Category;
use Auth;
use Carbon\Carbon;

class SurveyController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $survey_list = Survey::paginate(10);
     return view('survey.index', ['survey_list'=>$survey_list, 'ser'=>1]);
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category_list = Category::lists('name', 'id');
        return view('survey.add', ['category_list'=>$category_list]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSurveyRequest $request)
    {
        $survey = new Survey();
        $survey->category_id = $request->get('category_id');
        $survey->title = $request->get('title');
        list($start_date, $end_date) = explode(' - ', $request->get('poll_date_range'));
        $survey->start_date = Carbon::createFromFormat('m/d/Y', $start_date)->format('Y-m-d');
        $survey->end_date = Carbon::createFromFormat('m/d/Y', $end_date)->format('Y-m-d');
        $survey->allowed_survey_no = $request->get('allowed_survey_no');
        $survey->survey_restriction = $request->get('survey_restriction');
        $survey->redirect_url = $request->get('redirect_url');
        $survey->survey_status = $request->get('survey_status');
        $survey->user_id = Auth::user()->id;
        $survey->save();
        return \Redirect::route('index-survey')
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
    public function edit($id)
    {
        $category_list = Category::lists('name', 'id');
        $survey = Survey::findOrFail($id);
        $start_date = Carbon::createFromFormat('Y-m-d', $survey->start_date)->format('m/d/Y');
        $end_date = Carbon::createFromFormat('Y-m-d', $survey->end_date)->format('m/d/Y');
        $survey->date_range = $start_date." - ".$end_date;
        return view('survey.edit', ['survey' => $survey, 'category_list'=>$category_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSurveyRequest $request)
    {
        $survey = Survey::findOrFail($request->get('id'));
        $survey->category_id = $request->get('category_id');
        $survey->title = $request->get('title');

        list($start_date, $end_date) = explode(' - ', $request->get('poll_date_range'));
        $survey->start_date = Carbon::createFromFormat('m/d/Y', $start_date)->format('Y-m-d');
        $survey->end_date = Carbon::createFromFormat('m/d/Y', $end_date)->format('Y-m-d');

         $survey->allowed_survey_no = $request->get('allowed_survey_no');
         $survey->survey_restriction = $request->get('survey_restriction');
         $survey->redirect_url = $request->get('redirect_url');
         $survey->survey_status = $request->get('survey_status');
        $survey->save();
        return \Redirect::route('index-survey')
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
