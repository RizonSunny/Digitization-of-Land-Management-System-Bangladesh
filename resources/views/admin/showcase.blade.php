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
    <h5  style="margin-left:300px"> Tax information</h5>
		<table id="tt" style="margin-left:300px" >
		<tr>
        <td>Case no</td>
        <td>Court name</td>
        <td>Court_address</td>
        <td>Validity</td>
        <td>Start date</td>
        <td>End_date</td>
        <td>Judge name</td>
        <td>Verdict</td>
        <td>Defendant</td>
        <td>Complainant }}</td>

		</tr>

    @if($emps)
        @foreach($emps as $emp)

      <tr>
        <td>{{ $emp->case_no }}</td>
        <td>{{ $emp->court_name }}</td>
        <td>{{ $emp->court_address }}</td>
        <td>{{ $emp->validity }}</td>
        <td>{{ $emp->start_date }}</td>
        <td>{{ $emp->end_date }}</td>
        <td>{{ $emp->judge_name }}</td>
        <td>{{ $emp->verdict }}</td>
        <td>{{ $emp->defendant }}</td>
        <td>{{ $emp->complainant }}</td>


      </tr>
    @endforeach
    @endif
  </table>

</body>
