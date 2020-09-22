<?php include("topbit.php");

// 'Get Genre list from Database':

$genre_sql="SELECT * FROM `L2_91892_genre_practice` ORDER BY `L2_91892_genre_practice`.`Genre` ASC ";
$genre_query=mysqli_query($dbconnect, $genre_sql);
$genre_rs=mysqli_fetch_assoc($genre_query);

// 'Initialise form variables'

$app_name = "";
$subtitle = "";
$url = "";
$genreID = "";
$dev_name = "";
$age = "";
$rating = "";
$rate_count = "";
$cost = "";
$in_app = 1;
$description = "";

$has_errors = "no";

// 'Code below executes when the form is submitted...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get values from form:
    
    $app_name = mysqli_real_escape_string($dbconnect, $_POST['app_name']);
    $subtitle = mysqli_real_escape_string($dbconnect, $_POST['subtitle']);
    $url = mysqli_real_escape_string($dbconnect, $_POST['url']);
    $genreID = mysqli_real_escape_string($dbconnect, $_POST['genre']);
    = mysqli_real_escape_string($dbconnect, $_POST['']);
    = mysqli_real_escape_string($dbconnect, $_POST['']);
    = mysqli_real_escape_string($dbconnect, $_POST['']);
    = mysqli_real_escape_string($dbconnect, $_POST['']);


    echo "You pushed the button";
} // 'End of Button Submitted code'

?>

        <div class="box main">
            
            <div class="add-entry"> <!-- Add Entry 'div' -->
            
<h2>Add an Entry to this Database</h2>
                
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    
                <!-- 'App Name (Required)' -->
                    
                <input class="add-field" type="text" name="app_name" value="<?php echo $app_name; ?>" placeholder="App Name and/or Title (Required)..."/>
                    
                <!-- 'Subtitle (Optional)' -->
                    
                <div>
                    
                    <input class="add-field" type="text" name="subtitle" size="40" value="<?php echo $subtitle; ?>" placeholder="Subtitle..."/>
                    
                </div>
                    
                <!-- 'URL (Required, Must start [with] http://)' -->
                    
                <div>
                    
                    <input class="add-field <?php echo $url_field; ?>" type="text" name="url" size="40" value="<?php echo $url; ?>" placeholder="URL (Required)..."/>
   
                </div>
                    
                <!-- 'Genre Dropdown (Required)' -->
                    
                <select class="adv" name="genre">
                    
                    <!-- 'First [and] Selected option' -->
                    
                    <option value="" selected>Genre ('Choose [an option]')...</option>
                    
                    <!-- 'Get options from Database -->
                    
                    <?php
                    
                    do {
                        
                        ?>
                    
                    <option value="<?php echo $genre_rs['Genre_ID']; ?>"><?php echo $genre_rs['Genre']; ?></option>
                    
                    <?php
                    
                    } // 'End of Genre 'do' loop'
                    
                    while ($genre_rs=mysqli_fetch_assoc($genre_query)) ?>
                    
                </select>
                    
                <!-- 'Devel[o]per Name' (Required)' -->
                    
                <div>
                    
                    <input class="add-field <?php echo $dev_field?>" type="text" name="developer_name" value="<?php echo $dev_name; ?>" size="40" placeholder="Developer Name (Required)..."/>
   
                </div>
                    
                <!-- 'Age (Set to 0 if [text box is] left blank)' -->
                    
                <div>
                    
                    <input class="add-field" type="text" name="age" value="<?php echo $age; ?>" placeholder="Age ('0 for all')..."/>
   
                </div>
                    
                <!-- 'Rating (Number between 0 - 5, 1 dp)' -->
                    
                <div>
                    
                    <input class="add-field" type="text" name="rating" value="<?php echo $rating; ?>" step="0.1" min=0 max=5 placeholder="Rating (0-5) [Required]..."/>
   
                </div>
                    
                <!-- '[Number] of Ratings (Integer more than 0)' -->
                    
                <div>
                    
                    <input class="add-field" type="text" name="count" value="<?php echo $rate_count; ?>" placeholder="Number of Ratings..."/>
   
                </div>
                    
                <!-- 'Cost (Decimal 2dp, must be more than 0)' -->
                    
                <div>
                    
                    <input class="add-field" type="text" name="price" value="<?php echo $cost; ?>" placeholder="Cost ('[With] number only')..."/>
   
                </div>
                    
                <br />
                    
                <!-- 'In-App Purchase radio buttons' -->
                    
                <div>
                    
                    <b>'[Does this app contain] In-App Purchase[s?] </b>

                    <!-- '[Default answer is set to 'yes']' -->

                    <!-- 'Note: 'Value' in [this] Database is Boolean, so 'no' becomes '0' and 'yes' becomes '1'' -->

                    <input type="radio" name="in_app" value="1" checked="checked" />Yes

                    <input type="radio" name="in_app" value="0" />No
                    
                </div>

                <br />
                    
                <!-- 'Description text area' -->
                                    
                <div>
                    
                    <textarea class="add-field <?php echo $description_field ?>" name="description" placeholder="Description..." rows="6"><?php echo $description; ?></textarea>
                    
                </div>
                    
                <!-- 'Submit Button' -->
                
                <p>
                    
                    <input class="submit advanced-button" type="submit" value="Submit" />
                    
                </p>
                    
                </form>
                
            </div> <!-- End of 'Add Entry' 'div' -->
            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>