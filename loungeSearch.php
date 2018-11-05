<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title> MiriTools </title>
  <css>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  </css>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<body>
<nav class="pink" role="navigation">
  <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo center">MiriTools</a>
  </div>
</nav>
<?php
  header('Content-type: text/html; charset=utf-8');
  $query = $_POST['loungeSearch'];
  $url = "https://api.matsurihi.me/mltd/v1/lounges/search?name=$query";
  $data = json_decode(file_get_contents($url),true);
  ?>
<h3 class="header center"> Search Results </h3>
<div class="row">
<?php foreach($data as $val) {
  echo
    '
      <div class="col s12 m6 l6">
        <div class="card purple">
          <div class="card-content white-text">
          <span class="card-title yellow-text">' , $val['name'] ,'</span>
            <p>
            ID: ',$val['viewerId'],'<br>
            Date: ',date("d M, Y h:i",strtotime(date($val['updateTime']))),'</li>

            </p>
          </div>
        </div>
      </div>
    '
    ;
}
 ?>
</div>
<div class="row">
  <div class="col m12 s5">
    <a class="waves-effect waves-light btn" href=mltd.php><i class="material-icons left">chevron_left</i>Back</a>
  </div>
</div>
</body>
</html>
