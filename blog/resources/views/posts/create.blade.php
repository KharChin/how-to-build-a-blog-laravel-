@extends('main')

@section('title', '| Create New Post')

@section('stylesheets')

	{!! Html::style('css/select2.min.css') !!}
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
  	<script>
  		tinymce.init({ 
  			selector:'textarea'
  		 });
  	</script>
	
@endsection

@section ('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Create Post</h2><hr>

				{!! Form::open(array('route' => 'posts.store', 'data-parsley-validate' => '', 'files' => true)) !!}

					<div class="form-group">
						{{ Form::label('title', 'Title:')}}
						{{ Form::text('title', null, ['class' => 'form-control'])}}
					</div>

					<div class="form-group">
						{{ Form::label('slug', 'Slug:')}}
						{{ Form::text('slug', null, ['class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255'])}}
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
						{{ Form::label('tags', 'Tags:') }}
						<select class="form-control select2-multi" name="tags[]"  multiple="multiple">
							@foreach($tags as $tag)
								<option value='{{ $tag->id }}'>{{ $tag->name }}</option>
							@endforeach
						</select>
					</div>						

					<div class="form-group">
						{{ Form::label('body', 'Body:')}}
						{{ Form::textarea('body', null, ['class' => 'form-control'])}}
					</div>

					<div class="form-group">
						{{ Form::submit('Create Post', ['class' =>'btn btn-success btn-block'])}}						
					</div>

				{!! Form::close() !!}
		</div>
	</div>
	
@stop

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$(".js-example-basic-multiple").select2();
	</script>

@endsection