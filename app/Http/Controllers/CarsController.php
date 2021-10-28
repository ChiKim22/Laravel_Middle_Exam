<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarsController extends Controller
{
    public function index(){
        $cars = Cars::latest()->paginate(7);
        return view('cars.index', ['cars'=>$cars]);
    }

    public function create(){
        return view('cars.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'image'=>'required',
            'brand'=>'required',
            'carname'=>'required',
        ]);

        $brand = $request->brand;
        $carname = $request->carname;
        $bulid = $request->bulid;
        $price = $request->price;
        $type = $request->type;
        $style = $request->style;

        $cars = new Cars();
        $cars->brand = $brand;
        $cars->carname = $carname;
        $cars->bulid = $bulid;
        $cars->price = $price;
        $cars->type = $type;
        $cars->style = $style;

        $image = null;

        if ($request->hasFile('image')) {
            $image =time().'_'.
                         $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs(
                'public/image',
                $image
            );
        }
        $cars->image = $image;


        // dd($cars);
        $cars->save();

        return redirect()->route('cars.index');
    }

    public function show($id) {
        $cars = Cars::find($id);

        return view('cars.show', ['cars'=>$cars]);
    }

    public function edit($id) {
        $cars = Cars::find($id);

        return view('cars.edit', ['cars'=>$cars]);
    }

    public function update(Request $request, $id){

        $this->validate($request, [
            'image'=>'required',
            'brand'=>'required',
            'carname'=>'required',
        ]);
        $cars = Cars::find($id);

        $cars->brand = $request->brand;
        $cars->carname = $request->carname;
        $cars->bulid = $request->bulid;
        $cars->price = $request->price;
        $cars->type = $request->type;
        $cars->style = $request->style;

        if($cars->image){
            Storage::delete('public/image/'.$cars->image);
        }
            $filename = time().'_'.
                $request->file('image')->getClientOriginalName();
            $cars->image = $filename;

            $request->image->storeAs('public/image', $filename);


        // dd($cars);

        $cars->save();

        return redirect()->route('cars.show', ['cars'=>$cars->id]);
    }

    public function destroy($id){
        $cars = Cars::find($id);

        if($cars->image){
            Storage::delete('public/image/'.$cars->image);
        }

        $cars->delete();

        return redirect()->route('cars.index');
    }



}
