<?php # PROCESS LOGIN ATTEMPT.

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
  # Open database connection.
  require ( 'includes/connect_db.php' ) ;

  # Get connection, load, and validate functions.
  require ( 'login_tools.php' ) ;

  # Check login.
  list ( $check, $data ) = validate ( $link, $_POST[ 'email' ], $_POST[ 'pass' ] ) ;

  # On success set session data and display logged in page.
  if ( $check )  
  {
    # Access session.
    session_start();
    $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
    $_SESSION[ 'first_name' ] = $data[ 'first_name' ] ;
    $_SESSION[ 'last_name' ] = $data[ 'last_name' ] ;
    $_SESSION[ 'email' ] = $data[ 'email' ] ;
    $_SESSION[ 'pass' ] = $data[ 'pass' ] ;
    $_SESSION[ 'subscribed' ] = $data[ 'subscribed' ] ;
    $_SESSION[ 'account_type' ] = $data[ 'account_type' ] ;
    load ( 'user_login.php' ) ;
  }
  # Or on failure set errors.
  else { $errors = $data; } 

  # Close database connection.
  mysqli_close( $link) ; 
}

# Continue to display login page on failure.
include ( 'login.php' ) ;

?>