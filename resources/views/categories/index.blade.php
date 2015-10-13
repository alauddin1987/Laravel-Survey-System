@extends('layouts.master')

@section('title', 'Category List')

@section('bread_crump')
  <li><a href="{{ route('create-category') }}"><i class="fa fa-dashboard"></i> Add New</a></li>
  <li class="active">View List</li>
@endsection

@section('content')
	<div class="box">
            <div class="box-header with-border">
            <h3 class="box-title">Category List </h3><span class="pull-right"><a href="{{ route('create-category') }}" class="btn btn-success">New Category</a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Name</th>
                  <th>Action</th>
                </tr>

                @foreach($categories as $category)
                <tr>
                  <td>{{ $ser++ }}</td>
                  <td>{{ $category->name }}</td>                  
                  <td>
                  <a href="{{ route('edit-category', [$category->id]) }}">Edit</a>
                  </td>
                </tr>
                @endforeach

               
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
              {!! $categories->render() !!}                
              </ul>
            </div>
          </div>
          <!-- /.box -->
@endsection