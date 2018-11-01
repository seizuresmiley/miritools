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

  <h3 class="header center"> MiriTools Alpha 2 </h3>
  <div class="center">
    Collection of Mirishita-related tools and Information. <br>
    Made by @seiren_seirent

  </div>
  <h3 class="header center"> Event Information </h3>
  <div class="row">
    <div class="col l6 m6 xl6 s12 ">
      <h5 class="header center">Current Event</h5>
  </div>
    <div class="col l6 ">
      <h5 class="header center">Rankings</h5>
    </div>
  </div>
  <br><br>
  <h3 class="header center"> Version Info </h3>
  <?php $url = "https://api.matsurihi.me/mltd/v1/version/latest";
        $verdat = json_decode(file_get_contents($url),true);
   ?>
   <div class="row">
    <div class="col s12 m6 l6">
      <div class="card teal">
        <div class="card-content white-text">
          <span class="card-title"> App Information </span>
          Current Version : <?php echo $verdat['app']['version']; ?> <br>
          Last Updated : <?php echo date("d M, Y h:i",strtotime(date($verdat['app']['updateTime']))); ?> JST
        </div>
      </div>
    </div>


      <div class="col s12 m6 l6">
        <div class="card teal">
          <div class="card-content white-text">
            <span class="card-title"> Resource Information </span>
            Current Version : <?php echo $verdat['res']['version']; ?> <br>
            Last Updated : <?php echo date("d M, Y h:i",strtotime(date($verdat['app']['updateTime']))); ?> JST
          </div>
        </div>
      </div>
    </div>


  <h3 class="header center"> Lounge Tools </h3> <br>
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
            <input type="text" maxlength="8" name="loungeID"  >
            <label for="loungeID">Lounge ID</label>
          </div>
        </div>
        <div class="card-action">
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
          </button>
        </div>
      </div>
    </div>
  </form>
  <form method="post" action="lounge.php">
    <div class="col s12 m6 l6">
      <div class="card white">
        <div class="card-content black-text">
          <span class="card-title">Lounge Search (WIP)</span>
          <p>Search lounge names <br>
            Example : シアターでガチャ引く <br> </p>
            <br>
          <div class="input-field">
            <input type="text" name="loungeKeyword" size="40">
            <label for="loungeKeyword">Lounge Keyword</label>
          </div>
        </div>
        <div class="card-action">
          <button class="btn waves-effect waves-light" type="submit" name="action">Submit
            <i class="material-icons right">send</i>
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
  </body>
</html>
