@extends('layouts.app')
@section('content')
	<form action="/aboutus/update" method="post" enctype="multipart/form-data">
		<div class="container">
			<h3 class="text-uppercase">Add ABOUT US</h3>
			<div class="row">
				<div class="col-12">
					<label class="mt-3">About us content</label>
					<textarea class="form-control" rows="40" placeholder="About us content" id="ckeditor-1" name="about_content">{{$about->aboutcontent}}</textarea>
				</div>
				<div class="col-12">
					<label class="mt-3">Founder Name</label>
					<input type="text" name="founder_name" id="founder_name" class="form-control" aria-label="founder name" placeholder="Founder Name" value="{{$about->foundername}}">
					
					<label class="mt-3">Founder Image</label>
					<input type="file" name="img_url" class="show-preview" accept="image/*" data-target="#founder_img" value="{{$about->founderimg}}">
					<input type="hidden" name="imgname" value="{{$about->founderimg}}">

					<img src = "">

					<label class="mt-3">Founder Message</label>
					<textarea class="form-control" rows="40" placeholder="Founder Message" id="ckeditor-2" name="founder_msg">{{$about->foundermsg}}</textarea>
				</div>
			</div>
			{{csrf_field()}}
			<button class="btn btn-outline-secondary mt-4" type="submit">Save Content</button>
		</div>
	</form>
@endsection

@section('extra-js')
	<script src="https://cdn.ckeditor.com/ckeditor5/10.0.0/classic/ckeditor.js"></script>
	<script type="text/javascript">
		ClassicEditor
		        .create( document.querySelector( '#ckeditor-1' ) )
		        .catch( error => {
		            console.error( error );
		        } );

		   	ClassicEditor
		        .create( document.querySelector( '#ckeditor-2' ) )
		        .catch( error => {
		            console.error( error );
		        } );
	</script>
@endsection