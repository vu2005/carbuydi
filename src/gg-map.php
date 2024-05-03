<div class="map-contact" style="text-align: center;">
    <?php
    // Google Map parameters
    $latitude = 21.0281742;
    $longitude = 105.770377;
    $address = "8A Tôn Thất Thuyết, Mỹ Đình, Nam Từ Liêm, Hà Nội 100000, Việt Nam";

    // Embed Google Map using iframe
    echo '<iframe title="Google Maps" ';
    echo 'src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3724.1127483277796';
    echo '!2d' . $longitude . '!3d' . $latitude . '!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab00954decbf';
    echo '%3A0xdb4ee23b49ad50c8!2zRlBUIEFwdGVjaCBIw6AgTuG7mWkgLSBI4buHIHRo4buRbmcgxJHDoG8gdOG6oW8g';
    echo 'bOG6rXAgdHLDrG5oIHZpw6puIHF14buRYyB04bq_!5e0!3m2!1svi!2s!4v1704475879765!5m2!1svi!2s" ';
    echo 'width="1220" height="450" style="border: 0" allowfullscreen="" loading="lazy" ';
    echo 'referrerPolicy="no-referrer-when-downgrade"></iframe>';
    ?>

    <p><?php echo $address; ?></p>
</div>