<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;


class post extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $page='POST LIST';
        $data=DB::table('posts')->orderby('id','desc')->get();
        return view('/admin/post/list',compact('page','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $request->validate([
'title'=>'required',
'short_desc'=>'required',
'long_desc'=>'required',
'image'=>'required',
'post_date'=>'required'
        ],[
'name.required'=>"The name field is required",
'short_desc.required'=>"Please write something in short description",
'long_desc.required'=>"Please write Long description",
'image.required'=>"Please Select the image",

'post_date.required'=>"Please select the post date"
        ]);
$image=$request->file('image');
$ext=$image->extension();
$file=time().'.'.$ext;
$image->storeAs('/public/post',$file);
$data=array(
'title'=>$request->input('title'),
'short_desc'=>$request->input('short_desc'),
'long_desc'=>$request->input('long_desc'),
'image'=>$file,
'post_date'=>$request->input('post_date'),
'status'=>1,
'added_on'=>date('y-m-d h:i:s')

);
DB::table('posts')->insert($data);
 $request->session()->flash('success','Post are Added');
            return redirect('/admin/post/list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dat=DB::table('posts')->where('id',$id)->get();
        return view('admin.post.edit',compact('dat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                        $request->validate([
'title'=>'required',
'short_desc'=>'required',
'long_desc'=>'required',

'post_date'=>'required'
        ],[
'name.required'=>"The name field is required",
'short_desc.required'=>"Please write something in short description",
'long_desc.required'=>"Please write Long description",


'post_date.required'=>"Please select the post date"
        ]);
/*$image=$request->file('image');
$ext=$image->extension();
$file=time().'.'.$ext;
$image->storeAs('/public/post',$file);*/
$data=array(
'title'=>$request->input('title'),
'short_desc'=>$request->input('short_desc'),
'long_desc'=>$request->input('long_desc'),
//'image'=>$file,
'post_date'=>$request->input('post_date'),
'status'=>1,
'added_on'=>date('y-m-d h:i:s')

);
if($request->hasfile('image')){
    $image=$request->file('image');
$ext=$image->extension();
$file=time().'.'.$ext;
$image->storeAs('/public/post',$file);
$data['image']=$file;
}
DB::table('posts')->where('id',$id)->update($data);
 $request->session()->flash('success','Post are updated');
            return redirect('/admin/post/list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
     DB::table('posts')->where('id',$id)->delete(); 
      $request->session()->flash('success','Post are deleted');
            return redirect('/admin/post/list');  
    }
}
