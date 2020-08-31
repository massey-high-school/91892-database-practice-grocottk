        <div class="box side">
           
           <h2>Add an App | <a class="side" href="showall.php">Show All</a></h2>
           
            <form class="searchform" method="post" action="name_dev.php" enctype="multipart/form-data">

                <input class="search" type="text" name="dev_name" size="50" value="" required placeholder="App Name and/or Developer Name..."/>
                
                <input class="submit" type="submit" name="find_game_name" value="&#xf002;" />
                
            </form>
            
            <form class="searchform" method="post" action="free_no_iap.php" enctype="multipart/form-data">
            
                <input class="submit free" type="submit" name="free_no_iap" size="1000" value="Search for Free Apps with no In-App Purchases &nbsp; &#xf002;" />

            </form>
            
            <br />
            <hr />
            <br />
            
            <div class="advanced-frame"> <!-- Advanced Frame -->
                
            <h2>Advanced Search</h2>

            <form class="searchform" method="post" action="advanced.php" enctype="multipart/form-data">
                
            <input class="adv" type="text" name="app_name" size="40" value="" placeholder="App Name and/or Title..."/>
                
            <input class="adv" type="text" name="dev_name" size="40" value="" placeholder="Developer..."/>

            <!-- Genre Dropdown -->
            
            <select class="search adv" name="genre">
                
            <option value="" disabled selected>Genre...</option>
                
            <!-- Get Options from Database -->

            <?php
                
                $genre_sql="SELECT *
FROM `L2_91892_genre_practice`
ORDER BY `L2_91892_genre_practice`.`Genre` ASC";
                $genre_query=mysqli_query($dbconnect, $genre_sql);
                $genre_rs=mysqli_fetch_assoc($genre_query);
                
                do {
                    
                    ?>
                
                <option value="<?php echo $genre_rs['Genre']; ?>"><?php echo $genre_rs['Genre']; ?></option>
                
                <?php
                    
                } // End of Genre 'do' loop
                
                while ($genre_rs=mysqli_fetch_assoc($genre_query))
                
                ?>
                
            </select>
                
            <!-- Cost -->
            
            <div class="flex-cpntainer">
                
                <div class="adv-txt">
                    
                    Cost&nbsp;(less&nbsp;than):
                
                </div> <!-- End of Cost Label -->
                
                <div>
                    
                    <input class="adv" type="text" name="cost" size="40" value="" placeholder="Dollars..."/>
                
                </div> <!-- End of Cost Input Box -->
                
            </div> <!-- End of Cost ('flexbox') -->
            
            <!-- In-App Purchases Checkbox -->
                
                
                
            <!-- Rating -->
                
            <!-- Age -->
                
            <!-- Search Submit Button: -->
            
            <input class="submit advanced-button" type="submit" name="advanced" value="Search &nbsp; &#xf002;" />

            </form>
                
            </div> <!-- End of Advanced Frame -->
            
        </div> <!-- End of Side Bar -->
        
        <div class="box footer">
            CC Kahlil Grocott 2020
        </div> <!-- / footer -->
                
        
    </div> <!-- / wrapper -->
    
            
</body>