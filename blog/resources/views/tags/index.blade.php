@extends('main')

@section('title', '| All Categories')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<h3>All Tags</h3><hr>
				<table class="table">
					<thead>
						<tr>
							<th>#</th>
							<th>Tags</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tags as $tag)
						<tr>
							<td>{{ $tag->id }}</td>
							<td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
		</div>
		<div class="col-md-3">
			<div class="well">
				<h3>New Tag</h3>
				<div class="form-group">
					{{ Form::open(['route' => 'tags.store', 'method' => 'POST'])}}

						{{ Form::text('name', null, ['class' => 'form-control'])}}
						<br>
						{{ Form::submit('Create New Tag', ['class' => 'btn btn-success btn-block'])}}
					{{ Form::close()}}
				</div>
			</div>
		</div>
	</div>
@stop