<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
           
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url("dashboard/dashboard")?>">
              <i class="fa fa-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#consultancy" aria-expanded="false" aria-controls="consultancy">
            <i class="fa-solid fa-folder"></i>&nbsp;&nbsp;&nbsp;
              <span class="menu-title">Consultancy</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="consultancy">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="<?=base_url("consultancy/showconsultancy")?>">Show consultancy</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url("consultancy/addclasses")?>">Add classes</a></li>
                 <li class="nav-item"> <a class="nav-link" href="<?=base_url("consultancy/showclasses")?>">Show class</a></li>
                 </ul>
              </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#mail" aria-expanded="false" aria-controls="mail">
            <i class="fa-solid fa-folder"></i>&nbsp;&nbsp;&nbsp;
              <span class="menu-title">Mail</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="mail">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="<?=base_url("mail/mail.php")?>">Mail</a></li>
               
                 
                 </ul>
              </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#events" aria-expanded="false" aria-controls="consultancy">
            <i class="fa-solid fa-folder"></i>&nbsp;&nbsp;&nbsp;
              <span class="menu-title">Events</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="events">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="<?=base_url("events/addevents")?>">Add Events</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?=base_url("events/showevents")?>">Show Events</a></li>
                 
                 </ul>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-advanced" aria-expanded="false" aria-controls="ui-advanced">
            <i class="fa-solid fa-folder"></i>&nbsp;&nbsp;&nbsp;
              <span class="menu-title">Change password</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-advanced">
              <ul class="nav flex-column sub-menu">

                <li class="nav-item"> <a class="nav-link" href="<?=base_url("password/changepass")?>">Change Password </a></li>
 
                 
 
               </ul>
            </div>
          </li>
       
        </ul>
      </nav>
      <!-- partial -->