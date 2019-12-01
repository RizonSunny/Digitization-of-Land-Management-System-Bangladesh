@include('layouts.app')
@include('layouts.sidebar');
<style>
#tt table {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 400px;
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
  width: 100px;
}
</style>

	<body>
	@include('layouts.showfromkhatian');

@if($emps)
    <h5  style="margin-left:300px"> Owner Information</h5>
		<table id="tt" style="margin-left:300px;margin-right:10px;" >
		<tr>
        <td>name</td>
        <td>father_name</td>
        <td>mother_name </td>
        <td>spouse_name  </td>
        <td>present_address </td>
        <td>permanent_address </td>
        <td>birthdate</td>
        <td>date_of_death</td>
        <td>gender</td>
        <td>religion</td>
        <td>occupation</td>
        <td>contact_no</td>
        <td>email</td>
		</tr>

        @foreach($emps as $emp)
      <tr>
        <td>{{ $emp->name }}</td>
        <td>{{ $emp->father_name }}</td>
        <td>{{ $emp->mother_name }} </td>
        <td>{{ $emp->spouse_name }}  </td>
        <td>{{ $emp->present_address  }}</td>
        <td>{{ $emp->permanent_address }} </td>
        <td>{{ $emp->birthdate }}</td>
        <td>{{ $emp->date_of_death }}</td>
        <td>{{ $emp->gender }}</td>
        <td>{{ $emp->religion }}</td>
        <td>{{ $emp->occupation }}</td>
        <td>{{ $emp->contact_no }}</td>
        <td>{{ $emp->email }}</td>

      </tr>
    @endforeach
    @endif
  </table>

</table>

</body>
</html>
