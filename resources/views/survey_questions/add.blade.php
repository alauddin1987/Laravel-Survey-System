@extends('layouts.master')

@section('title', 'New Question')


@section('bread_crump')
	<li><a href="{{ route('index-question', [Request::segment(1)]) }}"><i class="fa fa-dashboard"></i> View List</a></li>
	<li class="active">Add New</li>
@endsection

@section('content')


<div class="box">
	<div class="register-box-body">

		<form action="{{ route('store-question') }}" method="post">
			{!! csrf_field() !!}
			

			@include('partials.question_form')

		</form>

	</div>
</div>
@endsection