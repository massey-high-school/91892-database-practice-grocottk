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
                    
                    <!-- Subtitle -->
                    
                    <?php
                    
                        if($find_rs['Subtitle'] != "")
                            
                        {
                            
                        ?>
                    
                    <div>
                    
                        &nbsp; | &nbsp;
                        
                        <?php echo $find_rs['Subtitle']; ?> <!-- Shows Subtitle -->
                    
                    </div>
                    
                    <?php
                            
                        }
                    
                    ?>
                    
                    <!-- End of Subtitle -->
                    
                </div>
                
                    <!-- End of  Heading and Subtitle -->
                
                <!-- Price -->
                
                <?php
                
                if($find_rs['Price'] == 0) {
                
                ?>
                
                <div>
                    
                    <p>Free</p>
                    
                </div> <!-- Does not print Price (prints "Free") -->
                
                <?php
                
                }
                
                ?>
                
                <?php
                
                else {
                
                ?>
                
                <div>
                
                    <b>Price:</b> <?php echo $find_rs['Price']; ?>
                    
                </div>
                
                <?php
                
                } // Displays Price if Present
                
                ?>
                
                <!-- End of Price -->

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