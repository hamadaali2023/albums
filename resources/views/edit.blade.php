@extends('layout.admin_main')
@section('content')	
<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block"></h3><br>
        <div class="row breadcrumbs-top d-inline-block">
        @if (session('message'))
		    <div class="alert alert-success">
			    {{ session('message') }}
		    </div>
		@endif
		</div>
    </div>             
</div>


<section id="basic-form-layouts">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title" id="bordered-layout-basic-form"> </h4>
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
                <div class="card-content collpase show">
                  <div class="card-body">
                   
			        <form  method="post"  action="{{route('images.update',$image->id)}}" enctype="multipart/form-data">
                @csrf
                 @method('put')
			           <div class="row form-row">
									<div class="col-12 col-sm-6">
										<div class="form-group">
											<img src="{{asset('images/'.$image->title) }}" alt="First slide"  height="100px" width="100">
											<label>Image</label>
											 <input type="file" name="images" class="myfrm form-control" >
										</div>
									</div>
			           </div>
		                <button type="submit" class="btn btn-primary btn-block">حفظ </button>
			        </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
    
 <script src="http://code.jquery.com/jquery-3.4.1.js"></script>

@endsection