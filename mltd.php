<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
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

  <h3 class="header center"> MiriTools Alpha 3 </h3>
  <div class="center">
    Collection of Mirishita-related tools and Information. <br>
    Made by @seiren_seirent
  </div>
  <?php
  $event = json_decode(file_get_contents("https://api.matsurihi.me/mltd/v1/events"),true);
  $current = end($event);
  $ranks = json_decode(file_get_contents("https://api.matsurihi.me/mltd/v1/events/$current[id]/rankings/logs/eventPoint/1,2,3,100,2500,5000,10000,25000,50000,100000"),true);
  $time = end($ranks['0']['data'])
   ?>


  <h3 class="header center"> Event Information </h3>
  <div class="row">
    <div class="col l6 m6 s12 ">
      <h5 class="header center">Current Event</h5>

      <div class="card grey">
        <div class="card-content white-text">
          <span class="card-title">
            <?php echo $current['name']  ?> </span>
          <?php echo "Starts At: ", $current['schedule']['beginDate'], "<br>",
            "Ends At: ", $current['schedule']['endDate'], "<br>",
            "Page Ends At: ", $current['schedule']['pageEndDate'];
              ?>
        </div>
      </div>
    </div>
    <div class="col l6 m6 s12 ">
      <h5 class="header center">Rankings</h5>
      <div class="card blue">
        <div class="card-content white-text">
          <span class="card-title"> Event Points @
            <?php echo date("d M, Y h:i",strtotime(date($time['summaryTime'])))," JST";?> </span>
          <?php
          if (count($ranks) == 0){
            echo "No rankings available for this event.";
          }
          ?>
          <table class="centered white-text">
            <thead>
              <tr>
                <th>Rank</th>
                <th></th>
                <th>Score</th>
              </tr>
            </thead>
          <tbody>

              <?php
              foreach ($ranks as $rankdat){
            echo "<tr>";
            echo "<td>",$rankdat['rank'],"<td>";
            $latestrank = end($rankdat['data']);
            echo "<td>",$latestrank['score'],"</td>";
            echo "</tr>"
          ;}
           ?>
         </tbody>
       </table>
        </div>
      </div>
    </div>
  </div>

  <?php $url = "https://api.matsurihi.me/mltd/v1/version/latest";
        $verdat = json_decode(file_get_contents($url),true);
   ?>
  <div class="row">
    <div class="col s12 m6 l6">
      <div class="card orange">
        <div class="card-content white-text">
          <span class="card-title"> App Information </span>
          Current Version :
          <?php echo $verdat['app']['version']; ?> <br>
          Last Updated :
          <?php echo date("d M, Y h:i",strtotime(date($verdat['app']['updateTime']))); ?> JST
        </div>
      </div>
    </div>
    <div class="col s12 m6 l6">
      <div class="card green">
        <div class="card-content white-text">
          <span class="card-title"> Resource Information </span>
          Current Version :
          <?php echo $verdat['res']['version']; ?> <br>
          Last Updated :
          <?php echo date("d M, Y h:i",strtotime(date($verdat['app']['updateTime']))); ?> JST
        </div>
      </div>
    </div>
  </div>


  <h3 class="header center"> Lounge Tools </h3>
  <div class="row ">
    <form method="post" action="lounge.php">
      <div class="col s12 m6 l6">
        <div class="card white">
          <div class="card-content black-text">
            <span class="card-title">Lounge Information</span>
            <p>Search for lounge information using 8 character ID. <br>
              Example : M4U2ES9C <br> </p>
            <br>
            <div class="input-field">
              <input type="text" maxlength="8" name="loungeID">
              <label for="loungeID">Lounge ID</label>
            </div>
          </div>
          <div class="card-action">
            <button class="waves-effect waves-teal btn-flat" type="submit" name="action">Search
            </button>
          </div>
        </div>
      </div>
    </form>
    <form method="post" action="loungeSearch.php">
      <div class="col s12 m6 l6">
        <div class="card white">
          <div class="card-content black-text">
            <span class="card-title">Lounge Search (WIP)</span>
            <p>Search lounge names <br>
              Example : シアターでガチャ引く <br> </p>
            <br>
            <div class="input-field">
              <input type="text" name="loungeSearch">
              <label for="loungeSearch">Lounge Keyword</label>
            </div>
          </div>
          <div class="card-action">
            <button class="waves-effect waves-teal btn-flat" type="submit" name="action">Search
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <footer class="page-footer pink">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">MiriTools Alpha</h5>
          Made with love using <b>Princess API</b> and <b>Materialize</b>
        </div>
        <div class="col l4 offset-l2 s12">
          <h5 class="white-text">Learn More</h5>
          <ul>
            <li><a class="grey-text text-lighten-3" href="https://materializecss.com/">Materialize</a></li>
            <li><a class="grey-text text-lighten-3" href="https://api.matsurihi.me/docs/">Princess API</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
        All copytighted contents belongs to it's original owners
      </div>
    </div>

  </footer>
  <?php echo error_get_last() ?>
</body>

</html>
