@extends('layouts.master')

@section('title', 'Edit Survey')


@section('bread_crump')
	<li><a href="{{ route('index-survey') }}"><i class="fa fa-dashboard"></i> View List</a></li>
	<li class="active">Edit Record</li>
@endsection

@section('content')

<link rel="stylesheet" href="{{ URL::asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
<div class="box">
	<div class="register-box-body">

		<form action="{{ route('update-survey') }}" method="post">
			{!! csrf_field() !!}

			<input type="hidden" name="id" value="{{ $survey->id }}">
			
			@include('partials.survey_form')

		</form>

	</div>
</div>
@endsection