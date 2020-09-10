<?php include("topbit.php");

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
$inapp = 1;
$description = "";

$has_errors = "no";

// 'Code below executes when the form is submitted...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "You pushed the button";
} // 'End of Button Submitted code'

?>

        <div class="box main">
            
            <div class="add-entry"> <!-- Add Entry 'div' -->
            
<h2>Add an Entry to this Database</h2>
                
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    
                <!-- 'App Name (Required)' -->
                    
                <input class="add-field" type="text" name="app_name" value="<?php echo $app_name; ?>" required placeholder="App Name and/or Title (Required)..."/>
                    
                <!-- 'Subtitle (Optional)' -->
                    
                <!-- 'URL (Required, Must start [with] http://)' -->
                    
                <!-- 'Genre Dropdown (Required)' -->
                
                <!-- 'Develper Name' (Required)' -->
                    
                <!-- 'Age (Set to 0 if [text box is] left blank)' -->
                    
                <!-- 'Rating (Number between 0 - 5, 1 dp)' -->
                    
                <!-- '[Number] of Ratings (Integer more than 0) -->
                    
                <!-- 'Cost (Decimal 2dp, must be more than 0)' -->
                    
                <!-- 'In-App Purchase radio buttons' -->
                    
                <!-- 'Description text area' -->
                    
                <!-- 'Submit Button' -->
                
                <p>
                    
                    <input class="submit advanced-button" type="submit" value="Submit" />
                    
                </p>
                    
                </form>
                
            </div> <!-- End of 'Add Entry' 'div' -->
            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>