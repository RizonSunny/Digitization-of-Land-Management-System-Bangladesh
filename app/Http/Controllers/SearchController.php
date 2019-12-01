<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use DB;




class SearchController extends Controller

{

   public function index()

{

return view('search.search');

}



public function search(Request $request)

{

if($request->ajax())

{

$output="";

$products=DB::table('deed')->where('deed_no','LIKE','%'.$request->search."%")->get();

if($products)

{

foreach ($products as $key => $product) {

$output.='<tr>'.

'<td>'.$product->deed_no.'</td>'.

'<td>'.$product->serial_no.'</td>'.

'<td>'.$product->witness.'</td>'.

'<td>'.$product->wa.'</td>'.

'</tr>';

}

return Response($output);

   }
   }
}
}
