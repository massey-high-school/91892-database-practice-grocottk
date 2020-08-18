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
                
                <!-- Ratings -->
                
                <div class="flex-container"> <!-- Ratings 'flex-container' -->
                
                <!-- Star Rating 'div' -->
                    
                <!-- The Partial Stars Original Source can be found at the following link: https://codepen.io/Bluetidepro/pen/GkpEa -->
                    
                    <div class="star-ratings-sprite">
                        
                    </div> <!-- End of Star Rating 'div' -->
                    
                    <!-- Text Rating 'div' -->
                    
                    <div class="actual-rating">
                        
                        (<?php echo $find_rs['Average User Rating'] ?> based on <?php echo number_format($find_rs['User Rating Count']) ?> ratings)
                    
                    </div> <!-- End of Text Rating 'div' -->
                
                
                </div> <!-- End of Ratings 'flex-container' -->
                
                <!-- End of Ratings -->
                
                <!-- Price -->
                
                <?php
                
                if($find_rs['Price'] == 0) {
                
                ?>
                
                <div>
                    
                    Free
                    
                    <?php 
                    
                        if($find_rs['Purchases?'] == 1)
                            
                        {
                            
                            ?>
                    
                            (Contains In-App Purchases)
                    
                            <?php
                            
                        } // End of In-App Purchases 'if statement'
                    ?>
                    
                </div> <!-- Does not print Price (prints "Free") -->
                
                <?php
                
                } // End of find_rs if
                
                
                else {
                
                ?>
                
                <div>
                
                    <b>Price:</b> $<?php echo $find_rs['Price']; ?>
                    
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