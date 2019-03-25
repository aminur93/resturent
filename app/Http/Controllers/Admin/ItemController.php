<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Image;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::with('category')->latest()->get();
        return view('admin.item.index',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.item.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,bmp,gif'
        ]);
    
        if($request->hasFile('image')){
        
            $image_tmp = Input::file('image');
            if($image_tmp->isValid()){
                $extenson = $image_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extenson;
                $large_image_path = 'uploads/item/'.$filename;
            
                //Resize Image
                Image::make($image_tmp)->resize(369,300)->save($large_image_path);
                
            }
        }else{
            $filename = 'default.png';
        }
        
        $item = new Item();
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $filename;
        $item->save();
        return redirect()->route('item.index')->with('flash_message_success','Item added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Item::findOrFail($id);
        $categories = Category::all();
        return view('admin.item.edit',compact('items','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,bmp,gif'
        ]);
        
        $item = Item::find($id);
        $old_image = $item->image;
        
        if($request->hasFile('image')){
        
            $image_tmp = Input::file('image');
            if($image_tmp->isValid()){
                $extenson = $image_tmp->getClientOriginalExtension();
                $filename = rand(111,99999).'.'.$extenson;
                $large_image_path = 'uploads/item/'.$filename;
            
                //Resize Image
                Image::make($image_tmp)->resize(369,300)->save($large_image_path);
            
            }
        }else{
            $filename = $old_image;
        }
        
        $item->category_id = $request->category_id;
        $item->name = $request->name;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->image = $filename;
        $item->update();
        
        if ($item->image !== $old_image)
        {
            $image_path = public_path().'/uploads/item/'.$old_image;
            unlink($image_path);
        }
        return redirect()->route('item.index')->with('flash_message_success','Item Update successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        
        $image_path = public_path().'/uploads/item/'.$item->image;
        
        if (file_exists($image_path)){
    
            unlink($image_path);
        }
        
        $item->delete();
        
        return redirect()->back()->with('flash_message_success','Your Item Deleted Successfully!!');
    }
}
