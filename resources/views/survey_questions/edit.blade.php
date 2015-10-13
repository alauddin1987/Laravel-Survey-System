@extends('layouts.master')

@section('title', 'Question Edit')

@section('bread_crump')
  <li><a href="{{ route('index-question', [Request::segment(1)]) }}"><i class="fa fa-dashboard"></i>View List</a></li>
  <li class="active">Record Edit</li>
@endsection

@section('content')

<div class="box">
	<div class="register-box-body">

		<form action="{{ route('update-question', [$question->survey_id])}}" method="post">
			{!! csrf_field() !!}

			<input type="hidden" name="id" value="{{ $question->id }}">
			
			@include('partials.question_form')

		</form>

	</div>
</div>
@endsection