<?php

namespace App\Repository;

use App\Models\Register;
use App\Models\Registration_Images;
use Illuminate\Support\Facades\Hash;

class RegisterRepository{

    public function showData(){
        return Register::all();
    }

    public function create($request){
        $register = Register::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make($request->password),
            'image'=>$request->file('image')->store('images','public'),
        ]);

        if($request->hasFile('multiimage')){
            foreach($request->file('multiimage') as $image){
                Registration_Images::create([
                    'register_id'=>$register->id,
                    'image'=>$image->store('multiimages', 'public'),
                ]);
            }
        }
        return $register;
    }

    public function deleteData($id){
       $id = Register::find($id);
       $id->delete();
       return $id;
    }
}

?>