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
    <h5  style="margin-left:300px"> land information</h5>
		<table id="tt" style="margin-left:300px" >
		<tr>
		    <td>land_id</td>
				<td>type</td>
				<td>area</td>
				<td>infrastructure</td>
				<td>possesion</td>
				<td>daag_no</td>
				<td>chowhuddi_east</td>
				<td>chowhuddi_west</td>
				<td>chowhuddi_north</td>
				<td>chowhuddi_south</td>
		</tr>

        @foreach($emps as $emp)
      <tr>
        <td>{{ $emp->land_id }}</td>
        <td>{{ $emp->type }}</td>
        <td>{{ $emp->area }}</td>
        <td>{{ $emp->infrastructure }}</td>
        <td>{{ $emp->possesion }}</td>
        <td>{{ $emp->daag_no }}</td>
        <td>{{ $emp->chowhuddi_east }}</td>
        <td>{{ $emp->chowhuddi_west }}</td>
        <td>{{ $emp->chowhuddi_north }}</td>
        <td>{{ $emp->chowhuddi_south }}</td>

      </tr>
    @endforeach
    @endif
  </table>

</table>

</body>
</html>
