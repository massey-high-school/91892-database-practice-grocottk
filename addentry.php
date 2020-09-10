<?php include("topbit.php");

// 'Initialise form variables'

$app_name = "";
$subtitle = "";
$url = "";
$dev_name = "";
$age = "";
$rating = "";
$rate_count = "";
$cost = "";
$description = "";

$has_errors = "no";

?>

        <div class="box main">
            
            <div class="add-entry"> <!-- Add Entry 'div' -->
            
<h2>Add an Entry to this Database</h2>
                
                <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                
                </form>
                
            </div> <!-- End of 'Add Entry' 'div' -->
            
        </div> <!-- / main -->
        
<?php include("bottombit.php") ?>