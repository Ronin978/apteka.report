<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Report;
use App\Preparation;
use App\Caption;
use App\User;
use App\Metric;

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
        $metric=Metric::select('type', 'created_at', 'updated_at')->orderBy('updated_at', 'DESC')->distinct('updated_at')->paginate(10);

        return view('metric.arhiv',['metrics'=>$metric]);
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
        $post = $request->all();
       // dd($post);
            for ($i=0; $i <= (count($post)-3)/3 - 1; $i++) 
            {                
                if ($post["type"]=='input')
                {
                    $metric['in'] = $post["in$i"];
                    $metric['out'] = 0;
                    $metric['res'] = $post["res$i"] + $metric['in'];
                }
                elseif ($post["type"]=='output') 
                {
                    $metric['in']=0;
                    $metric['out'] = $post["out$i"];
                    $metric['res'] = $post["res$i"] - $metric['out'];
                   // dd($metric['res']);
                }
                else 
                {
                    $alert='Невідома операція.';
                }
                
                $metric['id_caption'] = $id;  
                $metric['id_preparat'] = $post["id_preparat$i"];  
                $metric['type'] = $post["type"];  

                Metric::create($metric); 

                //йдемо до табл Report
                $reports=Report::where('id_caption', $id)->where('id_preparat', $metric['id_preparat'])->get(); 
                
                    foreach ($reports as $report) 
                    {
                        $rep['prihod']=$report->prihod + $metric['in'];
                        $rep['vykor']=$report->vykor + $metric['out'];
                        $rep['result']=$metric['res'];

                        $report->update($rep);
                        $report->save();
                    }
                
            }



        $alert=' Додано.';        

        flash($alert);
        
        return back();
        
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
        $caption=Caption::find($id);
        
        foreach ($reports as $report) 
        {            
            $preps=Preparation::find($report->id_preparat);
            $report['preparat_name']=$preps->title;
            $report['preparat_unit']=$preps->units;
            $report['id_prep']=$preps->id;
        }
        
        return view('metric.createIn',['reports'=>$reports, 'caption'=>$caption]);
    }

    public function editUp($id)
    {
        $reports=Report::where('id_caption', $id)->get();
        $caption=Caption::find($id);
        
        foreach ($reports as $report) 
        {            
            $preps=Preparation::find($report->id_preparat);
            $report['preparat_name']=$preps->title;
            $report['preparat_unit']=$preps->units;
            $report['id_prep']=$preps->id;
        }
        
        return view('metric.createUp',['reports'=>$reports, 'caption'=>$caption]);
    }
}
