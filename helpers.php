
<?php
$debug = true;

# Shows the records in prints

#shows link records
function show_link_records($dbc) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM stuff' ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# rendering the table start.
        echo '<H1>Stuff</H1>' ;
        echo '<TABLE border = "3">';
        echo '<TR>';
        echo '<TH>ID</TH>';
        echo '<TH>Locaton ID</TH>';
        echo '<TH>Description</TH>';
        echo '<TH>Create Date</TH>';
        echo '<TH>Update Date</TH>';
        echo '<TH>Room</TH>';
        echo '<TH>Owner</TH>';
        echo '<TH>Finder</TH>'; 
        echo'<TH>Status</TH>'; 
        echo '</TR>';
      
  		# For each row result, generate a table row
  		while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
        $alink = '<A HREF=alphalimbo.php?id=' . $row['id'] . '>' . $row['id'] . '</A>' ;
        echo '<TR>' ;
        echo '<TD ALIGN=right>' . $alink . '</TD>' ;
        echo '<TD>' . $row['location_id'] . '</TD>' ;
        echo '<TD>' . $row['description'] . '</TD>' ;
        echo '<TD>' . $row['create_date'] . '</TD>' ;
        echo '<TD>' . $row['update_date'] . '</TD>' ;
        echo '<TD>' . $row['room'] . '</TD>' ;
        echo '<TD>' . $row['owner'] . '</TD>' ;
        echo '<TD>' . $row['finder'] . '</TD>' ;
        echo '<TD>' . $row['status'] . '</TD>' ;    
        echo '</TR>' ;
  		}
        
  		# End the table
  		echo '</TABLE>';     

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}

#show individual record from show_link_records above.
function show_link_record($dbc, $id) {
	# Create a query to get the name and price sorted by price
	$query = 'SELECT * FROM stuff WHERE id = ' . $id ;

	# Execute the query
	$results = mysqli_query( $dbc , $query ) ;
	check_results($results) ;

	# Show results
	if( $results )
	{
  		# But...wait until we know the query succeed before
  		# rendering the table start.
        echo '<H1>Stuff</H1>' ;
        echo '<TABLE border = "3">';
        echo '<TR>';
        echo '<TH>ID</TH>';
        echo '<TH>Locaton ID</TH>';
        echo '<TH>Description</TH>';
        echo '<TH>Create Date</TH>';
        echo '<TH>Update Date</TH>';
        echo '<TH>Room</TH>';
        echo '<TH>Owner</TH>';
        echo '<TH>Finder</TH>'; 
        echo'<TH>Status</TH>'; 
        echo '</TR>';
      
  		# For selected row, generate table
        if ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  		{
        echo '<TR>' ;
        echo '<TD>' . $row['id'] . '</TD>' ;
        echo '<TD>' . $row['location_id'] . '</TD>' ;
        echo '<TD>' . $row['description'] . '</TD>' ;
        echo '<TD>' . $row['create_date'] . '</TD>' ;
        echo '<TD>' . $row['update_date'] . '</TD>' ;
        echo '<TD>' . $row['room'] . '</TD>' ;
        echo '<TD>' . $row['owner'] . '</TD>' ;
        echo '<TD>' . $row['finder'] . '</TD>' ;
        echo '<TD>' . $row['status'] . '</TD>' ;
        echo '</TR>' ;
  		}

  		# End the table
  		echo '</TABLE>';

  		# Free up the results in memory
  		mysqli_free_result( $results ) ;
	}
}


# Inserts a record into the stuff table
function insert_record($dbc, $location_id, $description, $room, $owner, $finder, $status) {
$query = 'INSERT INTO stuff(location_id, description, create_date, update_date, room, owner, finder, status) 
VALUES ("' . $location_id . '" , "' . $description . '" , NOW() , NOW() , "' . $room . '" , "NA" , "' . $finder . '" , "' . $status . '")' ;
           
  show_query($query);
  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;
  return $results ;
}

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}

/*
# Checks if number is valid
function valid_number ($number) {
  if(empty($number) || !is_numeric($number))
    return false ;
   else {
    $number = intval($number);
    if($number <= 0 || $number >= 45)
      return false;
    }
    return true;
 } 

# Checks if name is valid
function valid_name($name) {
  if(empty($name)) 
    return false;
   else
    return true;
}

function validate_insert($dbc, $number, $fname, $lname){
  if(!valid_number($number))
    echo "<p style='color:red;font-size:16px;'>Please give a valid number!!!</p>"; 
  if (!valid_name($fname))
    echo "<p style='color:red;font-size:16px;'>Please complete the first name!!!</p>";
  if (!valid_name($lname))
    echo "<p style='color:red;font-size:16px;'>Please complete the last name!!!</p>";
  else
    insert_record($dbc,$number,$fname,$lname) ;
}
*/
?> 
