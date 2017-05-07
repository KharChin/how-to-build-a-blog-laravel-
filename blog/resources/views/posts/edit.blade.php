@extends('main')

@section('title', '| Edit Post')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}

	
@endsection

@section ('content')
	<div class="row">
		<div class="col-md-8">
			<h2>Create Post</h2><hr>

				{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT', 'files' =>true]) !!}
					<div class="form-group">
						{{ Form::label('title', 'Title:')}}
						{{ Form::text('title', null, ['class' => 'form-control'])}}
					</div>

					<div class="form-group">
						{{ Form::label('slug', 'Slug:')}}
						{{ Form::text('slug', null, ['class' => 'form-control', 'required' => '.', 'minlength' => '5', 'maxlength' => '255'])}}
					</div>

					<div class="form-group">
						{{ Form::label('category', 'Category:')}}
						<select name="category_id" id="" class="form-control">
							@foreach($categories as $category)
								<option value="{{ $category->id }}">{{ $category->name}}</option>
							@endforeach
						</select>
					</div>

					<div class="fomr-group">
						{{ Form::label('featured_img', 'Upload a Featured Image') }}
						{{ Form::file('featured_img') }}
					</div><br>

					<div class="form-group">
						{{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
						{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
					</div>	

					<div class="form-group">
						{{ Form::label('body', 'Body:')}}
						{{ Form::textarea('body', null, ['class' => 'form-control'])}}
					</div>

					<div class="form-group">
						{{ Form::submit('Create Post', ['class' =>'btn btn-success btn-block'])}}						
					</div>

		</div>

		<div class="col-md-4">
			<div class="well">
				<p><strong>Created At:</strong>
				{{ date('M j, Y', strtotime($post->created_at))}}</p>
				<p><strong>Updated At:</strong>
				{{ date('M j, Y', strtotime($post->updated_at))}}</p>

				<div class="row">
					<div class="col-sm-6">
						<a href="{{ route('posts.index', $post->id)}}" class="btn btn-primary btn-block">Cancel</a>
					</div>
					<div class="col-sm-6">						
						{{ Form::submit('Save Changes', ['class' => 'btn btn-danger btn-block'])}}
					</div>													
				</div>
		</div>
		{{ Form::Close()}}
	</div>
	
@stop

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$(".select2-multi").select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
	</script>

@endsection

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  	<script>
  		tinymce.init({ 
  			selector:'textarea'
  		 });
  	</script>
