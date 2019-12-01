<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class landrecordcontroller extends Controller
{
    public function addemployeelandrecord(Request $request)
    {
        $input = $request->all();

        $d1 = $input['nid'];
        $d2 = $input['office'];
        $d3 = $input['designation'];
        $d4 = $input['joining_date'];

        if(Str::lower($d3)=='editior')
        {
          // echo $d2;
           DB::update('update users set admin=8 where nid=?',[$d1]);
           //echo $d1;
        }
        DB::insert('insert into employee values (?,?,?,?)',[$d1,$d2,$d3,$d4]);
        return view('admin.success');
    }

    public function addlandkhatian(Request $request)
    {
          $input = $request->all();
          $d1=$input['khatianno'];
          $d2=$input['district'];
          $d3=$input['thana'];
          $d4=$input['mouza'];
          $d5=$input['jlno'];
          $d6=$input['servey'];
          $d7=$input['type'];
          $d8=$input['area'];
          $d9=$input['infrastructure'];
          $d10=$input['possesion'];
          $d11=$input['daag_no'];
          $d12=$input['chowhuddi_east'];
          $d13=$input['chowhuddi_west'];
          $d14=$input['chowhuddi_north'];
          $d15=$input['chowhuddi_south'];
          $d17=DB::select('select id from district_id where district_name=?',[$d2]);
          $d17=$d17[0]->id;
          $d18=DB::select('select id from thana_id where thana_name=?',[$d3]);
          //$d18=$d3;
          $d18=$d18[0]->id;
          $d16=$d17.$d18.$d4.$d11;
          $am=$d8*20;
          DB::insert('insert into land values (?,?,?,?,?,?,?,?,?,?)',[$d16,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15]);
          DB::insert('insert into khatian values (?,?,?,?,?,?,?)',[$d16,$d1,$d2,$d3,$d4,$d5,$d6]);
          DB::insert('insert into request_tax values (?,?,?,?,?,?,?)',[$d16,$d1,null ,null ,null ,null ,$am]);
           return view('officelandrecord.success');  /// land id ta deed er blade e send for further use
    }



  }
