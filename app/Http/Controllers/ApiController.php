<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use \App\Models\Location;
use \App\Http\Resources\DataResource;
 
class ApiController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $dataArray = [];
        $query = Data::whereNull('deleted_at');
        if(!empty($request->input('storage'))){
            $query->where('hdd','like','%'.$request->input('storage').'%');
        }
        if(!empty($request->input('ram'))){
            $query->where('ram','like',$request->input('ram').'%');
        }
        if(!empty($request->input('hdd'))){
            $query->where('hdd','like','%'.$request->input('hdd').'%');
        }
        if(!empty($request->input('location'))){
            $query->where('location',$request->input('location'));
        }
        foreach($query->get() as $data){
            $dataArray[] =  new DataResource($data);
        }
        return response()->json($dataArray, 200);
    }
    /**
     * INsert database 
     *
     * @return \Illuminate\Http\Response
     */
    public function insertDB($storage=null,$ram=null,$hd=null,$local=null)
    {
        //insert Locations
        $output = file_get_contents('public/data.json');
        $json = json_decode(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $output),true); // Remove os caracteres não imprimíveis da string
        foreach ($json as $rkey => $resource){
            $locationCount = Location::where('name',$resource['Location'])->count();
            if($locationCount == 0){
                $location = new Location();
                $location->name = $resource['Location'];
                $location->save();
            }

            $data = new Data();
            $data->model = $resource['Model'];
            $data->ram = $resource['RAM'];
            $data->hdd = $resource['HDD'];
            $location = Location::where('name',$resource['Location'])->first();
            $data->location = $location->id;
            $data->price = $resource['Price'];
            $data->save();

        }
        
    }
    public function getById($id){
        $data = Data::find($id);
        return response()->json($data, 200);
    }

    
    
   
    
   
    
}
