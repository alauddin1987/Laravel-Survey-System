@extends('layouts.master')

@section('title', 'Survey List')

@section('bread_crump')
	<li><a href="{{ route('index-survey') }}"><i class="fa fa-dashboard"></i> View List</a></li>
	<li class="active">Add New</li>
@endsection

@section('content')

<link rel="stylesheet" href="{{ URL::asset('plugins/daterangepicker/daterangepicker-bs3.css') }}">
<div class="box">
	<div class="register-box-body">

		<form action="{{ route('store-survey') }}" method="post">
			{!! csrf_field() !!}
			
			@include('partials.survey_form')

		</form>

	</div>
</div>
@endsection