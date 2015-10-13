@extends('layouts.master')

@section('title', 'Category List')


@section('bread_crump')
  <li><a href="{{ route('index-category') }}"><i class="fa fa-dashboard"></i>View List</a></li>
  <li class="active"> Add New</li>
@endsection

@section('content')

<div class="box">
	<div class="register-box-body">

		<form action="{{ route('store-category')}}" method="post">
			{!! csrf_field() !!}
			
			@include('partials.category_form')

		</form>

	</div>
</div>
@endsection