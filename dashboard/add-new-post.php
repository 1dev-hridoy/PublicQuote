<?php
ob_start();
session_start();
include_once '../server/dbcon.php';
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php';

// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: sign-in.php");
    exit;
}

// Fetch categories from the database
try {
    $stmt = $pdo->query("SELECT * FROM category ORDER BY name");
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Error fetching categories: " . $e->getMessage();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quoteText = trim($_POST['quoteText']);
    $author = trim($_POST['author']);
    $categoryId = $_POST['category'];
    $status = $_POST['status'];
    $tags = trim($_POST['tags']);
    $source = trim($_POST['source']);
    $context = trim($_POST['context']);
    $publishedBy = $_SESSION['username'];

    // Validate inputs
    if (empty($quoteText) || empty($author) || empty($categoryId)) {
        $error = "Quote text, author, and category are required.";
    } else {
        try {
            // Insert the quote into the database
            $stmt = $pdo->prepare("INSERT INTO quotes (quote_text, author, category_id, status, tags, source, context, published_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$quoteText, $author, $categoryId, $status, $tags, $source, $context, $publishedBy]);

            // Redirect to posts page or show success modal
            header("Location: posts.php");
            exit;
        } catch (PDOException $e) {
            $error = "Error saving quote: " . $e->getMessage();
        }
    }
}
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
                <a href="posts.php" class="btn btn-outline-secondary me-2">
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
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form id="quoteForm" method="POST" action="">
                            <!-- Quote Text -->
                            <div class="mb-4">
                                <label for="quoteText" class="form-label">Quote Text <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="quoteText" name="quoteText" rows="4" placeholder="Enter the quote text" required></textarea>
                                <div class="form-text">Enter the inspirational quote you want to share.</div>
                            </div>

                            <!-- Author -->
                            <div class="mb-4">
                                <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="e.g. Albert Einstein" required>
                                <div class="form-text">Enter the name of the person who said or wrote this quote.</div>
                            </div>

                            <div class="row">
                                <!-- Category -->
                                <div class="col-md-6 mb-4">
                                    <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="" selected disabled>Select a category</option>
                                        <?php foreach ($categories as $category): ?>
                                            <option value="<?php echo $category['id']; ?>"><?php echo htmlspecialchars($category['name']); ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="form-text">Select the category that best fits this quote.</div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6 mb-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="PUBLISHED" selected>Published</option>
                                        <option value="DRAFT">Draft</option>
                                    </select>
                                    <div class="form-text">Set the publication status of this quote.</div>
                                </div>
                            </div>

                            <!-- Tags -->
                            <div class="mb-4">
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter tags separated by commas">
                                <div class="form-text">Add tags to help categorize and find your quote (comma separated).</div>
                            </div>

                            <!-- Source -->
                            <div class="mb-4">
                                <label for="source" class="form-label">Source</label>
                                <input type="text" class="form-control" id="source" name="source" placeholder="e.g. Book title, speech, interview">
                                <div class="form-text">Where did this quote come from? (Optional)</div>
                            </div>

                            <!-- Context -->
                            <div class="mb-4">
                                <label for="context" class="form-label">Context</label>
                                <textarea class="form-control" id="context" name="context" rows="3" placeholder="Add background information or context for this quote"></textarea>
                                <div class="form-text">Provide additional context or background information about this quote. (Optional)</div>
                            </div>

                            <div class="form-card-footer">
                                <div>
                                    <button type="submit" class="btn btn-outline-secondary me-2" name="status" value="DRAFT">
                                        <i class="bi bi-save me-2"></i>Save as Draft
                                    </button>
                                </div>
                                <button type="submit" class="btn btn-primary" name="status" value="PUBLISHED">
                                    <i class="bi bi-check-circle me-2"></i>Publish Quote
                                </button>
                            </div>
                        </form>
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

<script src="../assets/js/add-new-post.js"></script>
<?php
include_once 'includes/footer.php';
?>