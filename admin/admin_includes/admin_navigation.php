<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.html">ArtRegalia Administration</a>
      </div>

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="../index.php"><i class="fa fa-home fa-fw"></i> Website</a></li>
      </ul>

      <ul class="nav navbar-right navbar-top-links">
        <li class="dropdown navbar-inverse">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
          </a>
          <ul class="dropdown-menu dropdown-alerts">
            <li>
              <a href="#">
                <div>
                  <i class="fa fa-comment fa-fw"></i> New Comment
                  <span class="pull-right text-muted small">4 minutes ago</span>
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div>
                  <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                  <span class="pull-right text-muted small">12 minutes ago</span>
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div>
                  <i class="fa fa-envelope fa-fw"></i> Message Sent
                  <span class="pull-right text-muted small">4 minutes ago</span>
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div>
                  <i class="fa fa-tasks fa-fw"></i> New Task
                  <span class="pull-right text-muted small">4 minutes ago</span>
                </div>
              </a>
            </li>
            <li>
              <a href="#">
                <div>
                  <i class="fa fa-upload fa-fw"></i> Server Rebooted
                  <span class="pull-right text-muted small">4 minutes ago</span>
                </div>
              </a>
            </li>
            
          </ul>
        </li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> hady <b class="caret"></b>
          </a>
          <ul class="dropdown-menu dropdown-user">
            <li>
              <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- /.navbar-top-links -->
    </nav>

    <aside class="sidebar navbar-default" role="navigation">
      <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
          <li class="sidebar-search">
            <div class="input-group custom-search-form">
              <input type="text" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
            <!-- /input-group -->
          </li>
          <li>
            <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
          </li>
          <li>
            <a href="#"><i class="fa fa-users fa-fw"></i> Users<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="sign_up_requests.php">Sign-up Requests</a>
              </li>
              <li>
                <a href="artisans.php">Artisans</a>
              </li>
              <li>
                <a href="customers.php">Customers</a>
              </li>
              <li>
                <a href="operations.php">Operations</a>
              </li>
              <li>
                <a href="view_all_users.php">View all users</a>
              </li>
              <li>
                <a href="add_user.php">Add user</a>
              </li>
            </ul>
            

          </li>
          <li>
            <a href="#"><i class="fa  fa-list-alt fa-fw"></i> Categories<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="categories.php">View all Categories</a>
              </li>
            </ul>
            
            <li>
            <a href="#"><i class="fa  fa-cubes fa-fw"></i> Products<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="categories.php">View all Products</a>
              </li>
            </ul>
          </li>

          </li>
          <li>
            <a href="#"><i class="fa fa-pencil-square-o fa-fw"></i> Posts<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="view_all_posts.php">View all Posts</a>
              </li>
              <li>
                <a href="offers.php">Offers</a>
              </li>
              <li>
                <a href="events.php">Events</a>
              </li>
              <li>
                <a href="add_post.php">Add a Post</a>
              </li>
            </ul>
            

          </li>
          <li>
            <a href="#"><i class="fa fa-comments fa-fw"></i> Comments<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="categories.php">View all Comments</a>
              </li>
            </ul>
            
          </li>
          <li>
            <a href="#"><i class="fa fa-file-text-o fa-fw"></i> Reports<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="view_all_reports.php">View all reports</a>
              </li>
            </ul>
          
          </li>
          <li>
            <a href="#"><i class="fa fa-ticket fa-fw"></i> Tickets<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
              <li>
                <a href="view_all_tickets.php">View all Tickets</a>
              </li>
            </ul>
          
          </li>
          <li>
            <a href="tables.html"><i class="fa fa-truck fa-fw"></i> Orders</a>
          </li>
          
        </ul>
      </div>
    </aside>