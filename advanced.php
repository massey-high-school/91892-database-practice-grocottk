<?php include("topbit.php");

    $app_name = mysqli_real_escape_string($dbconnect, $_POST['app_name']);
    $developer = mysqli_real_escape_string($dbconnect, $_POST['dev_name']);
    $genre = mysqli_real_escape_string($dbconnect, $_POST['genre']);
    $cost = mysqli_real_escape_string($dbconnect, $_POST['cost']);

    // Cost Code (this will most likely come into effect when no cost is specified):

    if ($cost == "") {
        $cost_op = ">=";
        $cost = 0;
    }

    else {
        $cost_op = "<=";
    }
    
    // End of Cost Code
    
    // In-App Purchases:

    if (isset($_POST['in_app'])) {
        $in_app = 0;
    }

    else {
        $in_app = 1;
    }

    // End of In-App Purchases:

    // Ratings:

    $rating_more_less - mysqli_real_escape_string($dbconnect, $_POST['rate_more_less']);
    $rating = mysqli_real_escape_string($dbconnect, $_POST['rating']);

    if($rating == "") {
        $rating = 0;
        $rating_more_less = "at least";
    }

    // Sets 'Age' value to 0 if it is blank.

    if ($rating_more_less == "at most") {
        $rate_op = "<=";
    }

    else {
        $rate_op = ">=";
    }

    // End of Rating ['if'/'else']

    // Age:

    $age_more_less - mysqli_real_escape_string($dbconnect, $_POST['age_more_less']);
    $age = mysqli_real_escape_string($dbconnect, $_POST['age']);

    if($age == "") {
        $age = 0;
        $age_more_less = "at least";
    }

    // Sets 'Age' value to 0 if it is blank.

    if ($age_more_less == "at most") {
        $age_op = "<=";
    }

    else {
        $age_op = ">=";
    }

    // End of Age ['if'/'else']

    $find_sql = "SELECT *
FROM `L2_91892_game_practice`

JOIN L2_91892_genre_practice ON (L2_91892_game_practice.Genre_ID = L2_91892_genre_practice.Genre_ID)

JOIN L2_91892_developer_practice ON (L2_91892_game_practice.Developer_ID = L2_91892_developer_practice.Developer_ID)

WHERE `Name` LIKE '%$app_name%'

AND `Developer` LIKE '%$developer%'

AND `Genre` LIKE '%$genre%'

AND `Price` $cost_op '$cost'

AND (`Purchases?` = $in_app OR `Purchases?` = 0)

AND `Average User Rating` $rate_op $rating

AND `Age Rating` $age_op $age

";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>

        <!-- Save this as 'advanced' -->

        <div class="box main">
            <h2>Advanced Search Results</h2>
            
            <?php
            
            include("results.php");
            
            ?>
            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>