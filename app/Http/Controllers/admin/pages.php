<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class pages extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $page='Pages LIST';
        $data=DB::table('pages')->orderby('id','desc')->get();
        return view('/admin/page/list',compact('page','data'));
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
'name'=>'required',
'slug'=>'required|unique:pages',
'description'=>'required'

        ],[
'name.required'=>"The name field is required",
'alug.required'=>"Please write something in slug",
'description.required'=>"Please write Long description",
'slug.unique'=>"your slug data must be unique"
        ]);

$data=array(
'name'=>$request->input('name'),
'slug'=>$request->input('slug'),
'description'=>$request->input('description'),
'status'=>1,
'added_on'=>date('y-m-d h:i:s')
    );
DB::table('pages')->insert($data);
 $request->session()->flash('success','Page are Added');
            return redirect('/admin/page/list');
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
        $dat=DB::table('pages')->where('id',$id)->get();
        return view('admin.page.edit',compact('dat'));
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
'name'=>'required',
'slug'=>'required',
'description'=>'required'


        ],[
'name.required'=>"The name field is required",
'slug.required'=>"Please write something in slug",
'description.required'=>"Please write description"



        ]);
/*$image=$request->file('image');
$ext=$image->extension();
$file=time().'.'.$ext;
$image->storeAs('/public/post',$file);*/
$data=array(
'name'=>$request->input('name'),
'slug'=>$request->input('slug'),
'description'=>$request->input('description'),
'status'=>1,
//'image'=>$file,

'added_on'=>date('y-m-d h:i:s')

);
/*if($request->hasfile('image')){
    $image=$request->file('image');
$ext=$image->extension();
$file=time().'.'.$ext;
$image->storeAs('/public/post',$file);
$data['image']=$file;
}*/
DB::table('pages')->where('id',$id)->update($data);
 $request->session()->flash('success','Pages are updated');
            return redirect('/admin/page/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
         DB::table('pages')->where('id',$id)->delete(); 
      $request->session()->flash('success','Pages are deleted');
            return redirect('/admin/page/list');
    }
}
