<?php require_once APP_PATH . '/views/layouts/header.php'; ?>

<section class="page-content">
    <div class="container">
        <h1>Contact Us</h1>
        
        <div class="contact-content">
            <p>We'd love to hear from you! Whether you have questions, suggestions, or want to contribute content, feel free to reach out.</p>
            
            <div class="contact-info">
                <h2>Get in Touch</h2>
                <p><strong>Email:</strong> info@sidepocketvibe.com</p>
                <p><strong>Social Media:</strong> Follow us on Facebook, Twitter, and Instagram</p>
            </div>
            
            <div class="contact-form">
                <h2>Send us a Message</h2>
                <form action="/contact" method="POST">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" id="subject" name="subject" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="6" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once APP_PATH . '/views/layouts/footer.php'; ?>
