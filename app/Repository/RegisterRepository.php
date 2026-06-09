<?php

namespace App\Repository;

use App\Models\Register;
use App\Models\Registration_Images;
use Illuminate\Support\Facades\Storage;
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
       $id = Register::findOrFail($id);
       $id->delete();
       return $id;
    }

    public function updateData($id,$request){
        $register = Register::findOrFail($id);

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
        ];

        if($request->filled('password')){
            $data['password']=Hash::make($request->password);

        }

        if($request->hasFile('image')){
            if($register->image){
                Storage::disk('public')->delete($register->image);
            }
            $data['image']=$request->file('image')->store('images','public');
        }
         $register->update($data);
        if($request->hasFile('multiimage')){
            foreach($register->images as $image){
                if (Storage::disk('public')->exists($image->image)) {
                Storage::disk('public')->delete($image->image);
            }
                $image->delete();
            }
            foreach($request->file('multiimage') as $image){
                $path = $image->store('multiimages', 'public');
                Registration_Images::create([
                    'register_id'=>$register->id,
                    'image'=>$path,
                ]);
            }
        }
         return true;

    }

    public function editData($id){
        return Register::find($id);
    }
}

?>
