 <div class="row">
        <div class="col-xs-12">
          <nav class="navbar navbar-inverse navbar-embossed" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <a class="navbar-brand" href=".">SLKPKH</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav navbar-left">
                <li><a href="semak.php">SEMAK LAPORAN</a></li>
                <li><a href="rekod.php">REKOD HUKUMAN</a></li>
              </ul>
               <ul class="nav navbar-nav navbar-right">
                 <li class="dropdown">
                  <a href="./" class="dropdown-toggle" data-toggle="dropdown"><?php echo ucwords($name); ?><b class="caret"></b></a>
                  <span class="dropdown-arrow"></span>
                  <ul class="dropdown-menu">
                    <li><a href="./">View Profile</a></li>
                    <li><a href="edit_profile.php">Edit Account</a></li>
                    <li class="divider"></li>
                    <li><a href="../../logout.php">Logout</a></li>
                  </ul>
                </li>
              </ul>

            </div><!-- /.navbar-collapse -->
          </nav><!-- /navbar -->
        </div>
      </div> <!-- /row -->