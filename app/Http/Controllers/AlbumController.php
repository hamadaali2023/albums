<?php

namespace App\Http\Controllers;
use App\Album;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AlbumController extends Controller
{
    public function index()
    {
        // File::delete("/Applications/XAMPP/xamppfiles/htdocs/upload-image/public/images/168121913965.jpeg");
        // dd('dsddd');
        $albums=Album::all();
        foreach ($albums as $item) {
            $item->images= Image::where('album_id',$item->id)->get();
        }
        return view('all',compact('albums'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $album = new Album();
        $album->name = $request->name;
        $album->save();
        if($filess = $request->file('images'))
        {
            $length_file = count($filess);
            if($length_file > 0)
            {
                for($i=0; $i<$length_file; $i++)
                {
                    $file_extension = $filess[$i] -> getClientOriginalExtension();
                    $file_name = time().rand(1,100).'.'.$file_extension;
                    $filess[$i]->move('images', $file_name);   

                    $imageUpload = new Image();
                    $imageUpload->album_id = $album->id;
                    $imageUpload->title = $file_name;
                    $imageUpload->save();
                }
            }
        }
        return redirect()->route('albums.index')->with("message", 'Added successfully');
    }
    public function destroy(Request $request)
    {

        $delete = Album::findOrFail($request->id);
        if($delete){
            $images= Image::where('album_id',$delete->id)->get();
            foreach ($images as $image){
                File::delete("/Applications/XAMPP/xamppfiles/htdocs/upload-image/public/images/" . $image->title);
                $delete_image = Image::findOrFail($image->id);
                $delete_image->delete();
            }
        }
        $delete->delete();
        return back()->with("message",'تم الحذف بنجاح'); 
    }
}
