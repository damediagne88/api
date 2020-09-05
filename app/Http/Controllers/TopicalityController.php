<?php

namespace App\Http\Controllers;

use App\Topicality;
use Illuminate\Http\Request;
use App\Http\Resources\Tropicality as ResourcesTropicality;

class TopicalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ResourcesTropicality::collection(topicality::orderByDesc('created_at')->get());
        // return topicality::orderByDesc('created_at')->get();
        //$topicalities = Topicality::all();
        // LA SERIALISATION JSON
        //return $topicalities->toJson(JSON_PRETTY_PRINT);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(topicality::create(request()->all())){
        return response()->json(
            ['success' => 'topicality create this success'],200);
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topicaly  $topicaly
     * @return \Illuminate\Http\Response
     */
    public function show(Topicality $topicality)
    {
        return  new ResourcesTropicality($topicality);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topicaly  $topicaly
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topicality $topicality)
    {
        if($topicality->update(request()->all())){
            return response()->json(
                ['success' => 'topicality update this success'],200);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topicaly  $topicaly
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topicality $topicality)
    {
        if($topicality->delete()){
            return response()->json(
                ['success' => 'topicality delete'],200);
          }
    }
}
