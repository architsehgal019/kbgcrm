@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="text-uppercase">Add Testimonial</h3>
				<form method="post" action="/testimonial/add" enctype="multipart/form-data">
					<label class="mt-4">Name</label>
					<input type="text" class="form-control" name="name" placeholder="Add Name" aria-label="Testimonial name">

					<label class="mt-4">Travel Package/Occupation</label>
					<input type="text" class="form-control" name="package" placeholder="Add Package or Occupation" aria-label="Package name">

					<label class="mt-4">Image</label>
					<input type="file" name="testimonial_img" class="show-preview" accept="image/*" data-target="#banner_img" value="">

					<label class="mt-4">Comment</label>
					<textarea class="form-control" rows="20" placeholder="Add Comment" id="ckeditor-1" name="comment"></textarea>
				
					{{csrf_field()}}
					<button class="btn btn-outline-secondary mt-4" type="submit">Add Testimonial</button>
				</form>
			</div>
			<div class="col-12 mt-4">
				<a href="/testimonial/view" class="float-right btn btn-outline-primary">View Testimonials</a>
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