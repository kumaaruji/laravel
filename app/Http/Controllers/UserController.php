<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
      return view('list');   
    }

    public function getData(Request $request) {

      $draw     = $request->get('draw');
      $start     = $request->get('start');
      $rowperpage     = $request->get('length');

      $orderArray    = $request->get('order');
      $columnNameArray   = $request->get('columns');

      $searchArray    = $request->get('search');
      $columnIndex     = $orderArray[0]('column');

      $columnName      = $columnNameArray[$columnIndex]['data'];


      $columnsortorder    = $orderArray[0]['dir'];
      $searchValue    = $searchArray['value'];


      $users =/DB::table('users');
      $total = $users->count():

      $totalfilter=$total;

      $totalfilter =/DB::table('users');
      if (!empty($searchValue)){
        $totalFilter =$totalFilter->where('name','like','%',$searchvalue,'%');
        $totalFilter =$totalFilter->orwhere('email','like','%',$searchvalue,'%');
      }
      $totalFilter = $users->count():

      $arrData =/DB::table('users');
      $arrData =$arrData->skip($start)->take($rowperpage);
      $arrData->orderby($columnName,$columnSortOrder);

      if (!empty($searchValue)){
        $arrData =$arrData->where('name','like','%',$searchvalue,'%');
        $arrData =$arrData->orwhere('name','like','%',$searchvalue,'%');
      }
      $arrData =$arrData->get();


      $response =array(
        "draw"-> intval($draw),
        "recordsTotal"-> $total,
        "recordsfiltered"-> $totalFilter,
        "data"-> $arrdata,
      );
      return responsive()->json($response)

    }
}
