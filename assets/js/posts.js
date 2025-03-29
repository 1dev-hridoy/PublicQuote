document.addEventListener('DOMContentLoaded', function() {

    const themeToggle = document.getElementById('theme-toggle');
    const themeIcon = document.getElementById('theme-icon');
    const html = document.documentElement;
    const gridViewBtn = document.getElementById('grid-view-btn');
    const listViewBtn = document.getElementById('list-view-btn');
    const gridView = document.getElementById('grid-view');
    const listView = document.getElementById('list-view');
    const bulkActions = document.getElementById('bulk-actions');
    const checkboxes = document.querySelectorAll('.post-card-checkbox, .post-list-checkbox');
    
    // Theme handling
    function setTheme(theme) {
      html.setAttribute('data-bs-theme', theme);
      localStorage.setItem('theme', theme);
      
      if (theme === 'dark') {
        themeIcon.classList.remove('bi-sun-fill');
        themeIcon.classList.add('bi-moon-fill');
      } else {
        themeIcon.classList.remove('bi-moon-fill');
        themeIcon.classList.add('bi-sun-fill');
      }
    }
    
    // Check for saved theme preference or use user's system preference
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
      setTheme(savedTheme);
    } else {
      // Check if user prefers dark mode
      const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
      setTheme(prefersDarkMode ? 'dark' : 'light');
    }
    
    // Toggle theme on button click
    themeToggle.addEventListener('click', function() {
      const currentTheme = html.getAttribute('data-bs-theme');
      const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
      setTheme(newTheme);
    });
    
    // Function to check window width and set initial state
    function checkWidth() {
      if (window.innerWidth < 992) {
        sidebar.classList.remove('collapsed');
        mainContent.classList.remove('expanded');
      }
    }
    
    // Initial check
    checkWidth();
    
    

    
    // Toggle view (grid/list)
    gridViewBtn.addEventListener('click', function() {
      gridView.style.display = 'block';
      listView.style.display = 'none';
      gridViewBtn.classList.add('active');
      listViewBtn.classList.remove('active');
      localStorage.setItem('view', 'grid');
    });
    
    listViewBtn.addEventListener('click', function() {
      gridView.style.display = 'none';
      listView.style.display = 'block';
      listViewBtn.classList.add('active');
      gridViewBtn.classList.remove('active');
      localStorage.setItem('view', 'list');
    });
    
    // Check for saved view preference
    const savedView = localStorage.getItem('view');
    if (savedView === 'list') {
      listViewBtn.click();
    }
    
    // Handle checkboxes for bulk actions
    checkboxes.forEach(checkbox => {
      checkbox.addEventListener('change', function() {
        const checkedCount = document.querySelectorAll('.post-card-checkbox:checked, .post-list-checkbox:checked').length;
        
        if (checkedCount > 0) {
          bulkActions.classList.add('show');
        } else {
          bulkActions.classList.remove('show');
        }
      });
    });
  });