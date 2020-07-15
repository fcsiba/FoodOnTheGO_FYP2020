<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Category;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('user_id', auth()->user()->id)->get();
        $categories = Category::where('user_id', auth()->user()->id)->get();
        return view('index',compact('menus', 'categories'));
    }
    public function create($category_id)
    {
        $category = Category::where('user_id', auth()->user()->id)
        ->where('id', $category_id)
        ->first();
    return view('create', compact('category', 'category_id'));
    }
    public function store(Request $request, $category_id)
    {
        $menu = new Menu();
        $data = $this->validate($request, [
            
            'name'=>'required',
            'price'=>'required'
        ]);
        
        $menu->saveMenu($data, $category_id);
       // $menu->categories()->sync($data->category_id, false);
        return redirect('/menus')->with('success', 'New Menu has been added! Wait sometime to get resolved');
    }

    public function edit($id)
    {
        $menu = Menu::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();

        return view('edit', compact('menu', 'id'));
    }

    public function update(Request $request, $id)
    {
        $menu = new Menu();
        $data = $this->validate($request, [
            'name'=>'required',
            'price'=>'required'
        ]);
        $data['id'] = $id;
        $menu->updateMenu($data);

        return redirect('/menus')->with('success', 'New menu has been updated!!');
    }
    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect('/menus')->with('success', 'Menu has been deleted!!');
    }
}
