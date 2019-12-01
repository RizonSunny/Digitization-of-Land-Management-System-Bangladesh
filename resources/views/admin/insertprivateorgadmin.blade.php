@include('layouts.appadmin')
@include('layouts.sidebaradmin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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

  <script>
  $(document).ready(function() {
    $("#inn").change(function() {
      var selection1 = document.getElementById('oo').value;
      var selection2 = document.getElementById('inn').value;
      $.post('ioprp',{
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

  </script>


<h1 style="text-align:center;">Insert Private Organization</h1>

  <form method="post" action="insertprivateorgadmin">
    @csrf


<!-- 2nd container land information-->
<div class="form-style-10">
    <div class="section"><span></span><b>Private Organization Information</b></div>

<div class="container" style="margin-left:10px;margin-top:20px;">

      <label>Organization Name </label>
      <input required autofocus  id="oo" type="text1" name="org" >
      <br><br>
      <label>IN No</label>
      <input required autofocus  id="inn" type="text1" name="inno" >
<br><br>
      <label>Address  </label>
      <input required autofocus  type="text1" name="address" >
<br><br>
      <label>Branch Name </label>
      <input required autofocus  type="text1" name="branch_name" >
      <br><br>
      <label>establish_date </label>
      <input required autofocus  type="date" name="establish_date" >
      <br><br>
      <label>contact_no</label>
      <input required autofocus  type="text1" required size="11" minlength="11" maxlength="11" pattern="01[5-9][0-9]*" name="contact_no" >
      <br><br>
      <label>chairman</label>
      <input required autofocus  type="text1" name="chairman" >
      <br><br>
      <label>manager</label>
      <input required autofocus  type="text1" name="manager" >
  <input type="submit" value="Submit">


</div>
</div>

  </form>

</body>
</html>
