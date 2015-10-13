<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\StoreAnswerTypeRequest;
use App\Http\Controllers\Controller;
use App\AnswerType;
use Auth;

class AnswerTypeController extends Controller
{
   public function __construct()
   {
    $this->middleware('auth');
   }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answertypes = AnswerType::paginate(10);
     return view('answertypes.index', ['answertypes'=>$answertypes, 'ser'=>1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('answertypes.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnswerTypeRequest $request)
    {
        $answertype = new AnswerType();
        $answertype->name = $request->get('name');
        $answertype->user_id = Auth::user()->id;
        $answertype->save();
        return \Redirect::route('index-answertype')
        ->with('message', 'Record has been Saved');
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
       
       $answertype = AnswerType::findOrFail($id);
        return view('answertypes.edit', ['answertype' => $answertype]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAnswerTypeRequest $request)
    {
        $answertype = AnswerType::findOrFail($request->get('id'));
        $answertype->name = $request->get('name');
        $answertype->save();
        return \Redirect::route('index-answertype')
        ->with('message', 'Record has been Saved');
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
