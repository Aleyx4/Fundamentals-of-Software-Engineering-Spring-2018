<?php
  include('session.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link href="bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap.min.js"></script>
</head>

<body>
<div>
    <div class="row">
        <h3>Voter Manager</h3>
    </div>
    <div>
      <form id="searchForm" action="" method="post">
        <input type="text" name="first" class="box" placeholder="First Name" />
        <input type="text" name="last" class="box" placeholder="Last Name" />
        <input type="text" name="street" class="box" placeholder="Street Address" />
        <select style="width: 100px" name = "state">
          <option value="">State</option>
          <option value="AL">AL</option>
          <option value="AK">AK</option>
          <option value="AZ">AZ</option>
          <option value="AR">AR</option>
          <option value="CA">CA</option>
          <option value="CO">CO</option>
          <option value="CT">CT</option>
          <option value="DE">DE</option>
          <option value="FL">FL</option>
          <option value="GA">GA</option>
          <option value="HI">HI</option>
          <option value="ID">ID</option>
          <option value="IL">IL</option>
          <option value="IA">IA</option>
          <option value="KS">KS</option>
          <option value="KY">KY</option>
          <option value="LA">LA</option>
          <option value="ME">ME</option>
          <option value="MD">MD</option>
          <option value="MA">MA</option>
          <option value="MI">MI</option>
          <option value="MN">MN</option>
          <option value="MS">MS</option>
          <option value="MO">MO</option>
          <option value="MT">MT</option>
          <option value="NE">NE</option>
          <option value="NV">NV</option>
          <option value="NH">NH</option>
          <option value="NJ">NJ</option>
          <option value="NM">NM</option>
          <option value="NY">NY</option>
          <option value="NC">NC</option>
          <option value="ND">ND</option>
          <option value="OH">OH</option>
          <option value="OK">OK</option>
          <option value="OR">OR</option>
          <option value="PA">PA</option>
          <option value="RI">RI</option>
          <option value="SC">SC</option>
          <option value="SD">SD</option>
          <option value="TN">TN</option>
          <option value="TX">TX</option>
          <option value="UT">UT</option>
          <option value="VT">VT</option>
          <option value="VA">VA</option>
          <option value="WA">WA</option>
          <option value="WV">WV</option>
          <option value="WI">WI</option>
          <option value="WY">WY</option>
        </select>
        <input style="margin-bottom: 10px"class="btn" type="submit" value="Search"/>
      </form>
      <script src="http://code.jquery.com/jquery-latest.js"></script>
      <script>
        $(document).ready(function(){
            $.ajaxSetup ({
                cache: false
            });
            var ajax_load = "<img src='loader.gif'/>";
            $("#searchForm").submit(function(e){
              e.preventDefault();
              var firstterm = $('input[name=first]').val();
              var lastterm = $('input[name=last]').val();
              var streetterm = $('input[name=street]').val();
              var stateterm = $('select[name=state]').val();
              var streetterm = streetterm.replace(/ /g, "_");
              var loadUrl = "search.php?first=" + firstterm + "&last=" + lastterm + "&street=" + streetterm + "&state=" + stateterm;
              $("#searchcontainer").html(ajax_load).load(loadUrl);
            });
        });
        </script>
        <div id="searchcontainer">
        </div>
    </div>
</div> <!-- /container -->
</body>
</html>
