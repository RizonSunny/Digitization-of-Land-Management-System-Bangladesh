@include('layouts.app')
@include('layouts.sidebarsubreg');
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
<h5  style="margin-left:300px"> Subregistry Office Employee</h5>
  <table id="tt" style="margin-left:300px" >
    <tr>
          <td>NID </td>
          <td>OFFICE_NAME</td>
          <td>DESIGNATION </td>
          <td>JOINING_DATE</td>
          <td>Profile</td>
    </tr>


  @if($emps)
  @foreach($emps as $emp)

    <tr>
      <td>{{ $emp->nid}}</td>
      <td>{{ $emp->office_name}}</td>
      <td>{{ $emp->designation }}</td>
      <td>{{ $emp->joining_date}}</td>
      <td> <form method="post" action="showemployeesubreg">@csrf <button type="submit" name="nid" value="{{$emp->nid}}">details</button></form></td>

    </tr>
  @endforeach
  @endif
</table>
</div>

<div>
<br><br>

		<table id="tt" style="margin-left:300px" >
		<tr>

		</tr>

    @if($person)
        @foreach($person as $emp)
        <h5  style="margin-left:300px"> Details of nid= {{ $emp->nid }}</h5>

      <tr>
        <td>National ID </td>
        <td>{{ $emp->nid }}</td>
        <tr>
        </tr>
        <td>Name</td>
        <td>{{ $emp->name }}</td>
        <tr>
        </tr>
        <td>father name</td>
        <td>{{ $emp->father_name }}</td>
        <tr>
        </tr>
        <td>mother name</td>
        <td>{{ $emp->mother_name }}</td>
        <tr>
        </tr>
        <td>spouse name</td>
        <td>{{ $emp->spouse_name }}</td>

        <tr>
        </tr>
        <td>Present address</td>
        <td>{{ $emp->present_address }}</td>
        <tr>
        </tr>
        <td>Permanent address</td>
        <td>{{ $emp->permanent_address }}</td>
        <tr>
        </tr>
        <td>Birthdate</td>
        <td>{{ $emp->birthdate }}</td>
        <tr>
        </tr>
        <td>Date of death</td>
        <td>{{ $emp->date_of_death }}</td>
        <tr>
        </tr>
        <td>Gender</td>
        <td>{{ $emp->gender }}</td>
        <tr>
        </tr>
        <td>Religion</td>
        <td>{{ $emp->religion }}</td>
        <tr>
        </tr>
        <td>Occupation</td>
        <td>{{ $emp->occupation }}</td>
        <tr>
        </tr>
        <td>Contact no</td>
        <td>{{ $emp->contact_no }}</td>
        <tr>
        </tr>
        <td>email</td>
        <td>{{ $emp->email }}</td>

      </tr>
    @endforeach
    @endif
  </table>

</div>

</body>
