@extends('main')

@section('title', '| All Categories')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h3>All Categories</h3><hr>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Categories</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>{{ $category->id }}</td>
							<td>{{ $category->name }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
		</div>
		<div class="col-md-3">
			<div class="well">
				<h3>New Category</h3>
				<div class="form-group">
					{{ Form::open(['route' => 'category.store', 'method' => 'POST'])}}

						{{ Form::text('name', null, ['class' => 'form-control'])}}
						<br>
						{{ Form::submit('Create New Category', ['class' => 'btn btn-success btn-block'])}}
					{{ Form::close()}}
				</div>
			</div>
		</div>
	</div>
@stop