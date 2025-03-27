<footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h3 class="footer-title">PublicQuote</h3>
                    <p>Delivering wisdom and inspiration through our extensive collection of quotes from history's greatest minds.</p>
                    <div class="mt-3">
                        <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon"><i class="fab fa-github"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4">
                    <h3 class="footer-title">Links</h3>
                    <a href="#" class="footer-link">Home</a>
                    <a href="#how-it-works" class="footer-link">How It Works</a>
                    <a href="#api" class="footer-link">API</a>
                    <a href="#testimonials" class="footer-link">Testimonials</a>
                    <a href="#faq" class="footer-link">FAQ</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h3 class="footer-title">Resources</h3>
                    <a href="#" class="footer-link">Documentation</a>
                    <a href="#" class="footer-link">API Reference</a>
                    <a href="#" class="footer-link">Examples</a>
                    <a href="#" class="footer-link">Blog</a>
                    <a href="#" class="footer-link">Status</a>
                </div>
                <div class="col-md-3 mb-4">
                    <h3 class="footer-title">Contact</h3>
                    <a href="mailto:info@PublicQuote.com" class="footer-link">info@PublicQuote.com</a>
                    <a href="tel:+1234567890" class="footer-link">+1 (234) 567-890</a>
                    <a href="#" class="footer-link">Support</a>
                    <a href="#" class="footer-link">Careers</a>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <p class="mb-0">© 2023 PublicQuote. All rights reserved.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <a href="#" class="me-3 text-white-50">Privacy Policy</a>
                        <a href="#" class="text-white-50">Terms of Service</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation Library -->
    <script src="assets/js/aos.js"></script>
    
    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init();
            
            // Sample quotes data
            const quotes = [
                {
                    text: "The greatest glory in living lies not in never falling, but in rising every time we fall.",
                    author: "Nelson Mandela"
                },
                {
                    text: "The way to get started is to quit talking and begin doing.",
                    author: "Walt Disney"
                },
                {
                    text: "Your time is limited, so don't waste it living someone else's life.",
                    author: "Steve Jobs"
                },
                {
                    text: "If life were predictable it would cease to be life, and be without flavor.",
                    author: "Eleanor Roosevelt"
                },
                {
                    text: "If you look at what you have in life, you'll always have more. If you look at what you don't have in life, you'll never have enough.",
                    author: "Oprah Winfrey"
                },
                {
                    text: "If you set your goals ridiculously high and it's a failure, you will fail above everyone else's success.",
                    author: "James Cameron"
                },
                {
                    text: "Life is what happens when you're busy making other plans.",
                    author: "John Lennon"
                },
                {
                    text: "Spread love everywhere you go. Let no one ever come to you without leaving happier.",
                    author: "Mother Teresa"
                },
                {
                    text: "When you reach the end of your rope, tie a knot in it and hang on.",
                    author: "Franklin D. Roosevelt"
                },
                {
                    text: "Always remember that you are absolutely unique. Just like everyone else.",
                    author: "Margaret Mead"
                },
                {
                    text: "The future belongs to those who believe in the beauty of their dreams.",
                    author: "Eleanor Roosevelt"
                },
                {
                    text: "The only way to do great work is to love what you do.",
                    author: "Steve Jobs"
                },
                {
                    text: "In the end, it's not the years in your life that count. It's the life in your years.",
                    author: "Abraham Lincoln"
                },
                {
                    text: "The purpose of our lives is to be happy.",
                    author: "Dalai Lama"
                },
                {
                    text: "You only live once, but if you do it right, once is enough.",
                    author: "Mae West"
                }
            ];
            
            // Function to get random quotes
            function getRandomQuotes(count) {
                const shuffled = [...quotes].sort(() => 0.5 - Math.random());
                return shuffled.slice(0, count);
            }
            
            // Function to create quote card
            function createQuoteCard(quote) {
                return `
                    <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000">
                        <div class="quote-card">
                            <p class="quote-text">${quote.text}</p>
                            <p class="quote-author">— ${quote.author}</p>
                        </div>
                    </div>
                `;
            }
            
            // Function to display random quotes
            function displayRandomQuotes() {
                const quotesContainer = document.getElementById('quotes-container');
                const randomQuotes = getRandomQuotes(3);
                
                quotesContainer.innerHTML = '';
                randomQuotes.forEach(quote => {
                    quotesContainer.innerHTML += createQuoteCard(quote);
                });
                
                // Refresh AOS for new elements
                AOS.refresh();
            }
            
            // Display initial quotes
            displayRandomQuotes();
            
            // Generate new quotes on button click
            document.getElementById('generate-btn').addEventListener('click', displayRandomQuotes);
            document.getElementById('more-quotes-btn').addEventListener('click', displayRandomQuotes);
            
            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.getElementById('mainNav');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
                
                // Back to top button
                const backToTop = document.getElementById('backToTop');
                if (window.scrollY > 300) {
                    backToTop.classList.add('active');
                } else {
                    backToTop.classList.remove('active');
                }
            });
            
            // Back to top button click
            document.getElementById('backToTop').addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
            
            // Toggle FAQ answers
            window.toggleFAQ = function(element) {
                element.classList.toggle('active');
                const answer = element.nextElementSibling;
                answer.classList.toggle('active');
            }
            
            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;
                    
                    const targetElement = document.querySelector(targetId);
                    const navbarHeight = document.querySelector('.navbar').offsetHeight;
                    
                    window.scrollTo({
                        top: targetElement.offsetTop - navbarHeight,
                        behavior: 'smooth'
                    });
                });
            });
            
            // Newsletter form submission
            document.querySelector('.newsletter-form').addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.querySelector('input').value;
                if (email) {
                    alert('Thank you for subscribing! You will receive our updates at ' + email);
                    this.reset();
                }
            });
            
            // Animate stats numbers
            function animateStats() {
                const stats = [
                    { id: 'stat-quotes', value: 10000 },
                    { id: 'stat-authors', value: 500 },
                    { id: 'stat-users', value: 5000 },
                    { id: 'stat-requests', value: 1000000 }
                ];
                
                stats.forEach(stat => {
                    const element = document.getElementById(stat.id);
                    let current = 0;
                    const increment = stat.value / 50;
                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= stat.value) {
                            current = stat.value;
                            clearInterval(timer);
                        }
                        
                        if (stat.value >= 1000000) {
                            element.textContent = Math.round(current / 1000000) + 'M+';
                        } else if (stat.value >= 1000) {
                            element.textContent = Math.round(current / 1000) + 'K+';
                        } else {
                            element.textContent = Math.round(current) + '+';
                        }
                    }, 30);
                });
            }
            
            // Run stats animation when section is in viewport
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateStats();
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });
            
            const statsSection = document.querySelector('.stats-section');
            if (statsSection) {
                observer.observe(statsSection);
            }
        });
    </script>
</body>
</html>