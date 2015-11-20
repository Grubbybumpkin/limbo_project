<!--
By Antonio DelVecchio and Leo Keefe
-->
<!DOCTYPE html>
<html>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

# If user opened the page without submitting, initialize the fields
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'GET' ) {
  $id = "" ;
  $location_id = "" ;
  $description = "" ;
  $create_date = "" ;
  $update_date = "" ;
  $room = "" ;
  $owner = "" ;
  $finder = "" ;
  $status = "";
}

# Setting values upon submission    
if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

    $location_id = $_POST['location_id'] ;
    $description = $_POST['description'] ;
    $room = $_POST['room'] ;
    #$owner = $_POST['owner'] ;
    $finder = $_POST['finder'] ;
    $status = $_POST['status'] ;
    
# Initialize an error array.
  $errors = array();
    
    $location_id = $_POST['location_id'] ;
    $description = $_POST['description'] ;
    #$create_date = $_POST['create_date'] ;
    #$update_date = $_POST['update_date'] ;
    $room = $_POST['room'] ;
    #$owner = $_POST['owner'] ;
    $finder = $_POST['finder'] ;
    $status = $_POST['status'] ;
    
  # Check for location_id and description

    if ( empty( $_POST[ 'location_id' ] ) ) {
        $errors[] = 'location_id' ;
    }
    else {
        $location_id = trim( $location_id )  ;
    }
    
    if ( empty( $_POST[ 'description' ] ) ) {
        $errors[] = 'description' ;
    }
    else {
        $description = trim( $description )  ;
    }
    
# Report result and add to table
  if( !empty( $errors ) )
  {
    echo 'Error! Please enter your  ' ;
    foreach ( $errors as $field ) { echo " - $field " ; }
  }
  else {
  	echo "<p>Success!</p>" ;
    insert_record($dbc, $location_id, $description, $room, $finder, $status);
  } 
}

# Show the records
show_link_records($dbc);
  if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
    if(isset($_GET['id']))
        show_link_record($dbc, $_GET['id']) ;
}

# Close the connection
mysqli_close( $dbc ) ;
?>

<!-- Get inputs from the user. -->
<form action="alphalimbo.php" method="POST">
<table>
    <tr>
        <td>Location ID:</td><td><input type="text" name="location_id" value = 
        "<?php if (isset($_POST['location_id'])) echo $_POST['location_id']; ?>"></td>
    </tr>
    <tr>
        <td>Description:</td><td><input type="text" name="description" value = 
        "<?php if (isset($_POST['description'])) echo $_POST['description']; ?>"></td>
    </tr>
    <tr>
        <td>Room:</td><td><input type="text" name="room" value = 
        "<?php if (isset($_POST['room'])) echo $_POST['room']; ?>"></td>
    </tr>
      <tr>
        <td>Finder:</td><td><input type="text" name="finder" value = 
        "<?php if (isset($_POST['finder'])) echo $_POST['finder']; ?>"></td>
    </tr>
</table>
<table>
    <tr>
        <td>Item Status:</td>
        <td>
            <select name = "status">
                <option value="lost">Lost</option>
                <option value="claimed">Claimed</option>
                <option value="found">Found</option>
            </select>   
        </td>    
    </tr>  
</table>
<p><input type="submit" ></p>
</form>
</html>
