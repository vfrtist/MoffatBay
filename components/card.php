<div class="card container vertical">
    <h2><?php echo $room['typeName'] ?></h2>
    <div class="subcard">
        <div class="imgWrapper">
            <img src="<?php
            require 'config/roomimages.php';
            echo $roomImages[$room['typeName']];
            ?>" alt="A really nice hotel bedroom">
        </div>
        <span class="desciption">
            <?php echo $room['description'] ?>
        </span>
        <ul class="tags container horizontal">
            <?php
            foreach (explode(",", $room['amenities']) as $item) {
                ?>
                <li><?php echo trim($item) ?></li>
            <?php } ?>
        </ul>
        <div class="container vertical purchase">
            <h4 class="price">$<?php echo $room['dailyRate'] ?>/night</h4>
            <button type="button" class="cta1">Book this room</button>
        </div>
    </div>
</div>