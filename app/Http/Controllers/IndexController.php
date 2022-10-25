<?php

namespace App\Http\Controllers;

use App\Models\Data;
use Illuminate\Http\Request;
use \App\Models\Location;

 
class IndexController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
      $url = 'https://www.bazartem.com.br/api';
     
      $params = json_encode($request->input('params'));
      $data = curl($url, 'POST', $params);
      
      $storageFilter = ['0', '250GB', '500GB', '1TB', '2TB', '3TB', '4TB', '8TB', '12TB', '24TB', '48TB', '72TB'];
      $ramFilter = ['2GB', '4GB', '8GB', '12GB', '16GB', '24GB', '32GB', '48GB', '64GB', '96GB'];
      $locationFilter = Location::all();
      $hddFilter = ['SAS', 'SATA', 'SSD'];
      return view('index')
        ->with('data',json_decode($data))
        ->with('storageFilter',$storageFilter)
        ->with('ramFilter',$ramFilter)
        ->with('hddFilter',$hddFilter)
        ->with('locationFilter',$locationFilter);
    }

    public function updateTable(Request $request){
      $url = 'https://www.bazartem.com.br/api';
      
      $params = json_encode(['storage'=>$request->input('storage'), 'ram'=>$request->input('ram'), 'location' => $request->input('location'), 'hdd' => $request->input('hdd')]);
      $data = curl($url, 'POST', $params);
     
      $view = view('table')->with('data',json_decode($data))->render();
      return response()->json(['view'=>$view],200); 
    }
  
    
   
    
   
    
}
