<!-- Slippr is (C) 2019, Andrew Grillet, Released under GPL2.0 -->
<!-- Slippr - a Bootstrap based Framework -->

 <form class="navbar-form navbar-inverse" action="/index.php" method="post">
   <div class="container-fluid">
    <div class="button-group btn-group-justified">
      <input class="nav-pills btn-primary" type="submit" name="ctxt" value="Home">Home
      </input>
      <input class="nav-pills  btn-primary" type="submit" name="ctxt"value="Default">Default
      </input>


<?php

// The jiggery-pokery here hides the debug options unless user is super
if ((isset($_SESSION['super'])) && ($_SESSION['super'] == 't'))
   {
?>
      <input class="nav-pills  btn-primary" type="submit" name="ctxt" value="Debug">Debug
      </input>
      <input class="nav-pills  btn-primary" type="submit" name="ctxt" value="NoDebug">NoDebug
      </input>
<?php
   };
?>
      <input class="nav-pills  btn-primary" type="submit" name="ctxt" value="Myself">Myself
      </input>
      <input class="nav-pills  btn-primary" type="submit" name="ctxt" value="Logout">Logout
      </input>

    </div>
  </div>
</form> 


