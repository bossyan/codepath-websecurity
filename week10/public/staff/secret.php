<?php
require_once('../../private/initialize.php');
require_login();

if(!isset($_GET['secret'])) {
// Redirect if no ID provided
redirect_to('index.php');
}

$secret = $_GET['secret'];

$secret_result = db_fetch_assoc(get_secret($secret));


$page_title = 'Staff: Secret';
include(SHARED_PATH . '/staff_header.php');
?>

<div id="main-content">

  <h1>Secret</h1>
  <p><?php echo $secret_result ? $secret_result['secret'] : 'Secret key not found.'; ?></p>

</div>

