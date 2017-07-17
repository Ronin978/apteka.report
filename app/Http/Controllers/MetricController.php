<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Preparation;
use App\Caption;
use App\User;

class MetricController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $captions=Caption::all();
        return view('metric.index',['captions'=>$captions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //$prep=Preparation::find($id);
        //$prep->update($request->all());
        //$prep->save();

        $post = $request->all();
        
dd($post);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function editIn($id)
    {
        $reports=Report::where('id_caption', $id)->get();
        $captions=Caption::where('id', $id)->get();
        
        foreach ($reports as $report) 
        {            
            $preps=Preparation::find($report->id_preparat);
            $report['preparat_name']=$preps->title;
            $report['preparat_unit']=$preps->units;
        }

        foreach ($captions as $caption) 
        {
            $captionss['section'] = $caption->section;
            $captionss['mounth'] = $caption->mounth;
            $captionss['year'] = $caption->year;
        }
        
        return view('metric.createIn',['reports'=>$reports, 'section'=>$captionss['section'], 'mounth'=>$captionss['mounth'], 'year'=>$captionss['year']]);
    }

    public function editUp($id)
    {
        $reports=Report::where('id_caption', $id)->get();
        $captions=Caption::where('id', $id)->get();
        
        foreach ($reports as $report) 
        {            
            $preps=Preparation::find($report->id_preparat);
            $report['preparat_name']=$preps->title;
            $report['preparat_unit']=$preps->units;
        }

        foreach ($captions as $caption) 
        {
            $captionss['section'] = $caption->section;
            $captionss['mounth'] = $caption->mounth;
            $captionss['year'] = $caption->year;
        }
        
        return view('metric.createUp',['reports'=>$reports, 'section'=>$captionss['section'], 'mounth'=>$captionss['mounth'], 'year'=>$captionss['year']]);
    }
}
