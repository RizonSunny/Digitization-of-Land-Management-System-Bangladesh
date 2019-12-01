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
        <td>Land id</td>
        <td>Khatian no</td>
        <td>Jud id</td>
        <td>Dakhila form no</td>
        <td>Duration of tax validation</td>
        <td>Status</td>
        <td>Amount</td>

		</tr>

    @if($emps)
        @foreach($emps as $emp)

      <tr>
        <td>{{ $emp->land_id }}</td>
        <td>{{ $emp->khatian_no }}</td>
        <td>{{ $emp->jud_id }}</td>
        <td>{{ $emp->dakhila_form_no }}</td>
        <td>{{ $emp->duration_of_tax_validation }}</td>
        <td>{{ $emp->status }}</td>
        <td>{{ $emp->amount }}</td>


      </tr>
    @endforeach
    @endif
  </table>

</body>
