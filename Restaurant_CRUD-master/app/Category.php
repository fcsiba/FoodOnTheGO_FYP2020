<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['user_id', 'category_name'];
    public function menus()
    {
        return $this->hasMany('App\Menu');
    }
    public function saveCategory($data)
    {
        $this->user_id = auth()->user()->id;
        $this->category_name = $data['category_name'];
        $this->save();
        return 1;
    }
    public function updateCategory($data)
    {
        $category = $this->find($data['id']);
        $category->user_id = auth()->user()->id;
        $category->category_name = $data['category_name'];
        $category->save();
        return 1;
    }
}
