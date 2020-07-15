<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id',
        'name',
        'price'
    ];
    public function categories()
    {
        
        return $this->belongsToMany('App\Category');
    }
    public function saveMenu($data, $category_id)
{
        $this->user_id = auth()->user()->id;
        $this->category_id = $category_id;
        $this->name = $data['name'];
        $this->price = $data['price'];
        $this->save();
        //$this->categories()->sync($data->cat_id);
        return 1;
}
    public function updateMenu($data)
    {
            $menu = $this->find($data['id']);
            $menu->user_id = auth()->user()->id;
            $menu->name = $data['name'];
            $menu->price = $data['price'];
            $menu->save();
            return 1;
    }
}
