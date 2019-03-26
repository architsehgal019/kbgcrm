@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="text-uppercase">Add A post</h3>
				<form method="post" action="/blogs/add" enctype="multipart/form-data">
					<label class="mt-4">Title</label>
					<input type="text" class="form-control" name="title" placeholder="Add Title" aria-label="Blog Title">

					<label class="mt-4">Content</label>
					<textarea class="form-control" rows="30" placeholder="Add Content here" id="ckeditor-1" name="content"></textarea>

					<label class="mt-4">Image</label>
					<input type="file" name="blog_img" class="show-preview" accept="image/*" data-target="#blog_img" value="">
				
					{{csrf_field()}}
					<button class="btn btn-outline-secondary mt-4" type="submit">Add Post</button>
				</form>
			</div>
			<div class="col-12">
				<a href="/blogs/view" class="float-right btn btn-outline-primary">View Blog</a>
			</div>
		</div>
	</div>
@endsection
@section('extra-js')
	<script src="https://cdn.ckeditor.com/ckeditor5/10.0.0/classic/ckeditor.js"></script>
	<script type="text/javascript">
		ClassicEditor
		        .create( document.querySelector( '#ckeditor-1' ) )
		        .catch( error => {
		            console.error( error );
		        } );
	</script>
@endsection