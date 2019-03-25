<?php

namespace App\Http\Controllers\Admin;

use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.create');
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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,bmp',
        ]);
        
        $image = $request->file('image');
        $slug = str_slug($request->title);
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider','007',true);
            }
            $image->move('uploads/slider',$imageName);
        }else{
            $imageName = 'default.png';
        }
        
        $slider = new Slider();
        
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imageName;
        $slider->save();
        
        return redirect()->route('slider.index')->with('flash_message_success','Slider Added Successfully!!');
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
        $slider = Slider::where('id',$id)->first();
        return view('admin.slider.edit',compact('slider'));
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
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'mimes:jpeg,jpg,png,bmp',
        ]);
    
        $image = $request->file('image');
        $slug = str_slug($request->title);
        $slider = Slider::find($id);
        $old_image = $slider->image;
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/slider'))
            {
                mkdir('uploads/slider','007',true);
            }
            $image->move('uploads/slider',$imageName);
        }else{
            $imageName = $slider->image;
        }
        
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imageName;
        $slider->update();
    
        if ($slider->image !== $old_image){
            $image_path = public_path().'/uploads/slider/'.$old_image;
            unlink($image_path);
        }
    
        return redirect()->route('slider.index')->with('flash_message_success','Slider Updated Successfully!!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        
        $image_path = public_path().'/uploads/slider/'.$slider->image;
        
        if (file_exists($image_path))
        {
    
            unlink($image_path);
        }
    
    
        $slider->delete();
        
        return redirect()->back()->with('flash_message_success','Slider Deleted Successfully!!');
    }
}
