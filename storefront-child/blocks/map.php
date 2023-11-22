<?php $title = get_sub_field('title');
      $goole_map = get_sub_field("google_map")
?>

<div class="map">
    <h2><?php echo($title) ?></h2>
    <div class="map__map">
        <div id="map"></div>
    </div>
</div>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDMqSLoDfBqzu0bVuT1USXebfMK83OX42M&callback=initMap&v=weekly"
      defer
></script>

<script>

    // Initialize and add the map
    function initMap() {
    // The location of Uluru
    const uluru = { lat: <?php echo $goole_map['lat'] ?>, lng: <?php echo $goole_map['lng'] ?> };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: <?php echo $goole_map['zoom'] ?>,
        center: uluru
    });

    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
    }

    window.initMap = initMap;

</script>