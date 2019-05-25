    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href='<?php echo $root_layouts ?>home.php'>
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="far fa-lightbulb"></i>
        </div>
        <div class="sidebar-brand-text mx-3">MotivIMAC</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href='<?php echo $root_layouts ?>home.php'>
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tableau de bord</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href='<?php echo $root_task ?>read_task.php'>
          <i class="fas fa-tasks"></i>
          <span>Tâches</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href='<?php echo $root_layouts ?>profil.php'>
          <i class="fas fa-user"></i>
          <span>Profil</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
        
      <li class="nav-item">
        <a class="nav-link" href='<?php echo $root_auth ?>logout.php'>
          <i class="fas fa-power-off"></i>
          <span>Déconnexion</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>