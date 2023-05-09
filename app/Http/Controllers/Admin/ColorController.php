<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;

class ColorController extends Controller
{
   
    public function index()
    {
        $colors=Color::all();
        return view('admin.colors.index',compact('colors'));
    }
    public function create()
    {
        return view('admin.colors.create');
    }
    public function store(ColorFormRequest $request)
    {
        $validatedData = $request->validated();
        Color::create($validatedData);
        return redirect('admin/colors')->with('message','color added successfully');
    }
    public function edit(int $color_id)
    {
        $color = Color::findOrFail($color_id);
        return view('admin.colors.edit',compact('color'));

    }
    public function update(ColorFormRequest $request,$color)
    {
        $color = Color::findOrFail($color);
        $validatedData = $request->validated();
        $color->name = $validatedData['name'];
        $color->code = $validatedData['code'];
        $color->status = $request->status == true ? '1' : '0';
        $color->update();
        return redirect('admin/colors')->with('message','color updated successfully');
        

    }
    
    public function destroy($color_id){
        $color = Color::findOrFail($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message','color deleted');
    }

}
