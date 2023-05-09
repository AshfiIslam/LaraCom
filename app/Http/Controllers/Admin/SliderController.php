<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderFormRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index',compact('sliders'));
       
    }
    public function create()
    {
        return view('admin.slider.create');

    }
    public function store(SliderFormRequest $request)
    {
        // dd($request->all());
     
        $validatedData = $request->validated();

        $slider = new Slider();
        $slider->title= $validatedData['title'];
        $slider->description= $validatedData['description'];
        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;

            $file->move('upload/slider/',$fileName);
            $slider->image= $fileName;
            // $validatedData['image']= 'upload/slider/$fileName ';

        }
        // dd($validatedData['image']);
        $slider->status= $request->status == 'on' ? 1 : 0;
        $slider->save();
        
        return redirect('admin/sliders')->with('message','slider added successfully');
       

    }
    public function edit(int $slider_id)
    {
        $sliders = Slider::findOrFail($slider_id) ;
        return view('admin.slider.edit',compact('sliders'));
    }
    public function update(SliderFormRequest $request, $sliders)
    {
        $sliders=Slider::findOrFail($sliders);
        $validatedData = $request->validated();
        $sliders->title = $validatedData['title'];
        $sliders->description = $validatedData['description'];
        if($request->hasFile('image'))
        {
            $path = 'upload/slider/'.$sliders->image;
            if(File::exists($path))
            {
                File::delete($path);
            }


            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;

            $file->move('upload/slider/',$fileName);
            $sliders->image= $fileName ;

        }
        $sliders->status= $request->status == 'on' ? 1 : 0;
        // $sliders->status = $request->status == true ? '1' : '0';
        $sliders->update();
        return redirect('admin/sliders')->with('message','slider updated successfully');
        
    }
    public function destroy($slider_id)
    {
        $sliders = Slider::findOrFail($slider_id);
        $sliders -> delete();
        return redirect('admin/sliders')->with('message','slider deleted successfully');


    }

}
