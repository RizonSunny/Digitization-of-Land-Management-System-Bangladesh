@include('layouts.app')
@include('layouts.sidebar');
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: 33.3%;
  margin-bottom: 16px;
  padding: 0 8px;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
</style>
</head>
<body>

<div style="margin-left:280px; margin-right:28px; ">
<h1 style="text-align:center;">Find Relative Offices</h1>
<h4 style="text-align:center;">You can find which office contain your documents</h5>

<br>

<div class="row">
  <div class="column">
    <div class="card">

      <div class="container">
        <h2 style="text-align: center;">AC Land Office</h2>
        <p class="title">Khatian Mutation</p>
        <br>
        <form method="post">@csrf<button class="button" type="submit" formaction="office-ACland" >Search this office </button></form>
        <br>
      </div>
    </div>
  </div>

  <div class="column">
    <div class="card">

      <div class="container">
        <h2  style="text-align: center;">Sub Registry Office</h2>
        <p class="title">Have records of all deeds</p>
        <br>
        <form method="post">@csrf<button class="button" type="submit" formaction="office-subregistry" > search this office </button></form><br>
      </div>
    </div>
  </div>
  <div class="column">
    <div class="card">

      <div class="container">
        <h2  style="text-align: center;">Tahsildar Office</h2>
        <p class="title">Tax Information</p>
        <br>
        <form method="post">@csrf<button class="button" type="submit" formaction="office-tahsildar">Search this Office</button></form><br>
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>
