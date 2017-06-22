<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Preparation;
use App\Caption;
use App\User;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $captions=Caption::all();
       
            return view('report.index',['captions'=>$captions]);
              
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $section=\Auth::user()->section;
        //dd($section);
        $preps=Preparation::all();       
        return view('report.create',['preps'=>$preps, 'section'=>$section]);
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

        $caption['section'] = $post['section'];
        $caption['mounth'] = $post['mounth'];
        $caption['year'] = $post['year'];


       // for ($i=0; $i <= (count($post)-3)/9 - 1; $i++) 
        
            $report['id_preparat'] = $post["id_preparat$i"];  
             
            $report['termin'] = $post["termin$i"];  
            $report['all'] = $post["all$i"];
            $report['prihod'] = $post["prihod$i"];
            $report['vykor'] = $post["vykor$i"];
            $report['result'] = $post["result$i"];
            
            $prep['title'] = $post["title$i"];
            $prep['units'] = $post["units$i"];
                       
           
                Caption::create($caption);
                 
                Report::create($report);
                
                Preparation::create($prep);
        }

        

        flash($alert);
        
       // $captions=Caption::all();

       $section=$caption['section'];
        //dd($section);
        $preps=Preparation::all();       
        return view('report.create',['preps'=>$preps, 'section'=>$section]);

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
