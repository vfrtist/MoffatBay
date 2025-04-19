<div class="card container horizontal">
    <div class="imgWrapper">
        <img src="<?php
        require 'config/roomimages.php';
        echo $roomImages[$room['typeName']];
        ?>" alt="A really nice hotel bedroom">
    </div>
    <div class="info container vertical">
        <h2><?php echo $room['typeName'] ?></h2>
        <div class="description">
            <?php echo $room['description'] ?>
        </div>
        <div class="size">
            Max: <?php echo $room['maxOccupancy'] ?> guests
        </div>
        <div class="container horizontal">
            <ul class="tags container horizontal">
                <?php
                // limiting the number of tags. There are too many.
                $tags = array_slice(explode(",", $room['amenities']), 5);
                foreach ($tags as $item) {
                    ?>
                    <li><?php echo trim($item) ?></li>
                <?php } ?>
            </ul>
            <div class="container vertical purchase">
                <h4 class="price">$<?php echo $room['dailyRate'] ?>/night</h4>
                <form class="roomForm" method="post" action="confirm.php">
                    <input type="hidden" name="checkin">
                    <input type="hidden" name="checkout">
                    <input type="hidden" name="guests">
                    <input type="hidden" name="typeName" value="<?php echo htmlspecialchars($room['typeName']); ?>">
                    <button type="submit" class="cta1">Book this room</button>
                </form>
            </div>
        </div>
    </div>
</div>