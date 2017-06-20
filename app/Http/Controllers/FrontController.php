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

        //foreach ($reports as $report) {
          //  $rs[]=$report->date;
          //  $pr[]=$report->pidrozdil;
       // }
       
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
        $reports=Report::withTrashed()->get();

        $pr=Preparation::all();

       
        return view('site.create',['reports'=>$reports, 'preparat'=>$pr, 'section'=>$section]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($i=0; $i <= (count($_POST)-3)/8 - 1; $i++) 
        { 
            $id_preparat = $_POST["id_preparat$i"];
            
            $start = $_POST["start$i"];
            $prihod = $_POST["prihod$i"];
            $vykor = $_POST["vykor$i"];
            $result = $_POST["result$i"];
            $mounth = $_POST['mounth'];
            $year = $_POST['year'];
        

            Report::create([ "mounth" => $mounth,
                "year" => $year,
                "id_preparat" => $id_preparat,
                
                "start" => $start,
                "prihod" => $prihod,
                "vykor" => $vykor,
                "result" => $result,]);
        }
        return back()->with('message','Категория добавлена');
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
