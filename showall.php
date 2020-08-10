<?php include("topbit.php");

    $find_sql = "SELECT *
FROM `L2_91892_game_practice`

JOIN L2_91892_genre_practice ON (L2_91892_game_practice.Genre_ID = L2_91892_genre_practice.Genre_ID)

JOIN L2_91892_developer_practice ON (L2_91892_game_practice.Developer_ID = L2_91892_developer_practice.Developer_ID)

";
    $find_query = mysqli_query($dbconnect, $find_sql);
    $find_rs = mysqli_fetch_assoc($find_query);
    $count = mysqli_num_rows($find_query);

?>

        <div class="box main">
            <h2>All Results from Database</h2>
            
            
            <?php
            
            if($count < 1) {
                
            ?>
            
            <div class="error">
            
                Sorry, there are no results that match your search.
                
                Please use the search box in the side bar to try again.
                
            </div> <!-- end error -->
            
            <?php
                
            } // end no results if
            
            else {
                
                do
                
                {
                    
                    ?>
            
            <!-- Results go here -->
            
            <div class="results">
                
                <!-- Heading and Subtitle -->
                
                <div class="flex-container">
                    
                    <div> <!-- Title -->
                
                        <span class="sub_heading">

                            <a href="<?php echo $find_rs['URL']; ?>">

                                <?php echo $find_rs['Name']; ?> <!-- Shows Name -->                        
                            </a>
                    
                        </span>
                        
                    </div> <!-- End of Title -->
                    
                    <?php
                    
                        if($find_rs['Subtitle'] != "")
                            
                        {
                            
                        ?>
                    
                    <div> <!-- Subtitle -->
                    
                        &nbsp; | &nbsp;
                        
                        <?php echo $find_rs['Subtitle']; ?> <!-- Shows Subtitle -->
                    
                    </div> <!-- End of Subtitle -->
                    
                    <?php
                            
                        }
                    
                    ?>
                    
                </div>
                
                <!-- End of Heading and Subtitle -->
                
                <p>
                    
                    <br />

                    <b>Genre</b>:

                    <?php echo $find_rs['Genre'] ?>

                    <br />

                    <b>Developer</b>:

                    <?php echo $find_rs['Developer'] ?>
                    
                    <br />
                    
                    <b>Rating</b>:

                    <?php echo $find_rs['Average User Rating'] ?> (Based on <?php echo $find_rs['User Rating Count'] ?> votes)
                    
                </p>
                
                <hr />
                
                <?php echo $find_rs['Description'] ?>
                
            </div> <!-- Results End -->
            
            <br />
            
            <?php
                    
                } // end results 'do'
                
                while
                    
                    ($find_rs=mysqli_fetch_assoc($find_query));
                
            } // end else
            
            ?>
            

            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>