<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preparation;


class PrepController extends Controller
{
    public function index()
    {
    	$prep=Preparation::orderBy('created_at', 'DESC')->paginate(10);
    	return view('preparat.index',['prep'=>$prep]);
    }

     public function create()
    {
        return view('preparat.create');
    }

    public function store(Request $request)
    {
        Preparation::create($request->all());
        flash('Дані внесені.');
        return back();
    }

    public function edit($id)
    {
        $prep=Preparation::find($id);
        return view('preparat.edit',['prep'=>$prep]);
    }

    public function update(Request $request, $id)
    {
        $prep=Preparation::find($id);
        $prep->update($request->all());
        $prep->save();

        flash('Дані змінені.');
        return back();
        
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        $prep=Preparation::find($id);
        $prep->delete();
        return back()->with('message','Категория deleted');
    }

   
}
