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

// Fetch quotes of the logged-in user
$search = $_GET['search'] ?? '';
$categoryFilter = $_GET['category'] ?? '';
$statusFilter = $_GET['status'] ?? '';
$orderBy = $_GET['order'] ?? 'created_at DESC';

try {
    $query = "SELECT quotes.*, category.name AS category_name 
              FROM quotes 
              JOIN category ON quotes.category_id = category.id 
              WHERE quotes.published_by = :username";

    $params = ['username' => $username];

    if (!empty($search)) {
        $query .= " AND (quotes.quote_text LIKE :search OR quotes.author LIKE :search)";
        $params['search'] = '%' . $search . '%';
    }

    if (!empty($categoryFilter)) {
        $query .= " AND category.id = :category";
        $params['category'] = $categoryFilter;
    }

    if (!empty($statusFilter)) {
        $query .= " AND quotes.status = :status";
        $params['status'] = $statusFilter;
    }

    $query .= " ORDER BY $orderBy";

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $error = "Error fetching quotes: " . $e->getMessage();
}

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM quotes WHERE id = :id AND published_by = :username");
        $stmt->execute(['id' => $_POST['delete_id'], 'username' => $username]);
        header("Location: posts.php");
        exit;
    } catch (PDOException $e) {
        $error = "Error deleting quote: " . $e->getMessage();
    }
}
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
                <a href="add-new-post.php" class="btn btn-primary">
                    <i class="bi bi-plus-lg me-md-2"></i><span class="d-none d-md-inline">New Post</span>
                </a>
            </div>
        </div>

        <!-- Filter Bar -->
        <form method="GET" class="filter-bar">
            <div class="row g-2 align-items-center">
                <div class="col-12 col-md-4">
                    <div class="input-group">
                        <span class="input-group-text border-end-0"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control border-start-0" name="search" placeholder="Search posts..." value="<?php echo htmlspecialchars($search); ?>">
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <select class="form-select" name="category">
                        <option value="">All Categories</option>
                        <?php
                        $categories = $pdo->query("SELECT * FROM category ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($categories as $category) {
                            $selected = $categoryFilter == $category['id'] ? 'selected' : '';
                            echo "<option value='{$category['id']}' $selected>{$category['name']}</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-6 col-md-2">
                    <select class="form-select" name="status">
                        <option value="">All Status</option>
                        <option value="PUBLISHED" <?php echo $statusFilter == 'PUBLISHED' ? 'selected' : ''; ?>>Published</option>
                        <option value="DRAFT" <?php echo $statusFilter == 'DRAFT' ? 'selected' : ''; ?>>Draft</option>
                    </select>
                </div>
                <div class="col-6 col-md-2">
                    <select class="form-select" name="order">
                        <option value="created_at DESC" <?php echo $orderBy == 'created_at DESC' ? 'selected' : ''; ?>>Newest</option>
                        <option value="created_at ASC" <?php echo $orderBy == 'created_at ASC' ? 'selected' : ''; ?>>Oldest</option>
                    </select>
                </div>
                <div class="col-6 col-md-2 d-flex justify-content-end">
                    <button type="submit" class="btn btn-outline-primary">Apply Filters</button>
                </div>
            </div>
        </form>

        <!-- Grid View -->
        <div id="grid-view">
            <div class="row g-3 mb-4">
                <?php if (!empty($quotes)): ?>
                    <?php foreach ($quotes as $quote): ?>
                        <div class="col-12 col-md-6 col-xl-4 post-card-container">
                            <div class="post-card">
                                <div class="post-card-header">
                                    <span class="post-card-category"><?php echo htmlspecialchars($quote['category_name']); ?></span>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-link text-muted p-0" type="button" data-bs-toggle="dropdown">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewModal<?php echo $quote['id']; ?>"><i class="bi bi-eye me-2"></i>View</a></li>
                                            <li><a class="dropdown-item" href="edit-post.php?id=<?php echo $quote['id']; ?>"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li>
                                                <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $quote['id']; ?>">
                                                    <i class="bi bi-trash me-2"></i>Delete
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="post-card-body">
                                    <h5 class="post-card-title"><?php echo htmlspecialchars($quote['quote_text']); ?></h5>
                                    <p class="post-card-author">By <?php echo htmlspecialchars($quote['author']); ?></p>
                                </div>
                                <div class="post-card-footer">
                                    <span class="post-card-date">Published <?php echo date('M d, Y', strtotime($quote['created_at'])); ?></span>
                                </div>
                            </div>
                        </div>

                        <!-- View Quote Modal -->
                        <div class="modal fade" id="viewModal<?php echo $quote['id']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Quote Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Quote:</strong> <?php echo htmlspecialchars($quote['quote_text']); ?></p>
                                        <p><strong>Author:</strong> <?php echo htmlspecialchars($quote['author']); ?></p>
                                        <p><strong>Category:</strong> <?php echo htmlspecialchars($quote['category_name']); ?></p>
                                        <p><strong>Status:</strong> <?php echo htmlspecialchars($quote['status']); ?></p>
                                        <p><strong>Tags:</strong> <?php echo htmlspecialchars($quote['tags'] ?? 'N/A'); ?></p>
                                        <p><strong>Source:</strong> <?php echo htmlspecialchars($quote['source'] ?? 'N/A'); ?></p>
                                        <p><strong>Context:</strong> <?php echo htmlspecialchars($quote['context'] ?? 'N/A'); ?></p>
                                        <p><strong>Published By:</strong> <?php echo htmlspecialchars($quote['published_by']); ?></p>
                                        <p><strong>Created At:</strong> <?php echo date('M d, Y H:i', strtotime($quote['created_at'])); ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal<?php echo $quote['id']; ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Confirm Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this quote?
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="">
                                            <input type="hidden" name="delete_id" value="<?php echo $quote['id']; ?>">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-muted">No quotes found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script src="../assets/js/posts.js"></script>

<?php
include_once 'includes/footer.php';
?>