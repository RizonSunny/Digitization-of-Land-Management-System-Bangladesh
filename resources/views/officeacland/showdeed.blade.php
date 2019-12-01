@include('layouts.app')
@include('officeacland.sidebar');
<html>
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
    <h5  style="margin-left:300px"> Deed information</h5>
		<table id="tt" style="margin-left:300px" >
		<tr>
        <td>deed no</td>
        <td>serial no</td>
        <td>witness</td>
        <td>ward</td>
        <td>deed type</td>
        <td>land price</td>
        <td>grantor</td>
        <td>recipient</td>
        <td>issue date</td>
		</tr>

    @if($emps)
        @foreach($emps as $emp)

      <tr>
        <td>{{ $emp->deed_no }}</td>
        <td>{{ $emp->serial_no }}</td>
        <td>{{ $emp->witness }}</td>
        <td>{{ $emp->ward }}</td>
        <td>{{ $emp->deed_type }}</td>
        <td>{{ $emp->land_price }}</td>
        <td>{{ $emp->grantor }}</td>
        <td>{{ $emp->recipient }}</td>
        <td>{{ $emp->issue_date }}</td>

      </tr>
    @endforeach
    @endif
  </table>

</body>
</html>
