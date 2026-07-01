<?php

namespace App\Services\admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryService{


    public function store(CategoryRequest $request){
      return DB::transaction(function () use ($request){
            $image = null;

            if($request->hasFile('image')){
                $image = $request->file('image')->store('categories','public');

            }

            $category = Categories::create([
                'name'=>$request->name,
                'slug'=>$request->slug,
                'image'=>$image,
                'status' => $request->status,
            ]);
            return $category;
      });


    }

}
