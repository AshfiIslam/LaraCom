<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryForRequest;
use Illuminate\Support\Facades\File;
use App\Models\Category;
use Illuminate\Support\Str;


// use lluminate\Database\Eloquent\Collection\link;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function create()
    {
        return view('admin.category.create');
    }
    public function store(CategoryForRequest $request)
    {
        $validatedData = $request->validated();

        $category = new Category;
        $category->name= $validatedData['name'];
        $category->slug= Str::slug( $validatedData['slug']);
        $category->description= $validatedData['description'];

        if($request->hasFile('image'))
        {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;

            $file->move('upload/category/',$fileName);
            $category->image= $fileName ;

        }
      
        $category->meta_title= $validatedData['meta_title'];
        $category->key_word= $validatedData['key_word'];
        $category->meta_description= $validatedData['meta_description'];
        $category->status= $request->status == true ? '1' : '0';
        $category->save();

      return redirect('admin/category')->with('message','Category successfully added');
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }
    public function update(CategoryForRequest $request,$category)
    {
        $category= Category::findOrFail($category);

        $validatedData = $request->validated();

        // $category = new Category;
        $category->name= $validatedData['name'];
        $category->slug= Str::slug( $validatedData['slug']);
        $category->description= $validatedData['description'];

        if($request->hasFile('image'))
        {
            $path = 'upload/category/'.$category->image;
            if(File::exists($path))
            {
                File::delete($path);
            }


            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time().'.'.$ext;

            $file->move('upload/category/',$fileName);
            $category->image= $fileName ;

        }
      
        $category->meta_title= $validatedData['meta_title'];
        $category->key_word= $validatedData['key_word'];
        $category->meta_description= $validatedData['meta_description'];
        $category->status= $request->status == true ? '1' : '0';
        $category->update();

      return redirect('admin/category')->with('message','Category successfully updated');
     

    }
}
