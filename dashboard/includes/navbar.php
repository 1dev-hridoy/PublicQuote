<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <button class="navbar-toggler me-2" type="button" id="sidebar-toggle">
        <i class="bi bi-list"></i>
      </button>
      <a class="navbar-brand" href="#">QuoteDash</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <i class="bi bi-three-dots-vertical"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
          <li class="nav-item me-2">
            <div class="theme-toggle" id="theme-toggle">
              <i class="bi bi-sun-fill" id="theme-icon"></i>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="notificationsDropdown" role="button" data-bs-toggle="dropdown">
              <i class="bi bi-bell"></i>
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                3
              </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
              <li><a class="dropdown-item" href="#">New quote request</a></li>
              <li><a class="dropdown-item" href="#">Your quote was viewed 50 times</a></li>
              <li><a class="dropdown-item" href="#">New comment on your quote</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
              <div class="user-dropdown">
                <div class="user-avatar">JS</div>
                <div class="user-info d-none d-sm-flex">
                  <span class="user-name">John Smith</span>
                  <span class="user-role">Admin</span>
                </div>
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right me-2"></i>Sign Out</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>