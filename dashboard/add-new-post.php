<?php
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';
?>
<link rel="stylesheet" href="../assets/css/dashboard/add-new-post.css">

  <!-- Main Content -->
  <div class="main-content" id="main-content">
    <div class="container-fluid">
      <!-- Page Header -->
      <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
        <div>
          <h1 class="h3 mb-1">Add New Quote</h1>
          <p class="text-muted">Create and publish a new inspirational quote</p>
        </div>
        <div>
          <a href="posts.html" class="btn btn-outline-secondary me-2">
            <i class="bi bi-arrow-left me-2"></i>Back to Posts
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <!-- Main Form Card -->
          <div class="form-card mb-4">
            <div class="form-card-header">
              <h5 class="mb-0">Quote Information</h5>
            </div>
            <div class="form-card-body">
              <form id="quoteForm">
                <!-- Quote Text -->
                <div class="mb-4">
                  <label for="quoteText" class="form-label">Quote Text <span class="text-danger">*</span></label>
                  <textarea class="form-control" id="quoteText" rows="4" placeholder="Enter the quote text"></textarea>
                  <div class="form-text">Enter the inspirational quote you want to share.</div>
                </div>

                <!-- Author -->
                <div class="mb-4">
                  <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="author" placeholder="e.g. Albert Einstein">
                  <div class="form-text">Enter the name of the person who said or wrote this quote.</div>
                </div>

                <div class="row">
                  <!-- Category -->
                  <div class="col-md-6 mb-4">
                    <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                    <select class="form-select" id="category">
                      <option value="" selected disabled>Select a category</option>
                      <option value="inspiration">Inspiration</option>
                      <option value="motivation">Motivation</option>
                      <option value="philosophy">Philosophy</option>
                      <option value="leadership">Leadership</option>
                      <option value="dreams">Dreams</option>
                      <option value="success">Success</option>
                      <option value="happiness">Happiness</option>
                      <option value="life">Life</option>
                      <option value="love">Love</option>
                      <option value="friendship">Friendship</option>
                    </select>
                    <div class="form-text">Select the category that best fits this quote.</div>
                  </div>

                  <!-- Status -->
                  <div class="col-md-6 mb-4">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status">
                      <option value="published" selected>Published</option>
                      <option value="draft">Draft</option>
                    </select>
                    <div class="form-text">Set the publication status of this quote.</div>
                  </div>
                </div>

                <!-- Tags -->
                <div class="mb-4">
                  <label for="tags" class="form-label">Tags</label>
                  <input type="text" class="form-control" id="tags" placeholder="Enter tags separated by commas">
                  <div class="form-text">Add tags to help categorize and find your quote (comma separated).</div>
                </div>

                <!-- Source -->
                <div class="mb-4">
                  <label for="source" class="form-label">Source</label>
                  <input type="text" class="form-control" id="source" placeholder="e.g. Book title, speech, interview">
                  <div class="form-text">Where did this quote come from? (Optional)</div>
                </div>

                <!-- Context -->
                <div class="mb-4">
                  <label for="context" class="form-label">Context</label>
                  <textarea class="form-control" id="context" rows="3" placeholder="Add background information or context for this quote"></textarea>
                  <div class="form-text">Provide additional context or background information about this quote. (Optional)</div>
                </div>
              </form>
            </div>
            <div class="form-card-footer">
              <div>
                <button type="button" class="btn btn-outline-secondary me-2" id="saveAsDraft">
                  <i class="bi bi-save me-2"></i>Save as Draft
                </button>
              </div>
              <button type="button" class="btn btn-primary" id="publishBtn">
                <i class="bi bi-check-circle me-2"></i>Publish Quote
              </button>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <!-- Preview Card -->
          <div class="form-card mb-4">
            <div class="form-card-header">
              <h5 class="mb-0">Preview</h5>
            </div>
            <div class="form-card-body">
              <div class="preview-card">
                <div class="preview-card-header">
                  <span class="preview-card-category" id="previewCategory">Category</span>
                </div>
                <div class="preview-card-body">
                  <h5 class="preview-card-title" id="previewQuote">Your quote will appear here...</h5>
                  <p class="preview-card-author" id="previewAuthor">Author name</p>
                  <div class="preview-card-content" id="previewContext">Additional context will appear here...</div>
                </div>
                <div class="preview-card-footer">
                  <span class="preview-card-date">Just now</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Tips Card -->
          <div class="form-card">
            <div class="form-card-header">
              <h5 class="mb-0">Tips for Great Quotes</h5>
            </div>
            <div class="form-card-body">
              <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent border-bottom border-light-subtle">
                  <i class="bi bi-check-circle-fill text-success me-2"></i>
                  Verify the accuracy of the quote and its attribution
                </li>
                <li class="list-group-item bg-transparent border-bottom border-light-subtle">
                  <i class="bi bi-check-circle-fill text-success me-2"></i>
                  Add context to help readers understand the quote's significance
                </li>
                <li class="list-group-item bg-transparent border-bottom border-light-subtle">
                  <i class="bi bi-check-circle-fill text-success me-2"></i>
                  Use relevant tags to improve discoverability
                </li>
                <li class="list-group-item bg-transparent">
                  <i class="bi bi-check-circle-fill text-success me-2"></i>
                  Include the original source when available
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Success Modal -->
  <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Success!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center py-4">
          <i class="bi bi-check-circle-fill text-success" style="font-size: 3rem;"></i>
          <h4 class="mt-3">Quote Published Successfully</h4>
          <p class="text-muted">Your quote has been published and is now visible to everyone.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="posts.html" class="btn btn-primary">View All Posts</a>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/add-new-post.js"></script>





<?php
include_once 'includes/footer.php';
?>