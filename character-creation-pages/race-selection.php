<?php 

include('../Landing/includes/login_functions.php');

session_start(); 

if (!isset($_SESSION['player_id'])) {
    redirect_user('../Landing/landing.php');
} else if ($_SESSION['has-character']) {
    redirect_user('../index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cc-styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@600;700&amp;display=swap" rel="stylesheet">
    <script src="cc-js-main.js" defer></script>
    <title></title>
</head>
<body>
    <h1>Choose Your Race</h1>
    <div class="main" id="main">
        <form id="race-form" action="race-selection.php">
            <div class="div-race div-human">
                <input type="radio" id="race-human" name="race-selection" value="1" class="race-radio" checked>
                <label for="race-human" id="human">Human</label>
            </div>
            <div class="div-race div-klingon">
                <input type="radio" id="race-klingon" name="race-selection" value="3" class="race-radio">
                <label for="race-klingon" id="klingon">Klingon</label>
            </div>
            <div class="div-race div-vulcan">
                <input type="radio" id="race-vulcan" name="race-selection" value="2" class="race-radio">
                <label for="race-vulcan" id="vulcan">Vulcan</label>
            </div>
            <div class="div-race div-betazoid">
                <input type="radio" id="race-betazoid" name="race-selection" value="4" class="race-radio">
                <label for="race-betazoid" id="betazoid">Betazoid</label>
            </div>
            <div class="div-race div-ferengi">
                <input type="radio" id="race-ferengi" name="race-selection" value="5" class="race-radio">
                <label for="race-ferengi" id="ferengi">Ferengi</label>
            </div>
        </form>
        <div class="sd-wrapper">
            <div class="heading-container">
                <h4 id="sdRace" class="pad-y center-align">Human</h4>
                <hr>
            </div>
            <div class="planet-container">
                <p class="pad-y">Home Planet: <span id="homePlanet">Earth</span></p>
                <p class="pad-bottom">Quadrant: <span id="quadrant">Alpha</span></p>
                <hr>
            </div>
            <div class="attribute-container">
                <p class="pad-y">Strength: <span id="strength">Diplomacy</span></p>
                <p class="pad-bottom">Weakness: <span id="weakness">Emotional</span></p>
                <hr>
            </div>
            <div id="perk-container">
                <p class="pad-y center-align">Perk: <span id="perk">Bluff</span></p>
                <p id="perkDesc" class="pad-bottom">Harness your persuasive skills to deceive or manipulate others, attempting to achieve favorable outcomes even in dire circumstances</p>
                <hr>
            </div>
            <div class="more-info-container pad-y">
                <p id="moreInfo">More Info</p>
            </div>
        </div>
        <div class="ld-wrapper no-display center-align" id="longDesc">
            <h4 class="pad-y center-align">More Info</h4>
            <hr>
            <p class="race-desc pad-y" id="raceDesc">Humans are known for their adaptability and diversity. Hailing from Earth, they have a rich history of overcoming challenges and embracing change. Humans excel in various fields, from diplomacy and leadership to science and engineering, making them valuable members of the United Federation of Planets. Their capacity for growth and willingness to explore the unknown make them a driving force in the galaxy.</p>
        </div>
    </div>
    <div class="submit-container">
        <input type="submit" form="race-form" value="Confirm" class="btn-confirm">
    </div>
</body>
</html>