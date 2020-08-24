<?php include("topbit.php");

    $name_dev = $_POST['dev_name'];

    $find_sql = "SELECT *
FROM `L2_91892_game_practice`

JOIN L2_91892_genre_practice ON (L2_91892_game_practice.Genre_ID = L2_91892_genre_practice.Genre_ID)

JOIN L2_91892_developer_practice ON (L2_91892_game_practice.Developer_ID = L2_91892_developer_practice.Developer_ID)

WHERE `Name` LIKE '%$name_dev%' OR `Developer` LIKE '%$name_dev%'
";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>

        <div class="box main">
            <h2>App Name and/or Developer Name Search Results</h2>
            
            <?php
            
            include("results.php");
            
            ?>
            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>