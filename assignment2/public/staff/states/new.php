<?php
require_once('../../../private/initialize.php');
?>
<?php $page_title = 'Staff: New State'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php

$errors = [];
$state = [
    'name'       => $_POST['name']       ?? '',
    'code'       => $_POST['code']       ?? '',
    'country_id' => $_POST['country_id'] ?? ''
];

if(is_post_request()) {
    $result = insert_state($state);
    if($result === true) {
        $new_id = db_insert_id($db);
        redirect_to('show.php?id=' . $new_id);
    } else {
        $errors = $result;
    }
}

?>

<div id="main-content">
  <a href="./index.php">Back to States List</a><br />

  <h1>New State</h1>
  <?php echo display_errors($errors); ?>
  <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <p>Country Name</p>
    <input type="text" name="name" value="<?php echo h($state['name']); ?>" />
    <p>Country Code</p>
    <input type="text" name="code" value="<?php echo h($state['code']); ?>" />
    <p>Country ID</p>
    <input type="text" name="country_id" value="<?php echo h($state['country_id']); ?>" />
    <br />
    <br />
    <button type="submit">Add</button>
  </form>
</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
