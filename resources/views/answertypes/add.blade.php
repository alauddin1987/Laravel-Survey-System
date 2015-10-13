@extends('layouts.master')

@section('title', 'Answer Type List')


@section('bread_crump')
  <li><a href="{{ route('index-answertype') }}"><i class="fa fa-dashboard"></i>View List</a></li>
  <li class="active"> Add New</li>
@endsection

@section('content')

<div class="box">
	<div class="register-box-body">

		<form action="{{ route('store-answertype')}}" method="post">
			{!! csrf_field() !!}
			
			@include('partials.answertype_form')

		</form>

	</div>
</div>
@endsection