<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Results;

class AjaxRESULTSCRUDController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['results'] = Results::orderBy('id','asc')->where('validated', '1')->paginate();
        $data['resultsUnvalidated'] = Results::orderBy('id','asc')->where('validated', '0')->paginate();

        return view('ajax-results-crud',$data);
    }
     

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $results   =   Results::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        // 'comment' => $request->comment, 
                        // 'author' => $request->author,
                        'comment_id' => $request->comment_id,
                        'comment_name' => $request->comment_name,
                        'forename' => $request->forename,
                        'surname' => $request->surname,
                        'email' => $request->email,
                        'validated' => $request->validated,
                        'style' => $request->style
                    ]);
    
        return response()->json(['success' => true]);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   

        $where = array('id' => $request->id);
        $result  = Results::where($where)->first();
 
        return response()->json($result);
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = Results::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
