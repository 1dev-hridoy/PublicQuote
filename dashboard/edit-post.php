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

$username = $_SESSION['username'];

// Fetch the quote details
$quoteId = $_GET['id'] ?? null;
if (!$quoteId) {
    header("Location: posts.php");
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT quotes.*, category.name AS category_name 
                           FROM quotes 
                           JOIN category ON quotes.category_id = category.id 
                           WHERE quotes.id = :id AND quotes.published_by = :username");
    $stmt->execute(['id' => $quoteId, 'username' => $username]);
    $quote = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$quote) {
        header("Location: posts.php");
        exit;
    }
} catch (PDOException $e) {
    $error = "Error fetching quote: " . $e->getMessage();
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

    // Validate inputs
    if (empty($quoteText) || empty($author) || empty($categoryId)) {
        $error = "Quote text, author, and category are required.";
    } else {
        try {
            // Update the quote in the database
            $stmt = $pdo->prepare("UPDATE quotes 
                                   SET quote_text = :quoteText, 
                                       author = :author, 
                                       category_id = :categoryId, 
                                       status = :status, 
                                       tags = :tags, 
                                       source = :source, 
                                       context = :context 
                                   WHERE id = :id AND published_by = :username");
            $stmt->execute([
                'quoteText' => $quoteText,
                'author' => $author,
                'categoryId' => $categoryId,
                'status' => $status,
                'tags' => $tags,
                'source' => $source,
                'context' => $context,
                'id' => $quoteId,
                'username' => $username
            ]);

            header("Location: posts.php");
            exit;
        } catch (PDOException $e) {
            $error = "Error updating quote: " . $e->getMessage();
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
                <h1 class="h3 mb-1">Edit Quote</h1>
                <p class="text-muted">Update your inspirational quote</p>
            </div>
            <div>
                <a href="posts.php" class="btn btn-outline-secondary">
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
                        <form method="POST" action="">
                            <!-- Quote Text -->
                            <div class="mb-4">
                                <label for="quoteText" class="form-label">Quote Text <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="quoteText" name="quoteText" rows="4" required><?php echo htmlspecialchars($quote['quote_text']); ?></textarea>
                                <div class="form-text">Enter the inspirational quote you want to share.</div>
                            </div>

                            <!-- Author -->
                            <div class="mb-4">
                                <label for="author" class="form-label">Author <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="author" name="author" value="<?php echo htmlspecialchars($quote['author']); ?>" required>
                                <div class="form-text">Enter the name of the person who said or wrote this quote.</div>
                            </div>

                            <div class="row">
                                <!-- Category -->
                                <div class="col-md-6 mb-4">
                                    <label for="category" class="form-label">Category <span class="text-danger">*</span></label>
                                    <select class="form-select" id="category" name="category" required>
                                        <option value="" disabled>Select a category</option>
                                        <?php
                                        $categories = $pdo->query("SELECT * FROM category ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($categories as $category) {
                                            $selected = $quote['category_id'] == $category['id'] ? 'selected' : '';
                                            echo "<option value='{$category['id']}' $selected>{$category['name']}</option>";
                                        }
                                        ?>
                                    </select>
                                    <div class="form-text">Select the category that best fits this quote.</div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6 mb-4">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status">
                                        <option value="PUBLISHED" <?php echo $quote['status'] == 'PUBLISHED' ? 'selected' : ''; ?>>Published</option>
                                        <option value="DRAFT" <?php echo $quote['status'] == 'DRAFT' ? 'selected' : ''; ?>>Draft</option>
                                    </select>
                                    <div class="form-text">Set the publication status of this quote.</div>
                                </div>
                            </div>

                            <!-- Tags -->
                            <div class="mb-4">
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags" value="<?php echo htmlspecialchars($quote['tags']); ?>">
                                <div class="form-text">Add tags to help categorize and find your quote (comma separated).</div>
                            </div>

                            <!-- Source -->
                            <div class="mb-4">
                                <label for="source" class="form-label">Source</label>
                                <input type="text" class="form-control" id="source" name="source" value="<?php echo htmlspecialchars($quote['source']); ?>">
                                <div class="form-text">Where did this quote come from? (Optional)</div>
                            </div>

                            <!-- Context -->
                            <div class="mb-4">
                                <label for="context" class="form-label">Context</label>
                                <textarea class="form-control" id="context" name="context" rows="3"><?php echo htmlspecialchars($quote['context']); ?></textarea>
                                <div class="form-text">Provide additional context or background information about this quote. (Optional)</div>
                            </div>

                            <div class="form-card-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-2"></i>Update Quote
                                </button>
                            </div>
                        </form>
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