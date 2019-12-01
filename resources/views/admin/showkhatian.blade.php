@include('layouts.appadmin')
@include('layouts.sidebaradmin');
<style>
#tt table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 500px;
}

#tt td,#tt th {
    border: 1px solid #ddd;
    padding: 8px;
}

#tt tr:nth-child(even){background-color: #f2f2f2;}

#tt tr:hover {background-color: #ddd;}

#tt th {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
#tt tbody{
  overflow-y: scroll;
  overflow-x: scroll;
  height: 150px;
  width: 1000px;
}
</style>

	<body>
	<div  style="margin-left:300px">

</div>
<h5  style="margin-left:300px"> khatians information</h5>
  <table id="tt" style="margin-left:300px" >
    <tr>
        <td>land </td>
        <td>khatian no</td>
        <td>district</td>
        <td>thana</td>
        <td>mouza</td>
        <td>jl no</td>
        <td>survey name</td>
    </tr>


  @if($emps)
  @foreach($emps as $emp)

    <tr>
      <td>{{ $emp->land_id}}</td>
      <td>{{ $emp->khatian_no}}</td>
      <td>{{ $emp->district }}</td>
      <td>{{ $emp->thana}}</td>
      <td>{{ $emp->mouza}}</td>
      <td>{{ $emp->jl_no }}</td>
      <td>{{ $emp->survey_name }}</td>

    </tr>
  @endforeach
  @endif
</table>

</body>
