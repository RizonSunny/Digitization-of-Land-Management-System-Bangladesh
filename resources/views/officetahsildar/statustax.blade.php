
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@include('layouts.app')
@include('officetahsildar.sidebar')
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
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
.form-style-10{
    width:950px;
    padding:30px;
    margin-left:290px ;
    background: #FFF;
    border-radius: 10px;
    -webkit-border-radius:10px;
    -moz-border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
    -moz-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
    -webkit-box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.13);
}


.form-style-10 .section{
    font: normal 20px 'Bitter', serif;
    color: #2A88AD;
    margin-bottom: 5px;
}
.form-style-10 .section span {
    background: #2A88AD;
    padding: 5px 10px 5px 10px;
    position: absolute;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border: 4px solid #fff;
    font-size: 14px;
    margin-left: -45px;
    color: #fff;
    margin-top: -3px;
}

ul.breadcrumb {
    padding: 10px 16px;
    list-style: none;
    background-color: #eee;
}
ul.breadcrumb li {
    display: inline;
    font-size: 18px;
}
ul.breadcrumb li+li:before {
    padding: 8px;
    color: black;
    content: ">\00a0";
}
ul.breadcrumb li a {
    color: #0275d8;
    text-decoration: none;
}
ul.breadcrumb li a:hover {
    color: #01447e;
    text-decoration: underline;
}
input[type=text1], select {

    width: 100%;
    padding: 7px 7px;
    margin-top:  0px;
    margin-down:  8px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-sizing: border-box;
}
input[type=number], select {

    width: 100%;
    padding: 7px 7px;
    margin-top:  0px;
    margin-down:  8px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-sizing: border-box;
}
input[type=date], select {

    width: 100%;
    padding: 7px 7px;
    margin-top:  0px;
    margin-down:  8px;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 2px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

</style>
<body>
  <script>
  $(document).ready(function() {
    $("#dis").change(function() {

      var selection = document.getElementById('dis').value;
      $.post('depend',{
          "_token" : "{{ csrf_token() }}",
          district : selection
      }).done(function (response) {
        // if(response=='ok') {}
        var jsondata = JSON.stringify(response);
        jsondata = JSON.parse(jsondata);
        console.log(jsondata['thana']);
        //  alert('paise');
          for (i = 0; i < jsondata['thana'].length; i++) {
              var temp = document.createElement('option');
              temp.value = jsondata['thana'][i]['thana_name'];
              temp.innerHTML = jsondata['thana'][i]['thana_name'];
              document.getElementById('than').appendChild(temp);
          }

      }).fail(function() {
          //alert('failed');
      });
    });
  });

  $(document).ready(function() {
    $("#sn").change(function() {
      var selection2 = document.getElementById('sn').value;
      var selection1 = document.getElementById('dd').value;
      $.post('deedp',{
          "_token": "{{ csrf_token() }}",d1 : selection1,"_token": "{{ csrf_token() }}",d2 : selection2
      }).done(function (response) {
        // if(response=='ok') {}
        var jsondata = JSON.stringify(response);
        jsondata = JSON.parse(jsondata);
        console.log(jsondata['thana']);
        //  alert(jsondata['thana'].length);
          if(jsondata['thana'].length>0)
          {
            alert('Duplicate Data Entry');
             window.location.reload();
          }
          // window.location.reload();
      }).fail(function() {
          alert('failed');
      });
    });
  });

  $(document).ready(function() {
    $("#in").change(function() {
      var selection1 = document.getElementById('in').value;

      $.post('orgperson',{
          "_token": "{{ csrf_token() }}",d1 : selection1
      }).done(function (response) {
        // if(response=='ok') {}
        var jsondata = JSON.stringify(response);
        jsondata = JSON.parse(jsondata);
        console.log(jsondata['thana']);
        //  alert(jsondata['thana'].length);
          if(jsondata['thana'].length<1)
          {
            alert('No Person Available');
             window.location.reload();
          }
          // window.location.reload();
      }).fail(function() {
          alert('failed');
      });
    });
  });

  </script>


<h1 style="text-align:center;"><b>Check Tax Status</b></h1>

<div class="form-style-10">
    <div class="section"><span>o</span><b>Check Land</b></div>
    <form method="POST" >
      @csrf
      <table>
      <tr>
        <th><label> District : </label></th>
        <th><label> Thana : </label></th>
      </tr>
      <tr>

        <th>
        <select id="dis" name="district" >
            <option disabled="" selected=""></option>
            @foreach($empsd as $emp)
              <option value="{{ $emp->district_name }}"  >{{ $emp->district_name }}</option>
            @endforeach
        </select>
      </th>
        <th>

        <select id="than" name="thana" >
        </select>
      </th>
    </tr>
    <tr>

      <th><label> Mouza : </label></th>
      <th><label> Daag No : </label></th>
      <th><label> khatian no : </label></th>
    </tr>
    <tr>
      <th>
        <select  name="mouza"  >
        <option disabled="" selected=""></option>
        <option value="0001">mouza1</option>
        <option value="0002">mouza2</option>
        <option value="0003">mouza3</option>
        <option value="0004">mouza4</option>
        <option value="0005">mouza5</option>
        <option value="0006">mouza6</option>
        <option value="0007">mouza7</option>
        <option value="0008">mouza8</option>
        <option value="0009">mouza9</option>
        <option value="0010">mouza10</option>
    </select>
      </th>

        <th><input type="text" name="daag_no" ></th>
        <th><input type="text" name="khatian-no"></th>
      </tr>
    </table>
      <button type="submit" formaction="statustax" > Check </button>
    </form>

</div>


@if($emps)
<h2  style="margin-left:300px"> Tax Status is {{$emps[0]->status}} </h2>
<h5  style="margin-left:300px"> Tax Details</h5>
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

@else
    <h5  style="margin-left:300px"> Wrong Information or No Tax </h5>
@endif
</table>

</body>
</html>
