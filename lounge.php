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
  $loungeID = $_POST['loungeID'];
  $url = "https://api.matsurihi.me/mltd/v1/lounges/$loungeID";
  $data = json_decode(file_get_contents($url),true);
  $history = json_decode(file_get_contents("https://api.matsurihi.me/mltd/v1/lounges/$loungeID/eventHistory"),true)
 ?>
<h3 class="header center"> Result </h3>
      <ul class="collection with-header">
        <li class="collection-header"><h4>Lounge <?php echo $data['viewerId'] ?></h4></li>
        <li class="collection-item">Name: <?php echo $data['name']?></li>
        <li class="collection-item">Comment: <?php echo $data['comment']?></li>
        <li class="collection-item">Owner: <?php echo $data['masterName']?></li>
        <li class="collection-item">Members: <?php echo $data['userCount'],"/",$data['userCountLimit']?></li>
        <li class="collection-item">Fans: <?php echo $data['fan']?></li>
      </ul>

      
<h3 class="header center"> Event Rankings </h3>
<br>
<div class="row">
<?php foreach($history as $val) {
  echo
    '
      <div class="col s12 m6 l6">
        <div class="card teal">
          <div class="card-content black-text">
          <span class="card-title white-text">' , $val['eventName'] ,'</span>
            <p>
            <ul class="collection">
              <li class="collection-item">Rank: ',$val['rank'],'</li>
              <li class="collection-item">Score: ',$val['score'],'</li>
              <li class="collection-item">Date: ',date("d M, Y h:i",strtotime(date($val['summaryTime']))),'</li>

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
