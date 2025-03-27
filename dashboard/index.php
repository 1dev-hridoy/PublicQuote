<?php
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';
?>
  <div class="main-content" id="main-content">
    <div class="container-fluid">
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <h1 class="h3 mb-2 mb-sm-0">Dashboard</h1>
        <div class="d-flex gap-2">
          <div class="dropdown d-md-none">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown">
              <i class="bi bi-filter"></i> Filter
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Week</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">All Time</a></li>
            </ul>
          </div>
          <div class="btn-group d-none d-md-flex">
            <button class="btn btn-outline-secondary active">Today</button>
            <button class="btn btn-outline-secondary">Week</button>
            <button class="btn btn-outline-secondary">Month</button>
            <button class="btn btn-outline-secondary">All</button>
          </div>
          <button class="btn btn-primary">
            <i class="bi bi-plus-lg me-md-2"></i><span class="d-none d-md-inline">New Quote</span>
          </button>
        </div>
      </div>

      <!-- Stats Cards -->
      <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
          <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="icon quotes">
                <i class="bi bi-quote"></i>
              </div>
              <div class="dropdown">
                <button class="btn btn-sm btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">View Details</a></li>
                  <li><a class="dropdown-item" href="#">Export Data</a></li>
                </ul>
              </div>
            </div>
            <h3>248</h3>
            <div class="d-flex justify-content-between align-items-center">
              <p>Total Quotes</p>
              <span class="badge bg-success d-flex align-items-center">
                <i class="bi bi-arrow-up me-1"></i>12%
              </span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
          <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="icon views">
                <i class="bi bi-eye"></i>
              </div>
              <div class="dropdown">
                <button class="btn btn-sm btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">View Details</a></li>
                  <li><a class="dropdown-item" href="#">Export Data</a></li>
                </ul>
              </div>
            </div>
            <h3>12,540</h3>
            <div class="d-flex justify-content-between align-items-center">
              <p>Total Views</p>
              <span class="badge bg-success d-flex align-items-center">
                <i class="bi bi-arrow-up me-1"></i>24%
              </span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
          <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="icon requests">
                <i class="bi bi-envelope"></i>
              </div>
              <div class="dropdown">
                <button class="btn btn-sm btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">View Details</a></li>
                  <li><a class="dropdown-item" href="#">Export Data</a></li>
                </ul>
              </div>
            </div>
            <h3>142</h3>
            <div class="d-flex justify-content-between align-items-center">
              <p>Total Requests</p>
              <span class="badge bg-success d-flex align-items-center">
                <i class="bi bi-arrow-up me-1"></i>8%
              </span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
          <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="icon total-views">
                <i class="bi bi-graph-up"></i>
              </div>
              <div class="dropdown">
                <button class="btn btn-sm btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#">View Details</a></li>
                  <li><a class="dropdown-item" href="#">Export Data</a></li>
                </ul>
              </div>
            </div>
            <h3>+24%</h3>
            <div class="d-flex justify-content-between align-items-center">
              <p>Growth Rate</p>
              <span class="badge bg-success d-flex align-items-center">
                <i class="bi bi-arrow-up me-1"></i>5%
              </span>
            </div>
          </div>
        </div>
      </div>

      <!-- Popular Quotes Table -->
      <div class="row">
        <div class="col-12">
          <div class="quotes-table">
            <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
              <h5 class="mb-0">Top 5 Popular Quotes</h5>
              <div class="d-flex gap-2">
                <div class="input-group input-group-sm d-none d-md-flex" style="width: 200px;">
                  <input type="text" class="form-control" placeholder="Search quotes...">
                  <button class="btn btn-outline-secondary" type="button">
                    <i class="bi bi-search"></i>
                  </button>
                </div>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Quote</th>
                    <th>Author</th>
                    <th class="hide-on-mobile">Category</th>
                    <th>Views</th>
                    <th class="hide-on-mobile">Date Added</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-truncate" style="max-width: 300px;">The greatest glory in living lies not in never falling, but in rising every time we fall.</td>
                    <td>Nelson Mandela</td>
                    <td class="hide-on-mobile">Inspiration</td>
                    <td><span class="badge-views">2,345</span></td>
                    <td class="hide-on-mobile">Mar 15, 2023</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-truncate" style="max-width: 300px;">Your time is limited, so don't waste it living someone else's life.</td>
                    <td>Steve Jobs</td>
                    <td class="hide-on-mobile">Motivation</td>
                    <td><span class="badge-views">1,987</span></td>
                    <td class="hide-on-mobile">Apr 2, 2023</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-truncate" style="max-width: 300px;">The future belongs to those who believe in the beauty of their dreams.</td>
                    <td>Eleanor Roosevelt</td>
                    <td class="hide-on-mobile">Dreams</td>
                    <td><span class="badge-views">1,756</span></td>
                    <td class="hide-on-mobile">Jan 10, 2023</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-truncate" style="max-width: 300px;">It is during our darkest moments that we must focus to see the light.</td>
                    <td>Aristotle</td>
                    <td class="hide-on-mobile">Philosophy</td>
                    <td><span class="badge-views">1,543</span></td>
                    <td class="hide-on-mobile">May 22, 2023</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-truncate" style="max-width: 300px;">Do not go where the path may lead, go instead where there is no path and leave a trail.</td>
                    <td>Ralph Waldo Emerson</td>
                    <td class="hide-on-mobile">Leadership</td>
                    <td><span class="badge-views">1,298</span></td>
                    <td class="hide-on-mobile">Feb 8, 2023</td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include_once 'includes/footer.php';
?>