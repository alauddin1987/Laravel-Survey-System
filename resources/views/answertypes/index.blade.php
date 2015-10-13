@extends('layouts.master')

@section('title', 'Answer Type List')

@section('bread_crump')
  <li><a href="{{ route('create-answertype') }}"><i class="fa fa-dashboard"></i> Add New</a></li>
  <li class="active">View List</li>
@endsection

@section('content')
	<div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Answer Type List </h3><span class="pull-right"><a href="{{ route('create-answertype') }}" class="btn btn-success">New Answer Type</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>

                @foreach($answertypes as $answertype)
                <tr>
                  <td>{{ $ser++ }}</td>
                  <td>{{ $answertype->name }}</td>                  
                  <td>
                  <a href="{{ route('edit-answertype', [$answertype->id]) }}">Edit</a>
                  </td>
                </tr>
                @endforeach

               
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
              {!! $answertypes->render() !!}                
              </ul>
            </div>
          </div>
          <!-- /.box -->
@endsection