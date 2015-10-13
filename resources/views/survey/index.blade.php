@extends('layouts.master')

@section('title', 'Survey List')

@section('bread_crump')
  <li><a href="{{ route('create-survey') }}"><i class="fa fa-dashboard"></i> Add New</a></li>
  <li class="active">View List</li>
@endsection

@section('content')
	<div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Survey List </h3><span class="pull-right"><a href="{{ route('create-survey') }}" class="btn btn-success">New Survey</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Title</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Restriction</th>
                  <th>Allow Survey No</th>
                  <th>Status</th>
                  <th>Question</th>
                  <th>Action</th>
                </tr>

                @foreach($survey_list as $survey)
                <tr>
                  <td>{{ $ser++ }}</td>
                  <td>{{ $survey->title }}</td>
                  <td>{{ $survey->start_date }}</td>
                  <td>{{ $survey->end_date }}</td>
                  <td>{{ $survey->survey_restriction }} </td>
                  <td>{{ $survey->allowed_survey_no }} </td>
                  <td>{{ $survey->survey_status }}</td>
                  <td>
                  <a href="{{ route('create-question', [$survey->id])}}">Add Question</a>

                  </td>
                  <td>
                  <a href="{{ route('edit-survey', [$survey->id])}}">Edit</a>

                  </td>
                </tr>
                @endforeach

               
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
              {!! $survey_list->render() !!}
              </ul>
            </div>
          </div>
          <!-- /.box -->
@endsection