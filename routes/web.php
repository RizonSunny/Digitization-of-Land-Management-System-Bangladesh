<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
if(Auth::user()->admin == 0)
{
  header("location: index.php");
  die();
}
*/
use Illuminate\Http\Request;
Auth::routes();

Route::get('/check', function()
{
  return view('check')->with('name',Auth::user()->name);

})->middleware('auth');


// Route::get('/check2', function()
// {
//   $result = DB::table('district_id')->get();
//   return view('check2',['emps'=>$result]);
// });
// Route::get('/', function()
// {
//   return view('welcome');
// });
Route::get('/home', function()
{
  return view('userhome');
});


Route::group(['middleware' => ['web','auth']], function (){
Route::get('/',function()
{
      if(Auth::user()->admin == 0)
      {
          $nid=DB::select('select nid from person where nid=?',[Auth::user()->nid]);
          //echo $nid;

          if( count($nid) <1)
          {
              return view('user.updatepersonuser')->with('nid',Auth::user()->nid)->with('name',Auth::user()->name)->with('email',Auth::user()->email);
          }//echo $nid;
          else
          {
              return view('userhome')->with('che',Auth::user()->nid);
          }
      }
      else if(Auth::user()->admin == 2)
      {
          return view('subreg');
      }
      else if(Auth::user()->admin == 6)
      {
          return view('subreg.employee');
      }
      else if(Auth::user()->admin == 3)
      {
          return view('acland');
      }
      else if(Auth::user()->admin == 7)
      {
          return view('officeacland.employee');
      }
      else if(Auth::user()->admin == 4)
      {
          return view('landrecord');
      }
      else if(Auth::user()->admin == 8)
      {
          return view('officelandrecord.employee');
      }
      else if(Auth::user()->admin == 5)
      {
          return view('tahsildar');
      }
      else if(Auth::user()->admin == 9)
      {
          return view('officetahsildar.employee');
      }
      else
      {
        $users['users'] = \App\User::all();
        return view ('adminhome',$users);
      }
  });
});


// admin part


// users-module

Route::get('mykhatian',function()
{
    $result= DB::select('select land_id,khatian_no,district,thana,mouza,jl_no,survey_name from khatian join owner_total_land using(land_id) where nid=?',[Auth::user()->nid]);
    return view('user.khatian-khatian',['emps'=>$result]);
});


Route::post('updatepersonuser','dbcontroller@updatepersonuser');

Route::get('searchfromkhatian',function ()
{
    $result=null;
    return view('user.showfromkhatian',['emps'=>$result]);

})->middleware('auth');
Route::post('khatianland','dbcontroller@khatianland')->middleware('auth');
Route::post('khatiankhatian','dbcontroller@khatiankhatian')->middleware('auth');
Route::post('khatianowner','dbcontroller@khatianowner')->middleware('auth');
Route::post('khatiandeed','dbcontroller@khatiandeed')->middleware('auth');
Route::post('khatiancase','dbcontroller@khatiancase')->middleware('auth');

Route::get('searchfromnid',function ()
{
    $result=null;
    return view('user.showfromnid',['emps'=>$result]);

})->middleware('auth');
Route::post('nidland','dbcontroller@nidland')->middleware('auth');
Route::post('niddeed','dbcontroller@niddeed')->middleware('auth');
Route::post('totalland','dbcontroller@totalland')->middleware('auth');


/// offices
Route::get('searchfromoffice',function ()
{
    $result=null;
    return view('user.searchfromoffice',['emps'=>$result]);

})->middleware('auth');

Route::get('officeback',function ()
{
    $result=null;
    return view('user.searchfromoffice',['emps'=>$result]);

})->middleware('auth');

Route::get('office-ACland',function ()
{
    $result=null;
    return view('user.office-ACland',['emps'=>$result]);

})->middleware('auth');
Route::post('office-ACland','dbcontroller@officeACland');

Route::get('office-tahsildar',function ()
{
    $result=null;
    return view('user.office-tahsildar',['emps'=>$result]);

})->middleware('auth');
Route::post('office-tahsildar','dbcontroller@officetahsildar');

Route::get('office-subregistry',function ()
{
    $result=null;
    return view('user.office-subregistry',['emps'=>$result]);

})->middleware('auth');
Route::post('office-subregistry','dbcontroller@officesubregistry')->middleware('auth');






// Route::get('accessdenied',function()
// {
//   return view('accessdenied');
// });
///// ADMIN
Route::get('/landadmin','admincontroller@landadmin')->middleware('IsAdmin');
Route::get('/khatianadmin','admincontroller@khatianadmin')->middleware('IsAdmin');
Route::get('/usersadmin','admincontroller@usersadmin')->middleware('IsAdmin');
Route::get('/aclandadmin',function ()
{
    $result = DB::table('ac_land_office')->get();
    return view('admin.showacland',['emps'=>$result]);
})->middleware('IsAdmin');

Route::get('/personadmin',function()
{
  $result=DB::table('person')->get();
  return view('admin.showperson',['emps'=>$result]);
})->middleware('IsAdmin');


/// SUB REGISTRY office module

Route::get('addemployeesubreg',function ()
{
    return view('subreg.addemployeesubreg');
})->middleware('IsSub');

Route::post('addemployeesubreg','subregcontroller@addemployeesubreg');
Route::get('showemployeesubreg',function()
{
  $result=DB::select('select * from employee where office_name=?',['Sub Registry Office']);
  $res=null;
    return view('subreg.showemployeesubreg',['emps'=>$result,'person'=>$res]);
});

Route::post('showemployeesubreg',function(Request $request)
{
    $result=DB::select('select * from employee where office_name=?',['Sub Registry Office']);
    $input = $request->all();
    $d1=$input['nid'];
    $res=DB::select('select * from person where nid=?',[$d1]);
    return view('subreg.showemployeesubreg',['emps'=>$result,'person'=>$res]);
});

Route::get('adddeed',function()
{
      $resultd = DB::table('district_id')->get();
      $temp=null;
      return view('subreg.adddeed',['empsd'=>$resultd,'emps'=>$temp]);
});
Route::post('checkkhatian','subregcontroller@checkkhatian');
Route::post('adddeed','subregcontroller@adddeed');
Route::get('showdeeds',function()
{
    $result=DB::select('select * from deed');
    return view('subreg.showdeed',['emps'=>$result]);
});
// Route::get('findprevdeed',function()
// {
//     $result=null;
//     return view('subreg.findprevdeed',['emps'=>$result]);
// });
// Route::post('findprevdeed',function(Request $request)
// {
//     $input=$request->all();
//     $nid
//     $result=null;
//     return view('subreg.findprevdeed',['emps'=>$result]);
// });

/// AC LAND office module

Route::get('addemployeeacland',function ()
{
    return view('officeacland.addemployeeacland');
});

Route::post('addemployeeacland','aclandcontroller@addemployeeacland');
Route::get('showemployeeacland',function()
{
  $result=DB::select('select * from employee where office_name=?',['AC Land Office']);
  $res=null;
    return view('officeacland.showemployeeacland',['emps'=>$result,'person'=>$res]);
});
Route::get('landtransfer',function()
{
    return view('officeacland.landtransfer');
});
Route::post('landtransfer','aclandcontroller@landtransfer');

Route::get('showdeed',function()
{
    $result=DB::select('select * from deed');
    return view('officeacland.showdeed',['emps'=>$result]);
});

Route::get('showkhatianac',function()
{
    $result=DB::select('select * from khatian');
    return view('officeacland.showkhatian',['emps'=>$result]);
});

// Route::get('findkhatian')


/// LAND RECORD office module

Route::get('addemployeelandrecord',function ()
{
    return view('officelandrecord.addemployeelandrecord');
});

Route::post('addemployeelandrecord','landrecordcontroller@addemployeelandrecord');
Route::get('showemployeelandrecord',function()
{
  $result=DB::select('select * from employee where office_name=?',['Land Record Office']);
  $res=null;
    return view('officelandrecord.showemployeelandrecord',['emps'=>$result,'person'=>$res]);
});

Route::post('showemployeelandrecord',function(Request $request)
{
    $result=DB::select('select * from employee where office_name=?',['Land Record Office']);
    $input = $request->all();
    $d1=$input['nid'];
    $res=DB::select('select * from person where nid=?',[$d1]);
    return view('officelandrecord.showemployeelandrecord',['emps'=>$result,'person'=>$res]);
});
Route::get('myinfo',function()
{
    $result=DB::select('select * from person where nid=?',[Auth::user()->nid]);
    return view('user.myinfo',['emps'=>$result]);

});
Route::get('addlandkhatian',function()
{
      $resultd = DB::table('district_id')->get();
      $resultt = DB::table('thana_id')->get();
      return view('officelandrecord.addlandkhatian',['empsd'=>$resultd],['empst'=>$resultt]);
});
Route::post('addlandkhatian','landrecordcontroller@addlandkhatian');
Route::get('showlands',function()
{
      $result = DB::table('land')->get();
      return view('officelandrecord.showlandlr',['emps'=>$result]);
});


/// TAHSILDAR office module

Route::get('addemployeetahsildar',function ()
{
    return view('officetahsildar.addemployeetahsildar');
});

Route::post('addemployeetahsildar','tahsildarcontroller@addemployeetahsildar');
Route::get('showemployeetahsildar',function()
{
  $result=DB::select('select * from employee where office_name=?',['Tahsildar Office']);
  $res=null;
    return view('officetahsildar.showemployeetahsildar',['emps'=>$result,'person'=>$res]);
});

Route::post('showemployeetahsildar',function(Request $request)
{
    $result=DB::select('select * from employee where office_name=?',['Tahsildar Office']);
    $input = $request->all();
    $d1=$input['nid'];
    $res=DB::select('select * from person where nid=?',[$d1]);
    return view('officetahsildar.showemployeetahsildar',['emps'=>$result,'person'=>$res]);
});

Route::get('addtax',function()
{
      $resultd = DB::table('district_id')->get();
      $temp=null;
      return view('officetahsildar.addtax',['empsd'=>$resultd,'emps'=>$temp]);
});
Route::post('checktax','tahsildarcontroller@checktax');
Route::post('addtax','tahsildarcontroller@addtax');
Route::get('tax',function()
{
    $result=DB::select('select * from tax');
    return view ('officetahsildar.tax',['emps'=>$result]);
});
Route::get('reqtax',function()
{
    $result=DB::select('select * from request_tax');
    return view ('officetahsildar.reqtax',['emps'=>$result]);
});
Route::get('statustax',function()
{
      $resultd = DB::table('district_id')->get();
      $temp=null;
      return view('officetahsildar.statustax',['empsd'=>$resultd,'emps'=>$temp]);
});
Route::post('statustax','tahsildarcontroller@statustax');

Route::get('changestatustax',function()
{
      $resultd = DB::table('district_id')->get();
      $temp=null;
      return view('officetahsildar.changestatustax',['empsd'=>$resultd,'emps'=>$temp]);
});
Route::post('checktax2','tahsildarcontroller@checktax2');
Route::post('changestatustax','tahsildarcontroller@changestatustax');

///////

Route::get('insertpersonadmin',function ()
{
    return view('admin.insertpersonadmin');
})->middleware('IsAdmin');


Route::post('insertpersonadmin','admincontroller@insertpersonadmin')->middleware('IsAdmin');

Route::get('insertemployeeadmin',function ()
{
    return view('admin.insertemployeeadmin');
})->middleware('IsAdmin');
Route::post('insertemployeeadmin','admincontroller@insertemployeeadmin')->middleware('IsAdmin');

Route::get('insertpublicorgadmin',function ()
{
    return view('admin.insertpublicorgadmin');
})->middleware('IsAdmin');
Route::post('insertpublicorgadmin','admincontroller@insertpublicorgadmin')->middleware('IsAdmin');

Route::get('insertprivateorgadmin',function ()
{
    return view('admin.insertprivateorgadmin');
})->middleware('IsAdmin');
Route::post('insertprivateorgadmin','admincontroller@insertprivateorgadmin')->middleware('IsAdmin');



Route::post('adder','admincontroller@check');

Route::get('insertlandkhatianlandadmin', function () {
      $resultd = DB::table('district_id')->get();
      $resultt = DB::table('thana_id')->get();
      return view('admin.insertlandkhatianlandadmin',['empsd'=>$resultd],['empst'=>$resultt]);
})->middleware('IsAdmin');


Route::post('insertlandkhatianlandadmin','admincontroller@insertlandkhatianlandadmin')->middleware('IsAdmin');
Route::post('insertlanddeedadmin','admincontroller@insertlanddeedadmin')->middleware('IsAdmin');
Route::post('insertlandtaxadmin','admincontroller@insertlandtaxadmin')->middleware('IsAdmin');

Route::post('insertlandownerpublicadmin','admincontroller@temp1')->middleware('IsAdmin');
Route::post('insertlandownerprivateadmin','admincontroller@temp2')->middleware('IsAdmin');
Route::post('insertlandownerpersonadmin','admincontroller@temp3')->middleware('IsAdmin');

Route::post('insertlandownerpublicadmin1','admincontroller@temp11')->middleware('IsAdmin');
Route::post('insertlandownerprivateadmin1','admincontroller@temp21')->middleware('IsAdmin');
Route::post('insertlandownerpersonadmin1','admincontroller@temp31')->middleware('IsAdmin');


Route::get('insertlandownerprivateadmin',function () {
      return view('admin.insertlandownerprivateadmin');
})->middleware('IsAdmin');
Route::get('insertlandownerpersonadmin',function () {
      return view('admin.insertlandownerpersonadmin');
})->middleware('IsAdmin');



/// land transfer

Route::get('landtransferadmin', function () {
      $resultd = DB::table('district_id')->get();
      $resultt = DB::table('thana_id')->get();

      return view('admin.landtransferadmin',['empsd'=>$resultd],['empst'=>$resultt]);
})->middleware('IsAdmin');
Route::post('landtransferadmin','admincontroller@landtransferadmin')->middleware('IsAdmin');

Route::get('updatepersonadmin', function () {
      return view('admin.updatepersonadmin');
})->middleware('IsAdmin');
Route::post('updatepersonadmin','admincontroller@updatepersonadmin')->middleware('IsAdmin');


/// json queries 179-

Route::post('shanto', function (Request $request) {

      $input = $request->all();
      $d1=$input['district'];
      $resultt = DB::table('khatian')
              ->where('khatian_no','=',$d1)
              ->get();
              // return 'ok';
      return response()->json(['thana'=>$resultt]);
});

Route::post('depend', function (Request $request) {

      $input = $request->all();
      $d1=$input['district'];
      $resultt = DB::table('thana_id')
              ->where('district_name','=',$d1)
              ->get();
              // return 'ok'
      return response()->json(['thana'=>$resultt]);
});

Route::post('khatianp', function (Request $request) {
  $input = $request->all();
  $d1=$input['district'];
  $resultt = DB::table('khatian')
          ->where('khatian_no','=',$d1)
          ->get();
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
})->middleware('IsAdmin');

Route::post('deedp', function (Request $request) {
  $input = $request->all();
  $d1=$input['d1'];
  $d2=$input['d2'];
  $resultt = DB::table('owner_total_deed')
          ->where('deed_no','=',$d1)
          ->where('serial_no','=',$d2)
          ->get();
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
});
Route::post('deedp2', function (Request $request) {
  $input = $request->all();
  $d1=$input['d1'];
  $d2=$input['d2'];
  $resultt = DB::table('owner_total_deed')
          ->where('deed_no','=',$d1)
          ->where('serial_no','=',$d2)
          ->get();
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
})->middleware('IsAdmin');
Route::post('khatianptax', function (Request $request) {
  $input = $request->all();
  $d1=$input['d'];
  $resultt = DB::table('khatian')
          ->where('khatian_no','=',$d1)
          ->get();
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
})->middleware('IsAdmin');
Route::post('orgpub', function (Request $request) {
  $input = $request->all();
  $d1=$input['d1'];
  $d2=$input['d2'];
  $resultt = DB::table('public_organization')
          ->where('org_name','=',$d1)
          ->where('in_no','=',$d2)
          ->get();
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
})->middleware('IsAdmin');
Route::post('orgpriv', function (Request $request) {
  $input = $request->all();
  $d1=$input['d1'];
  $d2=$input['d2'];
  $resultt = DB::table('private_organization')
          ->where('org_name','=',$d1)
          ->where('in_no','=',$d2)
          ->get();
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
})->middleware('IsAdmin');
Route::post('orgperson', function (Request $request) {
  $input = $request->all();
  $d1=$input['d1'];
  $resultt = DB::table('person')
          ->where('nid','=',$d1)
          ->get();
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
});
Route::post('empvarify1', function (Request $request) {
  $input = $request->all();
  $d1=$input['d1'];
  $resultt = DB::table('person')
          ->where('nid','=',$d1)
          ->get();
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
})->middleware('IsAdmin');
Route::post('empvarify2', function (Request $request) {
  $input = $request->all();
  $d1=$input['d1'];
  $resultt = DB::table('employee')
          ->where('nid','=',$d1)
          ->get();
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
})->middleware('IsAdmin');

Route::post('iopup', function (Request $request) {
  $input = $request->all();
  $d1=$input['d1'];
  $d2=$input['d2'];
  $resultt = DB::table('public_organization')
          ->where('org_name','=',$d1)
          ->where('in_no','=',$d2)
          ->get();
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
})->middleware('IsAdmin');
Route::post('ioprp', function (Request $request) {
  $input = $request->all();
  $d1=$input['d1'];
  $d2=$input['d2'];
  $resultt = DB::table('private_organization')
          ->where('org_name','=',$d1)
          ->where('in_no','=',$d2)
          ->get();
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
})->middleware('IsAdmin');
Route::post('enid', function (Request $request) {
  $input = $request->all();
  $d1=$input['d1'];
  $resultt = DB::select('select * from person where nid=?',[$d1]);
          // return 'ok';
  return response()->json(['thana'=>$resultt]);
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/chec','SearchController@index');

Route::get('/search','SearchController@search');
