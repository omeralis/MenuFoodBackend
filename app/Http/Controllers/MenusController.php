<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;

class MenusController extends Controller
{
    //get data Menu
    public function getMenu(){
        $menu =  menu::all();
        return  response()->json($menu, 200);
    }
     //get data Menu
     public function getfirstItem(Request $request){
        $id = $request->id; 
        if ($id == null) {
            $menu =  menu::all()->first();
        }else{
            $menu =  menu::where('id', $id)->get();

        }
        return  response()->json($menu, 200);
    }
    //add data Menu
    public function postMenu(Request $request){
        $data = $request->all();
        $Uploadimage = $request->file('image');
        $imageName =$request->title.rand() . '.' . $Uploadimage->getClientOriginalExtension();
        $path = 'images';
        $Uploadimage->move(public_path($path), $imageName);
        $data['image']=url('/').'/'.$path.'/'.$imageName;
        if ($data) {
            $menu = menu::create($data);
            return response()->json($menu, 200);
        }
        return response()->json(['message'=> 'error'],404);
    }
    
    //edit data Menu
    public function EditMenu(Request $request){
        $id = $request->id;  
        $menu = menu::where('id', $id)->first();
        $data = $request->all();
        $Uploadimage = $request->file('image');
        $imageName =$request->title.rand() . '.' . $Uploadimage->getClientOriginalExtension();
        $path = 'images';
        $Uploadimage->move(public_path($path), $imageName);
        $data['image']=url('/').'/'.$path.'/'.$imageName;
        if (isset($menu)) {
            $menu->update($data);
            return response()->json($menu,200);
        }else {
        return response()->json(['message'=> 'error'],404);            
         }
        
    }
     //edit data Menu
     public function DeleteMenu(Request $request){
        $id = $request->id;  
        $menu = menu::where('id', $id)->first();
        $data = $request->all();
       
        if (isset($menu)) {
            $menu->delete($data);
            return response()->json(['message'=> 'Delete Success'],200);
        }else {
        return response()->json(['message'=> 'error'],404);            
         }
        
    }
}
