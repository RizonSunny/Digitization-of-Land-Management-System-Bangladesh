
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@include('layouts.appadmin')
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

  </script>


<h1 style="text-align:center;">Insert Land</h1>
<div class="container" style="margin-left:270px;margin-top:20px;width:1000px">
  <ul class="breadcrumb">
    <li>Insert Khatian and Land</li>
    <li style="font-weight: bold;">Insert Deed</li>
    <li>Insert Tax</li>
    <li>Owner</li>
  </ul>
</div>
  <form method="post" action="insertlanddeedadmin">
    @csrf
  <div class="form-style-10">
      <div class="section"><span>3</span><b>Deed Information</b></div>


<div class="container" style="margin-left:10px;margin-top:20px;">
  <input type="hidden" name="lid" value="{{ $lid }}"  >
  
  <label>deed_no</label>
  <input required autofocus id="dd" type="text1" name="deed_no" >
  <br><br>
  <label>serial_no</label>
  <input required autofocus  id="sn" type="text1" name="serial_no" >
  <br><br>
  <label>witness </label>
  <input required autofocus  type="text1" name="witness" >
  <br><br>
  <label>ward </label>
  <input required autofocus  type="text1" name="ward" >
  <br><br>
  <label>deed_type </label>
  <input required autofocus  type="text1" name="deed_type" >
  <br><br>
  <label>land_price</label>
  <input required autofocus  type="number" name="land_price" >
  <br><br>
  <label>grantor </label>
  <input required autofocus  type="text1" name="grantor" >
  <br><br>
  <label>recipient </label>
  <input required autofocus  type="text1" name="recipient" >
  <br><br>
  <label>issue_date</label>
  <input required autofocus  type="date" name="issue_date" >
  <br><br>
  <input type="submit" value="Submit">


</div>
</div>

  </form>

</body>
</html>
