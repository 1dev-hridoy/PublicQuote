<?php
include_once './includes/components/header.php';
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#">PublicQuote</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#how-it-works">How It Works</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#api">API</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#testimonials">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#faq">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <h1 class="hero-title">Wisdom in <span>Words</span>, <br>Just a Click Away</h1>
                <p class="hero-subtitle">Discover inspiring quotes from history's greatest minds. Perfect for your apps, websites, or daily inspiration.</p>
                <div class="d-flex gap-3">
                    <button class="btn btn-primary btn-lg" id="generate-btn">Generate a Quote</button>
                    <button class="btn btn-outline-primary btn-lg">Learn More</button>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="hero-image">
                    <img src="assets/images/hero.jpg" alt="Quotes Illustration" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <div class="hero-shape">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,122.7C384,128,480,160,576,165.3C672,171,768,149,864,149.3C960,149,1056,171,1152,165.3C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</section>

<!-- Random Quotes Section -->
<section class="section section-light" id="quotes">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title">Random Quotes</h2>
            <p class="section-subtitle">Explore some of our favorite quotes from our extensive collection</p>
        </div>
        <div class="row" id="quotes-container">
            <!-- Quote cards will be dynamically inserted here -->
        </div>
        <div class="text-center mt-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
            <button class="btn btn-primary" id="more-quotes-btn">Load More Quotes</button>
        </div>
    </div>
</section>

<!-- How It Works Section -->
<section class="section section-gradient" id="how-it-works">
   
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title">How It Works</h2>
            <p class="section-subtitle">Simple steps to integrate our quotes into your project</p>
        </div>
        <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <div class="step-box">
                    <div class="step-number">1</div>
                    <h3 class="step-title">Sign Up</h3>
                    <p class="step-text">Create a free account to get started with our quotes API.</p>
                    <div class="step-connector d-none d-md-block"></div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="step-box">
                    <div class="step-number">2</div>
                    <h3 class="step-title">Choose Endpoint</h3>
                    <p class="step-text">Select from various endpoints based on your specific needs.</p>
                    <div class="step-connector d-none d-md-block"></div>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <div class="step-box">
                    <div class="step-number">3</div>
                    <h3 class="step-title">Integrate & Enjoy</h3>
                    <p class="step-text">Add the API to your project and start displaying inspiring quotes.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
            <a href="#" class="btn btn-primary">Get Started</a>
        </div>
    </div>
 
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000">
                <div class="stat-box">
                    <div class="stat-number" id="stat-quotes">10,000+</div>
                    <div class="stat-text">Quotes</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <div class="stat-box">
                    <div class="stat-number" id="stat-authors">500+</div>
                    <div class="stat-text">Authors</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="stat-box">
                    <div class="stat-number" id="stat-users">5,000+</div>
                    <div class="stat-text">Active Users</div>
                </div>
            </div>
            <div class="col-md-3 col-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <div class="stat-box">
                    <div class="stat-number" id="stat-requests">1M+</div>
                    <div class="stat-text">API Requests Daily</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- API Documentation Section -->
<section class="section section-light" id="api">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title">History Delivered</h2>
            <p class="section-subtitle">Our API delivers timeless wisdom directly to your applications</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <h3 class="feature-title">No API Key Required</h3>
                    <p class="feature-text">Access our extensive collection of quotes without any authentication. Simply make a request and receive wisdom instantly.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-infinity"></i>
                    </div>
                    <h3 class="feature-title">Unlimited Requests</h3>
                    <p class="feature-text">Enjoy unlimited access to our API with no rate limiting. Perfect for high-traffic applications and websites.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="feature-title">Featured Authors</h3>
                    <p class="feature-text">Explore quotes from Einstein, Shakespeare, Gandhi, Maya Angelou, and hundreds more influential thinkers throughout history.</p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-lg-8 mx-auto" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">API Endpoint Example</h5>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <pre class="mb-0"><code>GET https://api.PublicQuote.com/v1/random</code></pre>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Response Example</h5>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <pre class="mb-0"><code>{
"quote": "The greatest glory in living lies not in never falling, but in rising every time we fall.",
"author": "Nelson Mandela",
"category": "Inspiration",
"tags": ["motivation", "perseverance", "success"]
}</code></pre>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-5" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
            <a href="#" class="btn btn-primary">View Full Documentation</a>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section section-gradient" id="testimonials">
    
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title">What Our Users Say</h2>
            <p class="section-subtitle">Hear from developers who have integrated our API</p>
        </div>
        <div class="row">
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                <div class="testimonial-card">
                    <p class="testimonial-text">PublicQuote API has been a game-changer for our meditation app. The integration was seamless, and our users love the daily inspirational quotes.</p>
                    <div class="testimonial-author">
                        <img src="https://placeholder.svg?height=50&width=50" alt="Sarah Johnson" class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h5>Sarah Johnson</h5>
                            <p>CTO, MindfulApp</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                <div class="testimonial-card">
                    <p class="testimonial-text">I've tried several quote APIs, but PublicQuote stands out with its vast collection and reliable service. It's become an essential part of our content strategy.</p>
                    <div class="testimonial-author">
                        <img src="https://placeholder.svg?height=50&width=50" alt="David Chen" class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h5>David Chen</h5>
                            <p>Developer, TechBlog</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                <div class="testimonial-card">
                    <p class="testimonial-text">The unlimited requests feature is incredible. We've integrated PublicQuote into our educational platform, and it's been a hit with both teachers and students.</p>
                    <div class="testimonial-author">
                        <img src="https://placeholder.svg?height=50&width=50" alt="Emily Rodriguez" class="testimonial-avatar">
                        <div class="testimonial-info">
                            <h5>Emily Rodriguez</h5>
                            <p>Product Manager, EduLearn</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-shape">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,160L48,149.3C96,139,192,117,288,122.7C384,128,480,160,576,165.3C672,171,768,149,864,149.3C960,149,1056,171,1152,165.3C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</section>

<!-- FAQ Section -->
<section class="section section-light" id="faq">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">Find answers to common questions about our API</p>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="faq-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Is the API really free to use?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, our basic API is completely free to use with no hidden charges. We also offer premium plans with additional features for power users and businesses.</p>
                    </div>
                </div>
                <div class="faq-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>How many quotes do you have in your database?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our database currently contains over 10,000 quotes from more than 500 authors across various categories including motivation, success, leadership, and more. We're constantly adding new content.</p>
                    </div>
                </div>
                <div class="faq-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Can I filter quotes by category or author?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our API allows you to filter quotes by author, category, tags, and even keywords. Check our documentation for all available filtering options.</p>
                    </div>
                </div>
                <div class="faq-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Is there a rate limit for API requests?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Our free tier has a generous limit of 1,000 requests per day, which is sufficient for most applications. Premium plans offer higher or unlimited request volumes.</p>
                    </div>
                </div>
                <div class="faq-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                    <div class="faq-question" onclick="toggleFAQ(this)">
                        <span>Do you provide support for API integration?</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Yes, we offer comprehensive documentation, code examples in multiple programming languages, and dedicated support for premium users. Our community forum is also a great resource for all users.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="cta-title">Stay Updated</h2>
                <p class="cta-text">Subscribe to our newsletter for the latest API updates, new features, and tips.</p>
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Enter your email address" required>
                    <button type="submit" class="newsletter-btn">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section" id="contact">
    <div class="container text-center">
        <h2 class="cta-title" data-aos="fade-up" data-aos-duration="1000">Ready to Integrate?</h2>
        <p class="cta-text" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">Start using our API today and bring the wisdom of the ages to your users.</p>
        <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            <a href="#" class="btn btn-light btn-lg me-3">Start Using the API</a>
            <a href="#" class="btn btn-outline-light btn-lg">Contact Us</a>
        </div>
    </div>
</section>
<?php
include_once './includes/components/footer.php';
?>