<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('user_id', auth()->user()->id)->get();
        
        return view('category.index',compact('categories'));
    }
    
    public function create()
    {
    return view('category.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        $data = $this->validate($request, [
            'category_name'=>'required'
        ]);
       
        $category->saveCategory($data);
        return redirect('/categories')->with('success', 'New category has been added! Wait sometime to get resolved');
    }

    public function edit($id)
    {
        $category = Category::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('category.edit', compact('category', 'id'));
    }

    public function update(Request $request, $id)
    {
        $category = new Category();
        $data = $this->validate($request, [
            'category_name'=>'required'
        ]);
        $data['id'] = $id;
        $category->updateCategory($data);

        return redirect('/categories')->with('success', 'Category has been updated!!');
    }
    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->menus()->delete();
        $category->delete();

        return redirect('/categories')->with('success', 'Category has been deleted!!');
    }
}
