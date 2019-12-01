<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
class admincontroller extends Controller
{

    public function select(Request $request)
    {
      $result = $request->input('sl');
      return view('check',['emps'=>$result]);
    }
/// show functions start
    public function landadmin()
    {
        $result = DB::table('land')->get();
        return view('admin.showland',['emps'=>$result]);

    }

    public function khatianadmin()
    {
      $result = DB::table('khatian')->get();
      return view('admin.showkhatian',['emps'=>$result]);
    }


    public function usersadmin()
    {
      $result = DB::table('users')->get();
      return view('admin.showusers',['emps'=>$result]);
    }
//// show functions end

/// insert land start
    public function insertlandkhatianlandadmin(Request $request)
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
        DB::insert('insert into land values (?,?,?,?,?,?,?,?,?,?)',[$d16,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15]);
        DB::insert('insert into khatian values (?,?,?,?,?,?,?)',[$d16,$d1,$d2,$d3,$d4,$d5,$d6]);
         return view('subreg.landsuccess');  /// land id ta deed er blade e send for further use
    }

    public function insertlanddeedadmin(Request $request)
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
        DB::insert('insert into deed values (?,?,?,?,?,?,?,?,?)',[$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9]);
        DB::insert('insert into land_deed values (?,?,?)',[$lid,$d1,$d2]);
        return view('admin.insertlandtaxadmin')->with('lid', $lid);
    }

    public function insertlandtaxadmin(Request $request)
    {
        $input = $request->all();
        $d1=$input['khatian_no'];
        $d2=$input['jud_id'];
        $d3=$input['dakhila_form_no'];
        $d4=$input['duration_of_tax_validation'];
        $d5=$input['status'];
        $d6=$input['amount'];

        $lid=$input['lid'];

        DB::insert('insert into tax values (?,?,?,?,?,?,?)',[$lid,$d1,$d2,$d3,$d4,$d5,$d6]);
        return view('admin.insertlandowneradmin')->with('lid', $lid);
    }
/// for fetching land id from tax blade to owner and owner to particular owner blade
    public function temp1(Request $request)
    {
        $input = $request->all();
        $lid=$input['lid'];
        return view('admin.insertlandownerpublicadmin')->with('lid', $lid);
    }
    public function temp2(Request $request)
    {
        $input = $request->all();
        $lid=$input['lid'];
        return view('admin.insertlandownerprivateadmin')->with('lid', $lid);
    }
    public function temp3(Request $request)
    {
        $input = $request->all();
        $lid=$input['lid'];
        return view('admin.insertlandownerpersonadmin')->with('lid', $lid);
    }

    /// insert data of owner
    public function temp11(Request $request)
    {
          $input = $request->all();
          $d1=$input['org_name'];
          $d2=$input['in_no'];

          $lid=$input['lid'];
          DB::insert('insert into public_organizations_land values (?,?,?)',[$lid,$d1,$d2]);

          return view('check');
    }
    public function temp21(Request $request)
    {
          $input = $request->all();
          $d1=$input['org_name'];
          $d2=$input['in_no'];

          $lid=$input['lid'];
          DB::insert('insert into private_organizations_land values (?,?,?)',[$lid,$d1,$d2]);
          return view('check');
    }
    public function temp31(Request $request)
    {
          $input = $request->all();
          $d1=$input['nid'];
          $d1=$input['percentage_of_land'];
          $lid=$input['lid'];
          DB::insert('insert into owner_total_land values (?,?,?)',[$lid,$d1,$d2]);
          return view('check');
    }
/// insert land end

/// insert person
    public function insertpersonadmin(Request $request)
    {
        $input = $request->all();
        $d1 = $input['nid'];
        $d2 = $input['name'];
        $d3 = $input['father_name'];
        $d4 = $input['mother_name'];
        $d5 = $input['spouse_name'];
        $d6 = $input['present_address'];
        $d7 = $input['permanent_address'];
        $d8 = $input['birthdate'];
        $d9 = $input['date_of_death'];
        $d10 = $input['gender'];
        $d11 = $input['religion'];
        $d12 = $input['occupation'];
        $d13 = $input['contact_no'];
        $d14 = $input['email'];
        DB::insert('insert into person values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14]);
        return view('admin.success');
    }


    public function insertpublicorgadmin(Request $request)
    {
        $input = $request->all();
        $d1 = $input['org'];
        $d2 = $input['inno'];
        $d3 = $input['address'];
        $d4 = $input['branch_name'];
        $d5 = $input['establish_date'];
        $d6 = $input['contact_no'];
        $d7 = $input['chairman'];
        $d8 = $input['manager'];
        DB::insert('insert into public_organization values (?,?,?,?,?,?,?,?)',[$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8]);
        return view('admin.success');
    }
    public function insertprivateorgadmin(Request $request)
    {
      $input = $request->all();
      $d1 = $input['org'];
      $d2 = $input['inno'];
      $d3 = $input['address'];
      $d4 = $input['branch_name'];
      $d5 = $input['establish_date'];
      $d6 = $input['contact_no'];
      $d7 = $input['chairman'];
      $d8 = $input['manager'];
      DB::insert('insert into private_organization values (?,?,?,?,?,?,?,?)',[$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8]);
      return view('admin.success');
    }
    public function landtransferadmin(Request $request)
    {
        $input = $request->all();
        $db = $input['buynid'];
        $ds = $input['sellnid'];
        $d2=$input['district'];
        $d3=$input['thana'];
        $d4=$input['mouza'];
        $d11=$input['daag_no'];
        $d17=DB::select('select id from district_id where district_name=?',[$d2]);
        $d17=$d17[0]->id;
        $d18=DB::select('select id from thana_id where thana_name=?',[$d3]);
        $d18=$d18[0]->id;
        $d16=$d17.$d18.$d4.$d11;
        /// query update
        DB::update('update owner_total_land set nid=? where nid=? and land_id=?',[$db,$ds,$d16]);
        DB::insert('insert into land values (?,?,?,?,?,?,?,?,?,?)',[$d16,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d15]);
        DB::insert('insert into khatian values (?,?,?,?,?,?,?)',[$d16,$d1,$d2,$d3,$d4,$d5,$d6]);
         return view('admin.success');

    }


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


    public function updatepersonadmin(Request $request)
    {
        $input = $request->all();
        $d1 = $input['nid'];
        $d2 = $input['name'];
        $d3 = $input['father_name'];
        $d4 = $input['mother_name'];
        $d5 = $input['spouse_name'];
        $d6 = $input['present_address'];
        $d7 = $input['permanent_address'];
        $d8 = $input['birthdate'];
        $d9 = $input['date_of_death'];
        $d10 = $input['gender'];
        $d11 = $input['religion'];
        $d12 = $input['occupation'];
        $d13 = $input['contact_no'];
        $d14 = $input['email'];

        DB::update('update person
                    set name = ?,
                    father_name = ?,
                    mother_name = ?,
                    spouse_name = ?,
                    present_address = ?,
                    permanent_address = ?,
                    birthdate = ?,
                    date_of_death = ?,
                    gender = ?,
                    religion = ?,
                    occupation = ?,
                    contact_no = ?,
                    email = ?
                    WHERE nid=?',[$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10,$d11,$d12,$d13,$d14,$d1]);
        return view('admin.success');
    }


  }
