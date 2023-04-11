
@extends('layout.admin_main')
@section('content')	


	<div class="content-header row ">
		<div class="content-header-left col-md-6 col-6 mb-2 breadcrumb-new">
			<!-- <h3 class="content-header-title mb-0 d-inline-block">المستخدمين</h3><br> -->
			<div class="row breadcrumbs-top d-inline-block">
	            <div class="breadcrumb-wrapper col-12">
			        <ol class="breadcrumb">
		                <!-- <li class="breadcrumb-item"><a href="index.html">Home</a></li> -->
			            <!-- <li class="breadcrumb-item active">المستخدمين</li> -->
			        </ol> 
			    </div>
            </div>
		</div>
		<div class="content-header-right col-md-6 col-6">
            <div class="dropdown float-md-right">
                <a href="{{route('albums.index')}}"  class="btn btn-primary float-right mt-2">back</a>
            </div>
        </div>
    	<div class="content-header-center col-md-6 col-6">
			@if (session('message'))
			    <div class="alert alert-success">
		            {{ session('message') }}
	            </div>
			@endif
			@if (count($errors) > 0)
                <div class="alert alert-danger">
			        <button aria-label="Close" class="close" data-dismiss="alert" type="button">
        	            <span aria-hidden="true">&times;</span>
		            </button>
			        <strong>خطا</strong>
	                <ul>
	                    @foreach ($errors->all() as $error)
	                        <li>{{ $error }}</li>
		                @endforeach
				    </ul>
			    </div>
		    @endif
        </div>
	</div>

	<div class="content-body">
        <section class="inputmask" id="inputmask" style="text-align: left;">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Add Album</h4>
                  <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                      <li><a data-action="close"><i class="ft-x"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content collapse show">
                  <div class="card-body">
                   <form action="{{route('albums.store')}}" method="POST" 
                        name="le_form"  enctype="multipart/form-data">
                        @csrf
												<div class="row form-row">
														
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label>upload one Image or More</label>
																 <input type="file" name="images[]" class="myfrm form-control" multiple>
															</div>
														</div>
														<div class="col-12 col-sm-6">
															<div class="form-group">
																<label>Album Name</label>
																 <input type="text" name="name" class="myfrm form-control" style="text-align: left;">
															</div>
														</div>
											</div>
											<button type="submit" class="btn btn-primary btn-block">Save Album</button>
										</form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
    </div>
    <script src="http://code.jquery.com/jquery-3.4.1.js"></script>

	<!-- <script>
		$(document).ready(function () {
			$('#get_sub_category_name').on('change', function () {
	        	console.log("welcome sub"); 
	        	let id = $(this).val();
			    $.ajax({
				    type: 'GET',
				    url: "{{url('instructor/getSubCategory')}}/"+id,
				    success: function (response) {
				        var response = JSON.parse(response)
				        console.log(response);   
					    $('#get_sub_category').empty();
					    $('#get_sub_category').append(`<option value="0" disabled selected>Select </option>`);
					    response.forEach(element => {
					        $('#get_sub_category').append(`<option value="${element['id']}">
					        ${element['title']} - ${element['id']} 
					        </option>`);
					    });
					}
				});
			});
	    });

	</script> -->


@endsection


								