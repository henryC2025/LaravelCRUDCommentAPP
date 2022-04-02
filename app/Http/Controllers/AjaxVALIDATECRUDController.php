<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Results;
use App\Models\Terminology;

class AjaxVALIDATECRUDController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function index()
    {
            $data['results0'] = Results::orderBy('id','asc')->where('validated', '0')->paginate();
            $data['terminology0'] = Terminology::orderBy('id','asc')->where('validated', '0')->paginate();

            $data['results1'] = Results::orderBy('id','asc')->where('validated', '1')->paginate();
            $data['terminology1'] = Terminology::orderBy('id','asc')->where('validated', '1')->paginate();

            return view('ajax-validate-crud',$data);
    }    
   
    public function indexEdit()
    {
            $data['results0'] = Results::orderBy('id','asc')->where('validated', '0')->paginate();
            $data['terminology0'] = Terminology::orderBy('id','asc')->where('validated', '0')->paginate();

            $data['results1'] = Results::orderBy('id','asc')->where('validated', '1')->paginate();
            $data['terminology1'] = Terminology::orderBy('id','asc')->where('validated', '1')->paginate();

            return view('ajax-edit-crud',$data);
    }  
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(str_starts_with($request->comment_id, 'RO')){
            $results   =   Results::updateOrCreate(
                [
                    'id' => $request->id
                ],
                [
                    'comment_id' => $request->comment_id,
                    'comment_name' => $request->comment_name,
                    'forename' => $request->forename,
                    'surname' => $request->surname,
                    'email' => $request->email,
                    'validated' => $request->validated,
                    'style' => $request->style
                ]);
                return response()->json(['success' => true]);
        }else{
            $terminology   =   Terminology::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
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
        if(str_starts_with($request->comment_id, 'RO')){
            $result  = Results::where($where)->first();
            return response()->json($result);
        }
        else{
            $terminology  = Terminology::where($where)->first();
            return response()->json($terminology);
        }
 
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

        if(str_starts_with($request->comment_id, 'RO')){
            $result = Results::where('id',$request->id)->delete();
            
        }else {
            $terminology = Terminology::where('id',$request->id)->delete();
        }
   
        return response()->json(['success' => true]);
    }
}
