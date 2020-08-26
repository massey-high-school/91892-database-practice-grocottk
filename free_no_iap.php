<?php include("topbit.php");

    $find_sql = "SELECT *
FROM `L2_91892_game_practice`

JOIN L2_91892_genre_practice ON (L2_91892_game_practice.Genre_ID = L2_91892_genre_practice.Genre_ID)

JOIN L2_91892_developer_practice ON (L2_91892_game_practice.Developer_ID = L2_91892_developer_practice.Developer_ID)

WHERE `Price` =0 AND `Purchases?` =0
";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>

        <div class="box main">
            <h2>Free Apps with no In-App Purchases Search Results</h2>
            
            <?php
            
            include("results.php");
            
            ?>
            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>