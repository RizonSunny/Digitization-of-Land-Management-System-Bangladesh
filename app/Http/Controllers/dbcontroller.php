<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
Auth::routes();
use DB;

class dbcontroller extends Controller
{
      public function uhome()
      {
          return view('basic');
      }


        public function khatianland(Request $request)
        {
            $input = $request->all();
            $d1=$input['khatian-no'];
            $d2=$input['district'];
            $d3=$input['thana'];
            $d4=$input['mouza'];
            $result = DB::table('khatian')
                    ->where('khatian_no','=', $d1)
                    ->Where('district','=', $d2)
                    ->Where('thana','=', $d3)
                    ->Where('mouza','=', $d4)
                ->join('land', 'land.land_id', '=', 'khatian.land_id')
                ->get();
              //echo  $result;
            return view('user.khatian-land',['emps'=>$result]);
          }
          public function khatiankhatian(Request $request)
          {
              $input = $request->all();
              $d1=$input['khatian-no'];
              $d2=$input['district'];
              $d3=$input['thana'];
              $d4=$input['mouza'];
              $result = DB::table('khatian')
                      ->where('khatian_no','=', $d1)
                      ->Where('district','=', $d2)
                      ->Where('thana','=', $d3)
                      ->Where('mouza','=', $d4)
                  ->get();

              return view('user.khatian-khatian',['emps'=>$result]);
            }
            public function khatianowner(Request $request)
            {
                $input = $request->all();
                $d1=$input['khatian-no'];
                $d2=$input['district'];
                $d3=$input['thana'];
                $d4=$input['mouza'];
                $result = DB::table('khatian')
                        ->where('khatian_no','=', $d1)
                        ->Where('district','=', $d2)
                        ->Where('thana','=', $d3)
                        ->Where('mouza','=', $d4)
                    ->join('owner_total_land', 'owner_total_land.land_id', '=', 'khatian.land_id')
                    ->join('person','person.NID','=','owner_total_land.NID')
                    ->get();
                return view('user.khatian-owner',['emps'=>$result]);
              }
              public function khatiandeed(Request $request)
              {
                  $input = $request->all();
                  $d1=$input['khatian-no'];
                  $d2=$input['district'];
                  $d3=$input['thana'];
                  $d4=$input['mouza'];
                  $result = DB::table('khatian')
                          ->where('khatian_no','=', $d1)
                          ->Where('district','=', $d2)
                          ->Where('thana','=', $d3)
                          ->Where('mouza','=', $d4)
                      ->join('land_deed', 'land_deed.land_id', '=', 'khatian.land_id')
                      ->join('deed', function($join){
                                $join->on('land_deed.deed_no', '=', 'deed.deed_no')
                                     ->on('land_deed.serial_no', '=', 'deed.serial_no');
                            })
                      ->get();
                  //  echo $result;
                    //  exit();
                  return view('user.khatian-deed',['emps'=>$result]);
                }
                public function khatiancase(Request $request)
                {
                    $input = $request->all();
                    $d1=$input['khatian-no'];
                    $d2=$input['district'];
                    $d3=$input['thana'];
                    $d4=$input['mouza'];

                    $result = DB::table('khatian')
                            ->where('khatian_no','=', $d1)
                            ->Where('district','=', $d2)
                            ->Where('thana','=', $d3)
                            ->Where('mouza','=', $d4)
                        ->join('case_of_land', 'case_of_land.land_id', '=', 'khatian.land_id')
                        ->join('land_case', function($join){
                                  $join->on('land_case.case_no', '=', 'case_of_land.case_no')
                                       ->on('land_case.court_name', '=', 'case_of_land.court_name');
                              })
                        ->get();
                    return view('user.khatian-case',['emps'=>$result]);
                  }


///user NID


          public function nidland(Request $request)
          {
              $input = $request->all();
            //  $d1=$input['nid'];

              $result = DB::select('select type,area,infrastructure,possesion,daag_no,
              chowhuddi_east,chowhuddi_west,chowhuddi_north,chowhuddi_south,percentage_of_land
              from land join owner_total_land using(land_id) where nid=?',[Auth::user()->nid]);


                  //echo $result;
              return view('user.nid-land',['emps'=>$result]);
            }

            public function totalland(Request $request)
            {
                $input = $request->all();
              //  $d1=$input['nid'];

                $result = DB::select('select sum(area) as ar from land join owner_total_land using(land_id)
                                    group by(nid)
                                    having nid=?',[Auth::user()->nid]);


                    //echo $result;
                return view('user.nid-total',['emps'=>$result]);
              }
            public function niddeed(Request $request)
            {
                $input = $request->all();
              //  $d1=$input['nid'];

                $result = DB::select('select * from deed join owner_total_deed using(deed_no,serial_no) where nid=?',[Auth::user()->nid]);

                  return view('user.nid-deed',['emps'=>$result]);
              }

              public function nidtotal(Request $request)
              {
                  $input = $request->all();
                  $d1=$input['nid'];


                  $result = DB::insert('select nid,name,count(land_id) as s from owner_total_land
                                        join person using(nid) group by nid,name
                                        having nid=?',[$d1]);
                  $d17=$result[0]->nid;
                    return view('user.nid-total')->with('total', $d17);
                }

/// office
      public function officeACland(Request $request)
      {
                $input = $request->all();

                $result= DB::select ('select branch_name,address, contact_no from
                owner_total_land join khatian using(land_id)
                join khatian_collection using(LAND_ID,KHATIAN_NO)
                join ac_land_office using(IN_NO,BRANCH_NAME)
                where nid=?',
                [Auth::user()->nid]);

            return view('user.office-ACland',['emps'=>$result]);
        }
        public function officetahsildar(Request $request)
        {
                  $input = $request->all();

                  $result= DB::select ('select branch_name,address, contact_no from
                  owner_total_land join khatian using(land_id)
                  join tax using(land_id,khatian_no)
                  join tax_status using(LAND_ID,KHATIAN_NO,JUD_ID)
                  join tahsil_office using (IN_NO,BRANCH_NAME)
                  where nid=?',
                  [Auth::user()->nid]);

              return view('user.office-tahsildar',['emps'=>$result]);
          }

          public function officesubregistry(Request $request)
          {
                    $input = $request->all();

                    $result= DB::select ('select branch_name, address, contact_no from
                      subregistry_office join deed_registry using (in_no,branch_name)
                      join deed using(deed_no,serial_no) join owner_total_deed using(deed_no,serial_no)
                      where nid=?',
                      [Auth::user()->nid]);

                return view('user.office-subregistry',['emps'=>$result]);
            }

            public function updatepersonuser(Request $request)
            {
                $input = $request->all();
                $d1 = $input['nid'];
                $d2 = $input['name'];
                $d14 = $input['email'];
                $d3 = $input['father_name'];
                $d4 = $input['mother_name'];
                $d5 = $input['spouse_name'];
                $d6 = $input['present_address'];
                $d7 = $input['permanent_address'];
                $d8 = $input['birthdate'];

                $d10 = $input['gender'];
                $d11 = $input['religion'];
                $d12 = $input['occupation'];
                $d13 = $input['contact_no'];
                DB::insert('insert into person values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,null,$d10,$d11,$d12,$d13,$d14]);
                return view('userhome');
            }

}
