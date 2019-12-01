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
    <h5  style="margin-left:300px"> person</h5>
		<table id="tt" style="margin-left:300px" >
		<tr>
        <td>National ID </td>
        <td>Name</td>
        <td>father name</td>
        <td>mother name</td>
        <td>spouse name</td>
        <td>Present address</td>
        <td>Permanent address</td>
        <td>Birthdate</td>
        <td>Date of death</td>
        <td>Gender</td>
        <td>Religion }}</td>
        <td>Occupation</td>
        <td>Contact no</td>
        <td>email</td>
		</tr>

    @if($emps)
        @foreach($emps as $emp)

      <tr>
        <td>{{ $emp->nid }}</td>
        <td>{{ $emp->name }}</td>
        <td>{{ $emp->father_name }}</td>
        <td>{{ $emp->mother_name }}</td>
        <td>{{ $emp->spouse_name }}</td>
        <td>{{ $emp->present_address }}</td>
        <td>{{ $emp->permanent_address }}</td>
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

</body>
