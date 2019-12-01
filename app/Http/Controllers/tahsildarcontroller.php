<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class tahsildarcontroller extends Controller
{



    public function addemployeetahsildar(Request $request)
    {
        $input = $request->all();

        $d1 = $input['nid'];
        $d2 = $input['office'];
        $d3 = $input['designation'];
        $d4 = $input['joining_date'];

        if(Str::lower($d3)=='editior')
        {
          // echo $d2;
           DB::update('update users set admin=9 where nid=?',[$d1]);
           //echo $d1;
        }
        DB::insert('insert into employee values (?,?,?,?)',[$d1,$d2,$d3,$d4]);
        return view('admin.success');
    }
    public function checktax(Request $request)
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
              $temp=DB::select('select land_id,khatian_no from request_tax where land_id=? and khatian_no=?',[$d16,$d1]);
              $resultd = DB::table('district_id')->get();
              return view('officetahsildar.addtax',['empsd'=>$resultd],['emps'=>$temp])->with('lid', $d16)->with('kno',$d1);
    }
    public function addtax(Request $request)
    {
        $input = $request->all();
        $d1=$input['jud_id'];
        $d2=$input['dakhila_form_no'];
        $d3=$input['duration_of_tax_validation'];
        $d4=$input['status'];
        $lid=$input['lid'];
        $kno=$input['kno'];
        $temp=DB::select('select amount from request_tax where land_id=? and khatian_no=?',[$lid,$kno]);
        $am=$temp[0]->amount;
        DB::insert('insert into tax values (?,?,?,?,?,?,?)',[$lid,$kno,$d1,$d2,$d3,$d4,$am]);
        DB::delete('delete from request_tax where land_id=? and khatian_no=?',[$lid,$kno]);
      //  DB::insert('insert into owner_total_deed values (?,?,?)',[$nid,$d1,$d2]);
        return view('officetahsildar.success')->with('lid', $lid);
    }
    public function statustax(Request $request)
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
              $temp=DB::select('select * from tax where land_id=? and khatian_no=?',[$d16,$d1]);
              $resultd = DB::table('district_id')->get();
              return view('officetahsildar.statustax',['empsd'=>$resultd],['emps'=>$temp])->with('lid', $d16)->with('kno',$d1);
    }

    public function checktax2(Request $request)
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
              $temp=DB::select('select land_id,khatian_no from tax where land_id=? and khatian_no=?',[$d16,$d1]);
              $resultd = DB::table('district_id')->get();
              return view('officetahsildar.changestatustax',['empsd'=>$resultd],['emps'=>$temp])->with('lid', $d16)->with('kno',$d1);
    }

    public function changestatustax(Request $request)
    {
            $input = $request->all();

            $d4=$input['status'];
            $lid=$input['lid'];
            $kno=$input['kno'];
            DB::update('update tax set status=? where land_id=? and khatian_no=?',[$d4,$lid,$kno]);

            return view('officetahsildar.success')->with('lid', $lid);
    }

}
