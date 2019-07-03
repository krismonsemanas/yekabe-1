<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sliders;
use Storage;

class SlidersController extends Controller
{
    //create interface slider
    public function index()
    {
        $data['slider'] = Sliders::get();;
        return view('beken.sliders.index',$data);
    }
    // form tambah slider
    public function create()
    {
       return view('beken.sliders.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|max:2000|mimes:jpg,png,jpeg'
        ]);
        $numRowSlider = Sliders::get();
        if(count($numRowSlider) <= 10){
            $input = $request->all();
            if($request->hasFile('foto')){
                $photo = $request->file('foto');
                $ext = $photo->getClientOriginalExtension();
                if($request->file('foto')->isValid()){
                    $photo_name = date('YmdHis').".$ext";
                    $upload_path = 'photo/sliders';
                    $request->file('foto')->move($upload_path,$photo_name);
                    $input['foto'] = $photo_name;
                }
            }
            Sliders::create($input);
            return redirect('/manage/slider')->with('new','Slider baru telah ditambahkan');
        }else{
            return redirect('/manage/slider')->with('warning','Maksimal silder sebanyak 10 foto');
        }
    }
    public function edit($id){
        $data['slider'] = Sliders::findOrFail($id);
        return view('beken.sliders.edit',$data);
    }
    public function update(Request $request, $id){
        $request->validate([
            'foto' => 'required|image|max:2000|mimes:jpg,png,jpeg'
        ]);
        //proses update
        $slider = Sliders::findOrFail($id);
        $input = $request->all();
        if($request->hasFile('foto')){
            $exist = Storage::disk('slider')->exists($slider->foto);
            if(isset($slider->foto) && $exist) {
                Storage::disk('slider')->delete($slider->foto);
            }
            $photo = $request->file('foto');
            $ext = $photo->getClientOriginalExtension();
            if($request->file('foto')->isValid()){
                $photo_name = date('YmdHis').".$ext";
                $upload_path = 'photo/sliders';
                $request->file('foto')->move($upload_path,$photo_name);
                $input['foto'] = $photo_name;
            }
        }
        $slider->update($input);
        return redirect('manage/slider')->with('edit','Data Telah Diubah.');
    }
    public function destroy($id)
    {
        $slider = Sliders::findOrFail($id);
        $exist = Storage::disk('slider')->exists($slider->foto);
        if($exist){
            $delete = Storage::disk('slider')->delete($slider->foto);
            if($delete){
                Sliders::where('id',$id)->delete();
                return redirect('manage/slider')->with('delete','Data Telah Dihapus.');
            }
        }
    }
}
