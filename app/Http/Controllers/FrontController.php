<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Preparation;
use App\User;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports=Report::all();
        return view('site.index',['reports'=>$reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section=\Auth::user()->section;
        //$reports=Report::withTrashed()->get();
        $pr=Preparation::all();       
        return view('site.create',['preparat'=>$pr, 'section'=>$section]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $request->all();
        $section=\Auth::user()->section;

       // echo (count($post)-3)/8 - 1;
          //     dd($post);
        for ($i=0; $i <= (count($post)-3)/8 - 1; $i++) 
        { 
            $mass["id_preparat"] = $post["id_preparat$i"];  
            $mass["termin"] = $post["termin$i"];  
            $mass["start"] = $post["start$i"];
            $mass["prihod"] = $post["prihod$i"];
            $mass["vykor"] = $post["vykor$i"];
            $mass["result"] = $post["result$i"];
            $mass["mounth"] = $post['mounth'];
            $mass["year"] = $post['year'];
            $mass["section"] = $section;

            
            
            if (empty(Report::where('mounth', $mass['mounth'])->where('year', $mass['year'])->where('section', $section)->where('id_preparat', $mass["id_preparat"])->get()->count()))
            {                
                Report::create($mass); 
                $alert = 'Категория добавлена!';
            }
            else 
            {
               
              $alert = 'NO';
                
                
            } 

            

            
        }
        flash($alert);
        
        $reports = Report::all();
        return view('report.index', ['reports' => $reports]);

        
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
        //
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
}
