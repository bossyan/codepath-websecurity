<?php
require_once('../../../private/initialize.php');
$errors = [];
if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$territories_result = find_territory_by_id($_GET['id']);
// No loop, only one result
$territory = db_fetch_assoc($territories_result);

$territory = [
    'id'       => $territory['id'],
    'state_id' => $territory['state_id'],
    'name'     => $_POST['name']         ?? $territory['name'],
    'position' => $_POST['position']     ?? $territory['position'],
];
if(is_post_request()) {
  $result = update_territory($territory);
  if($result === true) {
      redirect_to('show.php?id=' . $territory['id']);
  } else {
      $errors = $result;
  }
}

?>
<?php $page_title = 'Staff: Edit Territory ' . h($territory['name']); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="../states/show.php?id=<?php echo $territory['state_id']; ?>">Back to State Details</a><br />

  <h1>Edit Territory: <?php echo h($territory['name']); ?></h1>

  <?php echo display_errors($errors); ?>
  <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <p>Territory Name</p>
    <input type="text" name="name" value="<?php echo h($territory['name']); ?>" />
    <p>Territory Position</p>
    <input type="text" name="position" value="<?php echo h($territory['position']); ?>" />
    <br />
    <br />
    <button type="submit">Update</button>
  </form>
  <br />
  <a href="./show.php?id=<?php echo $_GET['id']; ?>">Cancel</a>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
