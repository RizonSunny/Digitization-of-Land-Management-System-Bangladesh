@include('layouts.app')
@include('officeacland.sidebar')
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
               $("#enid").change(function() {
                 var selection = document.getElementById('enid').value;
                 $.post('enid',{
                     "_token" : "{{ csrf_token() }}",
                     d1 : selection
                 }).done(function (response) {
                   // if(response=='ok') {}
                   var jsondata = JSON.stringify(response);
                   jsondata = JSON.parse(jsondata);
                   console.log(jsondata['thana']);
                   //  alert(jsondata['thana'].length);
                     if(jsondata['thana'].length<1)
                     {
                       alert('No Person Available, pls update information');
                        window.location.reload();
                     }
                     // window.location.reload();
                 }).fail(function() {
                     alert('failed');
                 });
               });
             });
  </script>

<h1 style="text-align:center;">Add Employee</h1>

  <form method="post" action="addemployeeacland">
    @csrf


<!-- 2nd container land information-->
<div class="form-style-10">
    <div class="section"><span></span><b>Employee Information</b></div>

<div class="container" style="margin-left:10px;margin-top:20px;">

      <label>nid</label>
      <input required autofocus  id="enid" type="text1" name="nid" >
      <br><br>
      <label>Designation</label>
      <input required autofocus  type="text1" name="designation" >
      <br><br>

      <input type="hidden" type="text" name="office"  value= "AC Land Office" >
      <label>joining_date</label>
      <input required autofocus  type="date" name="joining_date" >
      <br><br>
  <input type="submit" value="Submit">


</div>
</div>

  </form>

</body>
</html>
