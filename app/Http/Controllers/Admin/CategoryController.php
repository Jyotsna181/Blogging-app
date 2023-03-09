<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryFormRequest;

class categoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();

        $category = new Category;
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->desp = $data['desp'];

        if($request->hasfile('image')){
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_desp = $data['meta_desp'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->save();

        return redirect('admin/category')->with('message','category added');

    }

    public function edit($category_id)
    {
        $category =Category::find($category_id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(CategoryFormRequest $request, $category_id)
    {
        $data =$request->validated();

        $category = Category::find($category_id);
        $category->name = $data['name'];
        $category->slug = $data['slug'];
        $category->desp = $data['desp'];


        if($request->hasfile('image')){

            $destination ='uploads/category/' .$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file =$request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category->image = $filename;
        }

        $category->meta_title = $data['meta_title'];
        $category->meta_desp = $data['meta_desp'];
        $category->meta_keyword = $data['meta_keyword'];
        $category->navbar_status = $request->navbar_status == true ? '1' : '0';
        $category->status = $request->status == true ? '1' : '0';
        $category->created_by = Auth::user()->id;
        $category->update();

        return redirect('admin/category')->with('message','category updated');

    }

    public function delete($category_id)
    {
        $category =Category::find($category_id);
        if($category)
        {
            $destination ='uploads/category/' .$category->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $category->posts()->delete();
            $category->delete();
            
            return redirect('admin/category')->with('message','category deleted with its posts');
        }else{
            return redirect('admin/category')->with('message','No category found');
        
        }
        
     
    }
}
