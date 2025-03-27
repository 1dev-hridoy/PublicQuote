<script src="../assets/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Elements
      const sidebarToggle = document.getElementById('sidebar-toggle');
      const sidebar = document.getElementById('sidebar');
      const mainContent = document.getElementById('main-content');
      const sidebarBackdrop = document.getElementById('sidebar-backdrop');
      const themeToggle = document.getElementById('theme-toggle');
      const themeIcon = document.getElementById('theme-icon');
      const html = document.documentElement;
      
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
      
      // Toggle sidebar on button click
      sidebarToggle.addEventListener('click', function() {
        if (window.innerWidth < 992) {
          sidebar.classList.toggle('show');
          sidebarBackdrop.classList.toggle('show');
        } else {
          sidebar.classList.toggle('collapsed');
          mainContent.classList.toggle('expanded');
        }
      });
      
      // Close sidebar when clicking on backdrop
      sidebarBackdrop.addEventListener('click', function() {
        sidebar.classList.remove('show');
        sidebarBackdrop.classList.remove('show');
      });
      
      // Handle window resize
      window.addEventListener('resize', function() {
        if (window.innerWidth < 992) {
          sidebar.classList.remove('collapsed');
          mainContent.classList.remove('expanded');
          
          if (sidebar.classList.contains('show') && window.innerWidth >= 992) {
            sidebar.classList.remove('show');
            sidebarBackdrop.classList.remove('show');
          }
        }
      });
      
      // Make sidebar links active on click
      const sidebarLinks = document.querySelectorAll('.sidebar-link');
      sidebarLinks.forEach(link => {
        link.addEventListener('click', function() {
          sidebarLinks.forEach(l => l.classList.remove('active'));
          this.classList.add('active');
          
          // Close sidebar on mobile when a link is clicked
          if (window.innerWidth < 992) {
            sidebar.classList.remove('show');
            sidebarBackdrop.classList.remove('show');
          }
        });
      });
    });
  </script>
</body>
</html>