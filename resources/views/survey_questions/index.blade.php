@extends('layouts.master')

@section('title', 'Question List')

@section('bread_crump')
  <li><a href="{{ route('create-question', [Request::segment(1)]) }}"><i class="fa fa-dashboard"></i> Add New</a></li>
  <li class="active">View List</li>
@endsection

@section('content')
<?php $survey = \App\Survey::findOrFail( Request::segment(1) ); ?>
	<div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Question List </h3><span class="pull-right"><a href="{{ route('create-question', ['id' => $survey->id]) }}" class="btn btn-success">New Question</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <h2>Survey ::  {{ $survey->title }}</h2>
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Question</th>
                  <th>Answer Type</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>

                @foreach($questions as $question)
                
                <tr>
                  <td>{{ $ser++ }}</td>
                  <td>{{ $question->topic }}</td>
                  <td>{{ $question->question_status }}</td>
                  <td>{{ $question->answer_type }}</td>
                  <td>
                      <a href="{{ route('edit-question', ['sid'=>$question->survey_id, 'id'=>$question->id]) }}">Edit</a>
                  </td>
                </tr>
                @endforeach
                
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
              {!! $questions->render() !!}
              </ul>
            </div>
          </div>
          <!-- /.box -->
@endsection