@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h3 class="mt-4">View Destination</h3>
			</div>
		</div>
			@forelse($testimonial as $testimonials)
				<div class="mt-4 row bg-light p-2">
					<form action="/testimonial/update" method="post" enctype="multipart/form-data">
						<div class="col-8">
							<label class="mt-4">Name</label>
							<input type="text" class="form-control" name="name" placeholder="Add Name" aria-label="Testimonial name" value="{{$testimonials->name}}">

							<label class="mt-4">Travel Package/Occupation</label>
							<input type="text" class="form-control" name="package" placeholder="Add Package or Occupation" aria-label="Package name" value="{{$testimonials->package}}">

							<label class="mt-4">Comment</label>
							<textarea class="form-control" rows="10" placeholder="Add Comment" name="comment" id="ckeditor-{{$testimonials->id}}">{{$testimonials->comment}}</textarea>						
						</div>
						<div class="col-4">
							<label class="mt-4">Image</label>
							<input type="file" name="testimonial_img" class="show-preview" accept="image/*" data-target="#banner_img" value="">
							<label class="mt-4"> Current Image </label>
							<img src="" class="w-100">
							<button type="submit" class="btn btn-primary">Update</button>
							<a href="{{url('/testimonial/delete/'.$testimonials->id)}}" class="btn btn-danger">Delete</a>
						</div>
						<input type="hidden" value="{{$testimonials->image}}" name="imgname">
						<input type="hidden" name="id" value="{{$testimonials->id}}">
					</form>
				</div>
				@empty{{'No Result found'}}
			@endforelse
		</div>
	</div>
@endsection
@section('extra-js')
	<script src="https://cdn.ckeditor.com/ckeditor5/10.0.0/classic/ckeditor.js"></script>
	<script type="text/javascript">
		@forelse($testimonial as $testimonials)
			ClassicEditor
		        .create( document.querySelector( '#ckeditor-{{$testimonials->id}}' ) )
		        .catch( error => {
		            console.error( error );
		        });
			@empty{{''}}
		@endforelse
	</script>
@endsection