<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class aclandcontroller extends Controller
{


    public function addemployeeacland(Request $request)
    {
        $input = $request->all();

        $d1 = $input['nid'];
        $d2 = $input['office'];
        $d3 = $input['designation'];
        $d4 = $input['joining_date'];

        if(Str::lower($d3)=='editior')
        {
          // echo $d2;
           DB::update('update users set admin=7 where nid=?',[$d1]);
           //echo $d1;
        }
        DB::insert('insert into employee values (?,?,?,?)',[$d1,$d2,$d3,$d4]);
        return view('admin.success');
    }

    public function landtransfer(Request $request)
    {
          $input = $request->all();
          $d1=$input['deed_no'];
          $d2=$input['serial_no'];
          $d3=$input['witness'];
          $d4=$input['ward'];
          $d5=$input['deed_type'];
          $d6=$input['land_price'];
          $d7=$input['grantor'];
          $d8=$input['recipient'];
          $d9=$input['issue_date'];

          $nid=$input['buyer'];
          $d=$input['d'];
          $s=$input['s'];
          $res=DB::select('select * from land_deed where deed_no=? and serial_no=?',[$d,$s]);
          $lid=$res[0]->land_id;
          DB::insert('insert into deed values (?,?,?,?,?,?,?,?,?)',[$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9]);
          $res=DB::select('select * from deed where deed_no=? and serial_no=?',[$d,$s]);
          //$lid=$res[0]->land_id;
          DB::insert('insert into land_deed_ex values (?,?,?)',[$lid,$res[0]->deed_no,$res[0]->serial_no]);
          DB::insert('insert into deed_ex values (?,?,?,?,?,?,?,?,?)',[$res[0]->deed_no,$res[0]->serial_no,$res[0]->witness,
                            $res[0]->ward,$res[0]->deed_type,$res[0]->land_price,$res[0]->grantor,$res[0]->recipient,$res[0]->issue_date]);
          DB::delete('delete deed where deed_no=? and serial_no=?',[$d,$s]);


          DB::insert('insert into land_deed values (?,?,?)',[$lid,$d1,$d2]);
          DB::insert('insert into owner_total_deed values (?,?,?)',[$nid,$d1,$d2]);

          DB::delete('delete owner_total_land where land_id=?',[$lid]);
          DB::insert('insert into owner_total_land values (?,?,?)',[$nid,$lid,100]);
          return view('officeacland.success')->with('lid', $lid);
    }


  }
