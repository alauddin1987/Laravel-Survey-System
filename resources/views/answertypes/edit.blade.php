@extends('layouts.master')

@section('title', 'Answer Type Edit')


@section('bread_crump')
  <li><a href="{{ route('index-answertype') }}"><i class="fa fa-dashboard"></i>View List</a></li>
  <li class="active">Edit Record</li>
@endsection

@section('content')

<div class="box">
	<div class="register-box-body">

		<form action="{{ route('update-answertype') }}" method="post">
			{!! csrf_field() !!}

			<input type="hidden" name="id" value="{{ $answertype->id }}">
			
			@include('partials.answertype_form')

		</form>

	</div>
</div>
@endsection