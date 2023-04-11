<?php

namespace App\Http\Controllers;

use App\Image;
use App\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function singleAlbume($id)
    {
        $images=Image::where('album_id',$id)->get();;
        return view('single_album',compact('images'));
    }
 
  
    public function storee(Request $request)
    {

        $image = $request->file('file');
        $avatarName = $image->getClientOriginalName();
        $image->move(public_path('images'),$avatarName);
         
        $album = new Album();
        $album->name = '1';
        $album->save();
         
        $imageUpload = new Image();
        $imageUpload->album_id = $album->id;
        $imageUpload->title = $avatarName;

        $imageUpload->save();
        return response()->json(['success'=>$avatarName]);
    }
    

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        return view('edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        $edit = Image::findOrFail($image->id);
        if($file=$request->file('images'))
         {
            $file_extension = $request -> file('images') -> getClientOriginalExtension();
            $file_name = time().'.'.$file_extension;
            $file_nameone = $file_name;
            $path = 'images/';
            $request-> file('images') ->move($path,$file_name);
            $edit->title  =$file_nameone;
        }else{
            $edit->title  = $edit->title; 
        }
        $edit->save();
        return back()->with("message", 'تم التعديل بنجاح'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        $delete = Image::findOrFail($request->id);
        
        $delete->delete();
        File::delete("/Applications/XAMPP/xamppfiles/htdocs/upload-image/public/images/" . $delete->title);
        return back()->with("message",'تم الحذف بنجاح'); 
    }
}
