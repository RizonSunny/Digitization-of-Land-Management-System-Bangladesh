@include('layouts.app')
@include('layouts.sidebar');
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
	@include('layouts.showfromkhatian');

@if($emps)
    <h5  style="margin-left:300px"> case information</h5>
		<table id="tt" style="margin-left:300px" >
      <tr>
        <td>case_no</td>
        <td>court_name</td>
        <td>court_address</td>
        <td>validity</td>
        <td>start_date</td>
        <td>end_date</td>
        <td>judge_name</td>
        <td>verdict</td>
        <td>defendent</td>
        <td>complainant</td>
  			</tr>
  			@foreach($emps as $emp)

  				<tr>

            <td>{{ $emp->case_no}}</td>
            <td>{{ $emp->court_name}}</td>
            <td>{{ $emp->court_address}}</td>
            <td>{{ $emp->validity}}</td>
            <td>{{ $emp->start_date}}</td>
            <td>{{ $emp->end_date}}</td>
            <td>{{ $emp->judge_name}}</td>
            <td>{{ $emp->verdict}}</td>
            <td>{{ $emp->defendent}}</td>
            <td>{{ $emp->complainant}}</td>

  				</tr>
  			@endforeach
    @endif
  </table>

</table>

</body>
</html>
