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

// Set up error field colours / visibility (no errors at first)

$app_error = $description_error = $url_error = $dev_error = $genre_error = "no-error";
    
$app_field = $description_field = $url_field = $dev_field = $genre_field = "form-ok";

// 'Code below executes when the form is submitted...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get values from form:
    
    $app_name = mysqli_real_escape_string($dbconnect, $_POST['app_name']);
    $subtitle = mysqli_real_escape_string($dbconnect, $_POST['subtitle']);
    $url = mysqli_real_escape_string($dbconnect, $_POST['url']);
    
    $genreID = mysqli_real_escape_string($dbconnect, $_POST['genre']);
    
    // 'If 'genreID' is not blank, get genre so that genre so that genre box does not lose its value if there are errors'
    
    if ($genreID != "") {
        
        $genreitem_sql = "SELECT *
FROM `L2_91892_genre_practice`
WHERE `Genre_ID` = $genreID";
        $genreitem_query = mysqli_query($dbconnect, $genreitem_sql);
        $genreitem_rs = mysqli_fetch_assoc($genreitem_query);
        
        $genre = $genreitem_rs['Genre'];
        
    } // 'End [of the] 'genreID' If [statment]
    
    $dev_name = mysqli_real_escape_string($dbconnect, $_POST['developer_name']);
    $age = mysqli_real_escape_string($dbconnect, $_POST['age']);
    $rating = mysqli_real_escape_string($dbconnect, $_POST['rating']);
    $rate_count = mysqli_real_escape_string($dbconnect, $_POST['count']);
    $cost = mysqli_real_escape_string($dbconnect, $_POST['price']);
    $in_app = mysqli_real_escape_string($dbconnect, $_POST['in_app']);
    $description = mysqli_real_escape_string($dbconnect, $_POST['description']);
    
    // ****** Error Checking... ******
    
    // Check App Name is not blank...
    
    if ($app_name == "") {
        $has_errors = "yes";
        $app_error = "error-text";
        $app_field = "form-error";
    }
    
    // Check URL is not blank...
    
    if ($url == "") {
        $has_errors = "yes";
        $url_error = "error-text";
        $url_field = "form-error";
    }
    
    // Check Genre is not blank...
    
    if ($genreID == "") {
        $has_errors = "yes";
        $genre_error = "error-text";
        $genre_field = "form-error";
    }
    
    // Check Developer is not blank...
    
    if ($dev_name == "") {
        $has_errors = "yes";
        $dev_error = "error-text";
        $dev_field = "form-error";
    }
    
    // Check Description is not blank...
    
    if ($description == "") {
        $has_errors = "yes";
        $description_error = "error-text";
        $description_field = "form-error";
    }
    
    // If no errors are present...
    
    if ($has_errors == "no") {
    
    // Transfer to success page...
        
    header('Location: add_success.php');
    
    // 'Get' Developer ID if 'it' exists...
        
        $dev_sql = "SELECT *
FROM `L2_91892_developer_practice`
WHERE `Developer` LIKE '$dev_name'";
        $dev_query = mysqli_query($dbconnect, $dev_sql);
        $dev_rs = mysqli_fetch_assoc($dev_query);
        $dev_count = mysqli_num_rows($dev_query);
    
    // If Developer not already in Developer Table, add them and get the 'new' Developer ID...
        
        if ($dev_count > 0) {
            $developerID = $dev_rs['Developer_ID'];
        }
        
        else {
        $add_dev_sql = "INSERT INTO `grocottk70790`.`L2_91892_developer_practice` (
`Developer_ID` ,
`Developer`
)
VALUES (
NULL , '$dev_name'
);";
        $add_dev_query = mysqli_query($dbconnect, $add_dev_sql);
            
        // Get developer ID
            
        $newdev_sql = "SELECT *
FROM `L2_91892_developer_practice`
WHERE `Developer` LIKE '$dev_name'";
        $newdev_query = mysqli_query($dbconnect, $newdev_sql);
        $newdev_rs = mysqli_fetch_assoc($newdev_query);
            
        $developerID = $newdev_rs['Developer_ID'];
            
        } // End of Adding developer to developer table
    
        
        
    // Add Entry to Database...
    
    $addentry_sql = "INSERT INTO `grocottk70790`.`L2_91892_game_practice` (`ID`, `Name`, `Subtitle`, `Description`, `Age Rating`, `URL`, `Price`, `Developer_ID`, `Genre_ID`, `Average User Rating`, `User Rating Count`, `Purchases?`) VALUES (NULL, '$app_name', '$subtitle', '$description', '$age', '$url', '$cost', '$developerID', '$genreID', '$rating', '$rate_count', '$in_app');";
    $addentry_query = mysqli_query($dbconnect,$addentry_sql);
        
    // Get ID for next page
        
    $getid_sql = "SELECT *
FROM `L2_91892_game_practice`
WHERE `Name` LIKE '$app_name'
ORDER BY `L2_91892_game_practice`.`ID` DESC";
    $getid_query=mysqli_query($dbconnect, $getid_sql);
    $getid_rs=mysqli_fetch_assoc($getid_query);
        
    $ID = $getid_rs['ID'];
    $_SESSION['ID']=$ID;
    
    } // End of 'no errors' if statement
    
} // 'End of Button Submitted code'

?>

        <div class="box main">
            
            <div class="add-entry"> <!-- Add Entry 'div' -->
            
<h2>Add an Entry to this Database</h2>
                
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    
                <!-- 'App Name (Required)' -->
                    
                <div class="<?php echo $app_error; ?>">
                    
                     Please fill in the 'App Name' field     
                    
                </div>
                    
                <input class="add-field <?php echo $app_field; ?>" type="text" name="app_name" value="<?php echo $app_name; ?>" placeholder="App Name and/or Title (Required)..."/>
                    
                <!-- 'Subtitle (Optional)' -->
                    
                <div>
                    
                    <input class="add-field" type="text" name="subtitle" size="40" value="<?php echo $subtitle; ?>" placeholder="Subtitle..."/>
                    
                </div>
                    
                <!-- 'URL (Required, Must start [with] http://)' -->
                    
                <div class="<?php echo $url_error; ?>">
                    
                     Please fill in the 'URL' field
                    
                </div>
                    
                <div>
                    
                    <input class="add-field <?php echo $url_field; ?>" type="text" name="url" size="40" value="<?php echo $url; ?>" placeholder="URL (Required)..."/>
   
                </div>
                    
                <!-- 'Genre Dropdown (Required)' -->
                    
                <div class="<?php echo $genre_error; ?>">
                    
                     Please fill in the 'Genre' field
                    
                </div>
                    
                <select class="adv <?php echo $genre_field; ?>" name="genre">
                    
                    <!-- 'First [and] Selected option' -->
                    
                    <?php
                    
                    if ($genreID=="") {
                        
                        ?>
                    
                    <option value="" selected>Genre ('Choose [an option]')...</option>
                    
                    <?php
                        
                    }
                    
                    else {
                        
                        ?>
                    
                    <option value="<?php echo $genreID ?>" selected><?php echo $genre; ?></option>
                    
                    <?php
                        
                    }
                    
                    ?>
                    
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
                    
                <div class="<?php echo $dev_error; ?>">
                    
                     Please fill in the 'Developer' field
                    
                </div>
                    
                <div>
                    
                    <input class="add-field <?php echo $dev_field; ?>" type="text" name="developer_name" value="<?php echo $dev_name; ?>" size="40" placeholder="Developer Name (Required)..."/>
   
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
                    
                    <b>'[Does this app contain] In-App Purchase[s?]': </b>

                    <!-- '[Default answer is set to 'yes']' -->

                    <!-- 'Note: 'Value' in [this] Database is Boolean, so 'no' becomes '0' and 'yes' becomes '1'' -->
                    
                    <?php
                    
                    if($in_app==1) {
                        
                        // 'Default value, 'Yes' is selected'
                        
                        ?>
                        
                    <input type="radio" name="in_app" value="1" checked="checked" />Yes

                    <input type="radio" name="in_app" value="0" />No
                    
                    <?php
                    
                    } // End of 'yes in_app' 'If' Statement
                    
                    else {
                        
                        ?>
                    
                    <input type="radio" name="in_app" value="1" />Yes
                    
                    <input type="radio" name="in_app" value="0" checked="checked" />No
                    
                    <?php
                        
                    } // End of 'in_app' 'Else' Statement
                    
                    ?>
                    


                </div>

                <br />
                    
                <!-- 'Description text area' -->
                                    
                <div class="<?php echo $description_error; ?>">
                    
                     Please fill in the 'Description' field     
                    
                </div>
                    
                <div>
                    
                    <textarea class="add-field <?php echo $description_field; ?>" name="description" placeholder="Description..." rows="6"><?php echo $description; ?></textarea>
                    
                </div>
                    
                <!-- 'Submit Button' -->
                
                <p>
                    
                    <input class="submit advanced-button" type="submit" value="Submit" />
                    
                </p>
                    
                </form>
                
            </div> <!-- End of 'Add Entry' 'div' -->
            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>