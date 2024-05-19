
    <title>Travel Agency</title>
  <link rel="stylesheet" href="homeyatra.css">
</head>
<body>
   

   

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <h2>Our Services</h2>
            <div class="service">
                <h3>Tour Packages</h3>
                <p>Explore our curated tour packages for a hassle-free vacation.</p>
            </div>
            <div class="service">
                <h3>Travel Guide</h3>
                <p>We offer personalized local guides in our travel packages</p>
            </div>
        </div>
    </section>

    <!-- Featured Destinations Section -->
    <section id="destinations" class="destinations">
        <div class="container">
            <h2>Featured Destinations</h2>
            <div class="destination">
                <h3>Suratkal, Mangalore</h3>
                <p>Experience the city of love and its iconic landmarks.</p>
            </div>
            <div class="destination">
                <h3>Karkala, Shringeri</h3>
                <p>Discover the vibrant culture.</p>
            </div>
            <div class="destination">
                <h3>Maravante, Honnavara</h3>
                <p>Explore the adventure.</p>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <h2>What Our Clients Say</h2>
            <div class="testimonial">
                <p>"Our trip to Karkala was unforgettable, thanks to the excellent service provided by Yatra." - Rakshith P.</p>
            </div>
            <div class="testimonial">
                <p>"The best vacation ever! Everything was perfectly organized." - Sujit Kulal.</p>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <form method="post" action="">
                <label for="uname">Name:</label>
                <input type="text" id="uname" name="uname" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit" name="feedbtn">Send Message</button>
            </form>
        </div>
    </section>


    <footer>
        <div class="container">
            <p>&copy; 2024 Yatra Travel Agency. All rights reserved.</p>
        </div>
    </footer>
    <?php include "submitfeedback.php";?>
</body>
</html>
