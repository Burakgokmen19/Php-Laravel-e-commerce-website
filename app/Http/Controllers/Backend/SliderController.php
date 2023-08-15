<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use ImageResize;
class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $sliders =  Slider::all();
        return view('backend.pages.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.slider.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SliderRequest $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $path = $image->getClientOriginalExtension();
            $fileName = time() . '-' . Str::slug($request->name);

            $uploadFile = 'img/slider/';

            if($path=='pdf'|| $path=='svg'|| $path =='webp' || $path =='jiff'){
               $image->move(public_path($uploadFile),$fileName.'.'.$path);
               $imageurl = $uploadFile.$fileName.'.'.$path;
            }else{
                $image =ImageResize::make($image);
                $image->encode('webp',75)->save($uploadFile.$fileName.'.webp');

                $imageurl = $uploadFile.$fileName.'.webp';
            }

    }
      Slider::create([
        'name' => $request->name,
        'link' => $request->link,
        'content' => $request->content,
        'status' => $request->status,
        'image' =>$imageurl ?? NULL,


      ]);

      return back()->withSuccess('Slider add successfully');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $slider = Slider::findOrFail($id);
    return view('backend.pages.slider.edit', compact('slider'));
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if ($request->hasFile('image')) {
                $image = $request->file('image');
                $path = $image->getClientOriginalExtension();
                $fileName = time() . '-' . Str::slug($request->name);

                $uploadFile = 'img/slider/';

                if($path=='pdf'|| $path=='svg'|| $path =='webp' || $path =='jiff'){
                   $image->move(public_path($uploadFile),$fileName.'.'.$path);
                   $imageurl = $uploadFile.$fileName.'.'.$path;
                }else{
                    $image =ImageResize::make($image);
                    $image->encode('webp',75)->save($uploadFile.$fileName.'.webp');

                    $imageurl = $uploadFile.$fileName.'.webp';
                }

        }
        Slider::where('id', $id)->update([
                'name' => $request->name,
                'link' => $request->link,
                'content' => $request->content,
                'status' => $request->status,
                'image' => $imageurl ?? NULL,
            ]);
            return back()->withSuccess('Slider updated successfully');
    }

// $fileName = null; // Varsayılan olarak dosya adını null olarak tanımla
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $fileName = time() . '-' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
        //     $uploadFile = 'img/slider';

        //     $allowedExtensions = ['pdf', 'svg', 'webp'];

        //     if (in_array($image->getClientOriginalExtension(), $allowedExtensions)) {
        //         $image->move(public_path($uploadFile), $fileName);
        //     } else {
        //         $image = ImageResize::make($image);
        //         $image->encode('webp', 75)->save($uploadFile . '/' . $fileName);
        //     }
        // }

        // Slider::where('id', $id)->update([
        //     'name' => $request->name,
        //     'link' => $request->link,
        //     'content' => $request->content,
        //     'status' => $request->status,
        //     'image' => $fileName,
        // ]);

        // return back()->withSuccess('Slider updated successfully');
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
     $slider = Slider::where('id',$id)->firstOrFail();

     if(file_exists($slider->image)){}
      if(!empty($slider->image)){
        unlink($slider->image);
      }

      $slider->delete();
      return back()->withSuccess('Slider deleted succesfully');
    }

public function status(Request $request){
 $update = $request->statu;
 $updatecheck = $update === "false" ? '0': '1';
 Slider::where('id',$request->id)->update(['status'=>$updatecheck]);
 return response(['error'=>false,'status'=>$update]);
}

}
