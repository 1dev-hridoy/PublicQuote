document.addEventListener('DOMContentLoaded', function() {
    
    // Form elements
    const quoteText = document.getElementById('quoteText');
    const authorInput = document.getElementById('author');
    const categorySelect = document.getElementById('category');
    const contextTextarea = document.getElementById('context');
    const tagsInput = document.getElementById('tags');
    
    // Preview elements
    const previewQuote = document.getElementById('previewQuote');
    const previewAuthor = document.getElementById('previewAuthor');
    const previewCategory = document.getElementById('previewCategory');
    const previewContext = document.getElementById('previewContext');
    
    // Buttons
    const saveAsDraftBtn = document.getElementById('saveAsDraft');
    const publishBtn = document.getElementById('publishBtn');
    
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
  
    
    // Initial check
    checkWidth();
    
    
    
    
    // Live preview functionality
    function updatePreview() {
      // Update quote text
      previewQuote.textContent = quoteText.value || 'Your quote will appear here...';
      
      // Update author
      previewAuthor.textContent = authorInput.value ? `By ${authorInput.value}` : 'Author name';
      
      // Update category
      const categoryText = categorySelect.options[categorySelect.selectedIndex]?.text || 'Category';
      previewCategory.textContent = categoryText !== 'Select a category' ? categoryText : 'Category';
      
      // Update context
      previewContext.textContent = contextTextarea.value || 'Additional context will appear here...';
    }
    
    // Add input event listeners for live preview
    quoteText.addEventListener('input', updatePreview);
    authorInput.addEventListener('input', updatePreview);
    categorySelect.addEventListener('change', updatePreview);
    contextTextarea.addEventListener('input', updatePreview);
    
    // Form submission
    publishBtn.addEventListener('click', function() {
      if (validateForm()) {
        // Show success modal
        const successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
      }
    });
    
    saveAsDraftBtn.addEventListener('click', function() {
      // Set status to draft
      document.getElementById('status').value = 'draft';
      
      if (validateForm(true)) {
        alert('Quote saved as draft successfully!');
      }
    });
    
    function validateForm(isDraft = false) {
      let isValid = true;
      let errorMessage = '';
      
      // Only validate required fields if not saving as draft
      if (!isDraft) {
        // Check quote text
        if (!quoteText.value.trim()) {
          isValid = false;
          errorMessage += 'Please enter the quote text.\n';
          quoteText.classList.add('border-danger');
        } else {
          quoteText.classList.remove('border-danger');
        }
        
        // Check author
        if (!authorInput.value.trim()) {
          isValid = false;
          errorMessage += 'Please enter the author name.\n';
          authorInput.classList.add('border-danger');
        } else {
          authorInput.classList.remove('border-danger');
        }
        
        // Check category
        if (!categorySelect.value) {
          isValid = false;
          errorMessage += 'Please select a category.\n';
          categorySelect.classList.add('border-danger');
        } else {
          categorySelect.classList.remove('border-danger');
        }
      }
      
      if (!isValid) {
        alert('Please fix the following errors:\n\n' + errorMessage);
      }
      
      return isValid;
    }
    
    // Initialize preview
    updatePreview();
  });