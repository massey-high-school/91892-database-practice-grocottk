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
                
            <input class="submit advanced-button" type="submit" name="advanced" value="Search &nbsp; &#xf002;" />

            <!-- Genre Dropdown -->
            
            <select name="genre">
                
                <!-- Get Options from Database -->
                
                <!-- The below 'php' brackets will eventually be filled with content -->
                
                <?php
                
                ?>
                
            </select>
            
            </form>
                
            </div> <!-- End of Advanced Frame -->
            
        </div> <!-- End of Side Bar -->
        
        <div class="box footer">
            CC Kahlil Grocott 2020
        </div> <!-- / footer -->
                
        
    </div> <!-- / wrapper -->
    
            
</body>