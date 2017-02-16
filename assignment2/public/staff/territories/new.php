<?php
require_once('../../../private/initialize.php');
?>
<?php $page_title = 'Staff: New Territory'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>
<?php

$stateId = isset($_GET['state_id']) ? '?id='.$_GET['state_id'] : '';

$territory = [
    'name'     => $_POST['name']     ?? '',
    'position' => $_POST['position'] ?? '',
    'state_id' => $_GET['state_id']  ?? ''
];
$errors = [];


if(is_post_request()) {
  $result = insert_territory($territory);
  if($result === true) {
      $new_id = db_insert_id($db);
      redirect_to('show.php?id=' . $new_id);
  } else {
      $errors = $result;
  }
}

?>

<div id="main-content">
  <a href="../states/show.php<?php echo $stateId; ?>">Back to State Details</a><br />

  <h1>New Territory</h1>

  <?php echo display_errors($errors); ?>
  <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <p>Territory Name</p>
    <input type="text" name="name" value="<?php echo h($territory['name']); ?>" />
    <p>Territory Position</p>
    <input type="text" name="position" value="<?php echo h($territory['position']); ?>" />
    <br />
    <br />
    <button type="submit">Add</button>
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
