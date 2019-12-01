@include('layouts.app')
@include('layouts.sidebar');
<style>

.wrapper {
    text-align: center;
}

.button {
    position: absolute;

    left: 650px;
    top: 450px;
}

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
  width: 100px;
}
</style>

<div  style="margin-left:300px">
  <script>
  </script>

  <h3> Find Subregistry Office</h3>
  <!-- <form method="POST" formaction="office-subregistry">
    @csrf
    <table>
    <tr>
      <th><label> Deed No : </label></th>
      <th><label> Serial No : </label></th>

    </tr>
    <tr>
      <th><input type="text" name="deedno" required autofocus value="<?php echo isset($_POST['district']) ? $_POST['district'] : '' ?>" /></th>
      <th><input type="text" name="serialno" required autofocus value="<?php echo isset($_POST['thana']) ? $_POST['thana'] : '' ?>" /></th>

    </tr>
  </table>
    <button type="submit" formaction="office-subregistry" > search office </button> -->


    @if($emps)
        <h5  style="margin-left:300px"> subregistry office information</h5>
    		<table id="tt" style="margin-left:300px" >
    		<tr>
    		    <td>Branch Name</td>
    				<td>Address</td>
    				<td>Contact No</td>
    		</tr>

            @foreach($emps as $emp)
          <tr>

            <td>{{ $emp->branch_name }}</td>
            <td>{{ $emp->address }}</td>
            <td>{{ $emp->contact_no }}</td>

          </tr>
        @endforeach
        @endif
      </table>
  <!-- </form> -->
  <form method="GET">
  <div class="wrapper">
      <button type="submit" formaction="officeback" style="width:15%" class="button">Back to Office Home</button>
  </div>
</form>
</div>
</div>
