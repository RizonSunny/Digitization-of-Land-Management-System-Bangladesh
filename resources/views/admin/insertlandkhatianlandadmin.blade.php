<head>
@include('layouts.appadmin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
@include('layouts.sidebaradmin')
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
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

  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
            //window.location.reload();
      }).fail(function() {
          //alert('failed');
      });
    });
  });

  $(document).ready(function() {
    $("#khatian").change(function() {
      var selection = document.getElementById('khatian').value;
      $.post('khatianp',{
          "_token" : "{{ csrf_token() }}",
          district : selection
      }).done(function (response) {
        // if(response=='ok') {}
        var jsondata = JSON.stringify(response);
        jsondata = JSON.parse(jsondata);
        console.log(jsondata['thana']);
        //  alert(jsondata['thana'].length);
          if(jsondata['thana'].length>0)
          {
            alert('Duplicate Data Entry');
          }
          // window.location.reload();
      }).fail(function() {
          alert('failed');
      });
    });
  });

  </script>

<h1 style="text-align:center;">Insert Land</h1>
<div class="container" style="margin-left:270px;margin-top:20px;width:1000px">
  <ul class="breadcrumb">
    <li style="font-weight: bold;">Insert Khatian and Land</li>
    <li>Insert Deed</li>
    <li>Insert Tax</li>
    <li>Owner</li>
  </ul>
</div>

  <form method="post" action="insertlandkhatianlandadmin">
    @csrf
  <div class="form-style-10">
      <div class="section"><span>1</span><b>Khatian Information</b></div>

  <div class="container" style="margin-left:10px;margin-top:20px;">


    <label style="width: 100%">Khatian No</label>
    <input required autofocus id="khatian" type="text1" name="khatianno" maxlength="5" minlength="1" pattern="[0-9]*" placeholder="Khatian no.."  >
    <br><br>
    <label for="country">District</label>
    <select id="dis" name="district" required="">
        <option disabled="" selected="">Select Option</option>
        @foreach($empsd as $emp)
          <option value="{{ $emp->district_name }}"  >{{ $emp->district_name }}</option>
        @endforeach
    </select>
    <br><br>
    <label>Thana</label>
    <select id="than" name="thana" required="">
        <!-- <option disabled="" selected="">Select Option</option>
          @foreach($empst as $emp)
            <option value="{{ $emp->thana_name }}"  >{{ $emp->thana_name }}</option>
          @endforeach -->
    </select>
    <br><br>
    <label >Mouza</label>
    <select name="mouza" required="">
        <option disabled="" selected="">Select Option</option>
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
    <br><br>

    <label>JL No</label>
    <input required autofocus  type="text1" name="jlno" maxlength="5" minlength="1" pattern="[0-9]*" placeholder="JL no..">
    <br><br>
    <label >Survey</label>

    <select name="servey" required="">
      <option disabled="" selected="">Select Option</option>
      <option value="RS">RS Survey</option>
      <option value="VS">VS Survey</option>
    </select>
    <br><br>
    <!-- <input type="submit" value="Submit"> -->


</div>
</div>

<!-- 2nd container land information-->
<div class="form-style-10">
    <div class="section"><span>2</span><b>Land Information</b></div>

<div class="container" style="margin-left:10px;margin-top:20px;">

  	<label>Type </label>
    <input required autofocus  type="text1" name="type" >
    <br><br>
  	<label>Area </label>
    <input required autofocus  type="number" name="area" >
    <br><br>
  	<label>Infrastructure</label>
    <input required autofocus  type="text1" name="infrastructure" >
    <br><br>
  	<label>Possesion</label>
    <input required autofocus  type="text1" name="possesion" >
    <br><br>
  	<label>Daag_no</label>
    <input required autofocus  type="text1" maxlength="5" pattern="[0-9]*" name="daag_no" >
    <br><br>
  	<label>Chowhuddi_east </label>
    <input required autofocus  type="text1" name="chowhuddi_east" >
    <br><br>
  	<label>Chowhuddi_west </label>
    <input required autofocus  type="text1" name="chowhuddi_west" >
    <br><br>
  	<label>Chowhuddi_north </label>
    <input required autofocus  type="text1" name="chowhuddi_north" >
    <br><br>
  	<label>Chowhuddi_south </label>
    <input required autofocus  type="text1" name="chowhuddi_south" >
    <br><br>
  <input type="submit" value="Submit">


</div>
</div>

  </form>

</body>
</html>
