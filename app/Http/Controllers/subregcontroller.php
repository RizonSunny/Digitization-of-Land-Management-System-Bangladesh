<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class subregcontroller extends Controller
{
    public function addemployeesubreg(Request $request)
    {
        $input = $request->all();

        $d1 = $input['nid'];
        $d2 = $input['office'];
        $d3 = $input['designation'];
        $d4 = $input['joining_date'];

        if(Str::lower($d3)=='editior')
        {
          // echo $d2;
           DB::update('update users set admin=6 where nid=?',[$d1]);
           //echo $d1;
        }
        DB::insert('insert into employee values (?,?,?,?)',[$d1,$d2,$d3,$d4]);
        return view('admin.success');
    }
    public function checkkhatian(Request $request)
    {
             $input = $request->all();
              $d1=$input['khatian-no'];
              $d2=$input['district'];
              $d3=$input['thana'];
              $d4=$input['mouza'];
              $d11=$input['daag_no'];
              $d17=DB::select('select id from district_id where district_name=?',[$d2]);
              $d17=$d17[0]->id;
              $d18=DB::select('select id from thana_id where thana_name=?',[$d3]);
              //$d18=$d3;
              $d18=$d18[0]->id;
              $d16=$d17.$d18.$d4.$d11;
              $temp=DB::select('select land_id from land where land_id=?',[$d16]);
              $resultd = DB::table('district_id')->get();
              return view('subreg.adddeed',['empsd'=>$resultd],['emps'=>$temp])->with('lid', $d16);

    }
    public function adddeed(Request $request)
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
        $lid=$input['lid'];
        $nid=$input['nid'];
        DB::insert('insert into deed values (?,?,?,?,?,?,?,?,?)',[$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9]);
        DB::insert('insert into land_deed values (?,?,?)',[$lid,$d1,$d2]);
        DB::insert('insert into owner_total_deed values (?,?,?)',[$nid,$d1,$d2]);
        DB::insert('insert into owner_total_land values (?,?,?)',[$nid,$lid,100]);
        return view('subreg.success')->with('lid', $lid);
    }



}
