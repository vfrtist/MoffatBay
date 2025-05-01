<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require 'components/head.php'; ?>
    <link rel="stylesheet" href="attractions.css">
    <title>Attractions</title>
</head>

<body>
    <?php require 'components/fullheader.php'; ?>
    
    <main class="attractions-grid">
        <!-- Whale Watching -->
        <section class="attraction-card">
            <img src="images/whale-watching.jpg" alt="Whale Watching">
            <div class="attraction-content">
                <h2>Whale Watching</h2>
                <p>
                    Experience the breathtaking beauty of Moffat Bay with our exclusive whale viewing tours. Our knowledgeable guides will 
                    take you on an unforgettable journey through the pristine waters, where you can witness these majestic creatures in their 
                    natural habitat. Don't miss out on this once-in-a-lifetime opportunity!
                </p>
                <a href="booking.php?activity=whale-watching" class="book-button">Book Now</a>
            </div>
        </section>

        <!-- Scuba Diving -->
        <section class="attraction-card">
            <img src="images/scuba-diving.jpg" alt="Scuba Diving">
            <div class="attraction-content">
                <h2>Scuba Diving</h2>
                <p>
                    Explore the vibrant underwater world of Moffat Bay with our scuba diving adventures. Whether you're a beginner or an experienced 
                    diver, our certified instructors will ensure you have a safe and enjoyable experience. Discover colorful coral reefs, exotic marine
                    life, and hidden treasures beneath the waves.
                </p>
                <a href="booking.php?activity=scuba-diving" class="book-button">Book Now</a>
            </div>
        </section>

        <!-- Kayaking -->
        <section class="attraction-card">
            <img src="images/kayaking.jpg" alt="Kayaking">
            <div class="attraction-content">
                <h2>Kayaking</h2>
                <p>
                    Get up close and personal with the stunning coastline of Moffat Bay by kayaking through its crystal-clear waters. 
                    Our guided tours cater to all skill levels, allowing you to paddle at your own pace while soaking in the breathtaking scenery. 
                    Join us for a day of adventure and relaxation on the water!
                </p>
                <a href="booking.php?activity=kayaking" class="book-button">Book Now</a>
            </div>
        </section>

        <!-- Hiking -->
        <section class="attraction-card">
            <img src="images/hiking.jpg" alt="Hiking">
            <div class="attraction-content">
                <h2>Hiking</h2>
                <p>
                    Immerse yourself in the natural beauty of Moffat Bay with our guided hiking tours. Traverse scenic trails that lead you through 
                    lush forests, rocky cliffs, and panoramic viewpoints. Our experienced guides will share their knowledge of the local flora and 
                    fauna, making your hike both educational and enjoyable.
                </p>
                <a href="booking.php?activity=hiking" class="book-button">Book Now</a>
            </div>
        </section>
    </main>
</body>

</html> 