<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File;

// use Illuminate\Support\Facades\File;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $category_id;
    // public $category;

    public function deleteCategory($category_id)
    {
        // dd($category_id);
        $this->category_id = $category_id;
        // self::$category= Category::find($category_id);
       
        // if(file_exists(self::$category->image))
        // {
        //     unlink(self::$category->image);
        // }
        // self::$category->delete();
        

    }
    public function destroyCategory()
    {
             
        $category = Category::find($this->category_id);
       
        $path = 'upload/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category->delete();
        // session()->flash('message','Category Deleted');
        // $this->dispatchBrowserEvent('colse-modal');
       
           
            return redirect('admin/category')->with('message',"Course Info Delete Successfully");
        
    }

    public function render()
    {
        $categories = Category::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.category.index',['categories' =>$categories]);
    }
}
