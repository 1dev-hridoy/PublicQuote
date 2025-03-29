<?php
session_start();
include_once '../server/dbcon.php';
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';
?>

<link rel="stylesheet" href="../assets/css/dashboard/posts.css">


  <!-- Main Content -->
  <div class="main-content" id="main-content">
    <div class="container-fluid">
      <!-- Page Header -->
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
          <h1 class="h3 mb-1">Posts</h1>
          <p class="text-muted">Manage your quotes and inspirational content</p>
        </div>
        <div>
          <button class="btn btn-primary">
            <i class="bi bi-plus-lg me-md-2"></i><span class="d-none d-md-inline">New Post</span>
          </button>
        </div>
      </div>

      <!-- Filter Bar -->
      <div class="filter-bar">
        <div class="row g-2 align-items-center">
          <div class="col-12 col-md-4">
            <div class="input-group">
              <span class="input-group-text border-end-0"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control border-start-0" placeholder="Search posts...">
            </div>
          </div>
          <div class="col-6 col-md-2">
            <select class="form-select">
              <option selected>All Categories</option>
              <option>Inspiration</option>
              <option>Motivation</option>
              <option>Philosophy</option>
              <option>Leadership</option>
              <option>Dreams</option>
            </select>
          </div>
          <div class="col-6 col-md-2">
            <select class="form-select">
              <option selected>All Time</option>
              <option>Today</option>
              <option>This Week</option>
              <option>This Month</option>
              <option>This Year</option>
            </select>
          </div>
          <div class="col-6 col-md-2">
            <select class="form-select">
              <option selected>Sort By: Newest</option>
              <option>Sort By: Oldest</option>
              <option>Sort By: Popular</option>
              <option>Sort By: A-Z</option>
            </select>
          </div>
          <div class="col-6 col-md-2 d-flex justify-content-end">
            <div class="btn-group view-toggle" role="group">
              <button type="button" class="btn active" id="grid-view-btn">
                <i class="bi bi-grid"></i>
              </button>
              <button type="button" class="btn" id="list-view-btn">
                <i class="bi bi-list-ul"></i>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Grid View -->
      <div id="grid-view">
        <div class="row g-3 mb-4">
          <!-- Post 1 -->
          <div class="col-12 col-md-6 col-xl-4 post-card-container">
            <input type="checkbox" class="form-check-input post-card-checkbox" id="post1">
            <div class="post-card">
              <div class="post-card-header">
                <span class="post-card-category">Inspiration</span>
                <div class="dropdown">
                  <button class="btn btn-sm btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>View</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-share me-2"></i>Share</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                  </ul>
                </div>
              </div>
              <div class="post-card-body">
                <h5 class="post-card-title">The greatest glory in living lies not in never falling, but in rising every time we fall.</h5>
                <p class="post-card-author">By Nelson Mandela</p>
                <p class="post-card-content">Success is not final, failure is not fatal: It is the courage to continue that counts. The greatest glory in living lies not in never falling, but in rising every time we fall.</p>
                <div class="post-card-stats">
                  <span><i class="bi bi-eye"></i>2,345</span>
                  <span><i class="bi bi-heart"></i>128</span>
                  <span><i class="bi bi-chat"></i>24</span>
                </div>
              </div>
              <div class="post-card-footer">
                <span class="post-card-date">Published Mar 15, 2023</span>
                <div class="post-card-actions">
                  <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                  <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </div>
              </div>
            </div>
          </div>

          <!-- Post 2 -->
          <div class="col-12 col-md-6 col-xl-4 post-card-container">
            <input type="checkbox" class="form-check-input post-card-checkbox" id="post2">
            <div class="post-card">
              <div class="post-card-header">
                <span class="post-card-category">Motivation</span>
                <div class="dropdown">
                  <button class="btn btn-sm btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-eye me-2"></i>View</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-share me-2"></i>Share</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="#"><i class="bi bi-trash me-2"></i>Delete</a></li>
                  </ul>
                </div>
              </div>
              <div class="post-card-body">
                <h5 class="post-card-title">Your time is limited, so don't waste it living someone else's life.</h5>
                <p class="post-card-author">By Steve Jobs</p>
                <p class="post-card-content">Your time is limited, so don't waste it living someone else's life. Don't be trapped by dogma – which is living with the results of other people's thinking.</p>
                <div class="post-card-stats">
                  <span><i class="bi bi-eye"></i>1,987</span>
                  <span><i class="bi bi-heart"></i>95</span>
                  <span><i class="bi bi-chat"></i>18</span>
                </div>
              </div>
              <div class="post-card-footer">
                <span class="post-card-date">Published Apr 2, 2023</span>
                <div class="post-card-actions">
                  <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                  <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                </div>
              </div>
            </div>
          </div>

      <!-- List View (Hidden by default) -->
      <div id="list-view" style="display: none;">
        <div class="mb-4">
          <!-- Post 1 -->
          <div class="post-list-item">
            <input type="checkbox" class="form-check-input post-list-checkbox" id="list-post1">
            <div class="post-list-content">
              <div class="row">
                <div class="col-12 col-lg-6">
                  <h5 class="post-card-title">The greatest glory in living lies not in never falling, but in rising every time we fall.</h5>
                  <p class="post-card-author">By Nelson Mandela</p>
                  <span class="post-card-category">Inspiration</span>
                </div>
                <div class="col-12 col-lg-3">
                  <div class="post-card-stats mb-2">
                    <span class="me-3"><i class="bi bi-eye"></i> 2,345</span>
                    <span class="me-3"><i class="bi bi-heart"></i> 128</span>
                    <span><i class="bi bi-chat"></i> 24</span>
                  </div>
                  <span class="post-card-date">Published Mar 15, 2023</span>
                </div>
                <div class="col-12 col-lg-3 d-flex align-items-center justify-content-lg-end mt-2 mt-lg-0">
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                    <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Post 2 -->
          <div class="post-list-item">
            <input type="checkbox" class="form-check-input post-list-checkbox" id="list-post2">
            <div class="post-list-content">
              <div class="row">
                <div class="col-12 col-lg-6">
                  <h5 class="post-card-title">Your time is limited, so don't waste it living someone else's life.</h5>
                  <p class="post-card-author">By Steve Jobs</p>
                  <span class="post-card-category">Motivation</span>
                </div>
                <div class="col-12 col-lg-3">
                  <div class="post-card-stats mb-2">
                    <span class="me-3"><i class="bi bi-eye"></i> 1,987</span>
                    <span class="me-3"><i class="bi bi-heart"></i> 95</span>
                    <span><i class="bi bi-chat"></i> 18</span>
                  </div>
                  <span class="post-card-date">Published Apr 2, 2023</span>
                </div>
                <div class="col-12 col-lg-3 d-flex align-items-center justify-content-lg-end mt-2 mt-lg-0">
                  <div class="btn-group">
                    <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-eye"></i></button>
                    <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-pencil"></i></button>
                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- More list items... -->
          <!-- Posts 3-6 would follow the same pattern -->
        </div>
      </div>

      <!-- Pagination -->
      <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>

  <!-- Bulk Actions Bar -->
  <div class="bulk-actions" id="bulk-actions">
    <div>
      <span class="fw-bold">3 items selected</span>
    </div>
    <div class="btn-group">
      <button class="btn btn-outline-secondary">
        <i class="bi bi-archive me-md-2"></i><span class="d-none d-md-inline">Archive</span>
      </button>
      <button class="btn btn-outline-secondary">
        <i class="bi bi-tag me-md-2"></i><span class="d-none d-md-inline">Tag</span>
      </button>
      <button class="btn btn-outline-danger">
        <i class="bi bi-trash me-md-2"></i><span class="d-none d-md-inline">Delete</span>
      </button>
    </div>
  </div>

 
<script src="../assets/js/posts.js"></script>


<?php
include_once 'includes/footer.php';
?>
