<!DOCTYPE html>
<html>
<head>
    <title>jQuery Effects</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<h2 id="text">jQuery Effects</h2>

<button id="hide">Hide</button>
<button id="show">Show</button>
<button id="fade">Fade</button>
<button id="slide">Slide</button>
<button id="toggle">Toggle</button>

<script>
$(document).ready(function() {

    $("#hide").click(function() {
        $("#text").hide();
    });

    $("#show").click(function() {
        $("#text").show();
    });

    $("#fade").click(function() {
        $("#text").fadeToggle();
    });

    $("#slide").click(function() {
        $("#text").slideToggle();
    });

    $("#toggle").click(function() {
        $("#text").toggle();
    });

});
</script>

</body>
</html>