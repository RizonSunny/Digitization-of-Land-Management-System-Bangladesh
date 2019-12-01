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
    <h5  style="margin-left:300px"> land information</h5>
		<table id="tt" style="margin-left:300px" >
		<tr>
        <td>IN NO</td>
        <td>Branch name</td>
        <td>Address</td>
        <td>Contact no</td>
        <td>Name of Assistant Commisioner</td>
		</tr>

    @if($emps)
        @foreach($emps as $emp)

      <tr>
        <td>{{ $emp->in_no }}</td>
        <td>{{ $emp->branch_name }}</td>
        <td>{{ $emp->address }}</td>
        <td>{{ $emp->contact_no }}</td>
        


      </tr>
    @endforeach
    @endif
  </table>

</body>
