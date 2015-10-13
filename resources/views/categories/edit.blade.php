@extends('layouts.master')

@section('title', 'Category Edit')


@section('bread_crump')
  <li><a href="{{ route('index-category') }}"><i class="fa fa-dashboard"></i>View List</a></li>
  <li class="active">Edit Record</li>
@endsection

@section('content')

<div class="box">
	<div class="register-box-body">

		<form action="{{ route('update-category') }}" method="post">
			{!! csrf_field() !!}

			<input type="hidden" name="id" value="{{ $category->id }}">
			
			@include('partials.category_form')

		</form>

	</div>
</div>
@endsection