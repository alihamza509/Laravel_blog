@extends('admin/layout.layout')

@section('page_title','contact Listing')

@section('container')

<div class="">
	  <div class="page-title">
		 <div class="title_left">
			<h4>{{$page}}</h4>
			
		 </div>
	  </div>
	  <div class="clearfix"></div>
	  <div class="row">
		 <div class="col-md-12 col-sm-12 ">
			<div class="x_panel">
			   <div class="x_content">
				  <div class="row">
					 <div class="col-sm-12">
						<div class="card-box table-responsive">
						   <table id="datatable" class="table table-striped table-bordered" style="width:100%">
						   	@if($message=Session::get('success'))
<div class="alert alert-success">
  {{$message}}
</div>
@endif
							  <thead>
								 <tr>
									<th>S.No</th>
									<th>Name</th>
									<th>Email</th>
									<th>contact no</th>
									
									<th>message</th>
									<th>Added_on</th>
								 </tr>
							  </thead>
							 @foreach($data as $i=>$row)
                    <tbody>
                      <tr>
                        <td>{{++$i}}</td>
                        <td>{{$row->name}}</td>
                        <td>{{$row->email}}</td>
                        <td>{{$row->mobile}}</td>
                        <td>{{$row->message}}</td>
                           <td>{{$row->added_on}}</td>
                             
							</tr>	
							  </tbody>
							  @endforeach
						   </table>
						</div>
					 </div>
				  </div>
			   </div>
			</div>
		 </div>
	  </div>
   </div>
@endsection