@extends('admin/layout.layout')

@section('page_title','Manage Page')

@section('container')

   <div class="">
                  <div class="page-title">
                     <div class="title_left">
                        <h3>Manage Page</h3>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12 ">
                        <div class="x_panel">
                           <div class="x_content">
                              <br />
                                                           @if(count($errors)>0)
                                  <div class="alert alert-secondary" role="alert">
                                    <ul>
@foreach($errors->all() as $error)
<li>{{$error}}</li>
</ul>
@endforeach
</div>
@endif
                              <form class="form-horizontal form-label-left" method="post" action="{{url('admin/page/update/'.$dat[0]->id)}}" enctype="multipart/form-data">
                                 @csrf
                                 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Name</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <input type="text" class="form-control" placeholder="Name" name="name" value="{{$dat[0]->name}}">
                                    </div>
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Slug</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="slug">{{$dat[0]->slug}}</textarea>
                                    </div>
                                 </div>
								 <div class="form-group row ">
                                    <label class="control-label col-md-3 col-sm-3 ">Description</label>
                                    <div class="col-md-9 col-sm-9 ">
                                       <textarea class="form-control"  name="description" >{{$dat[0]->description}}</textarea>
                                    </div>
                                 </div>
                                 
                                 </div>
                                 <div class="ln_solid"></div>
                                 <div class="form-group">
                                    <div class="col-md-9 col-sm-9  offset-md-3">
                                       <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            

@endsection