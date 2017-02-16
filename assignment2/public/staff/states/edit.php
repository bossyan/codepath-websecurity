<?php
require_once('../../../private/initialize.php');
$errors = [];

if(is_post_request()) {
    $state = [
        'name'       => $_POST['name']       ?? '',
        'code'       => $_POST['code']       ?? '',
        'country_id' => $_POST['country_id'] ?? '',
        'id'         => $_GET['id']          ?? ''
    ];

    $result = update_state($state);
    if($result === true) {
      redirect_to('show.php?id=' . $state['id']);
    } else {
      $errors = $result;
    }
}

if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$states_result = find_state_by_id($_GET['id']);
// No loop, only one result
$state = db_fetch_assoc($states_result);
?>
<?php $page_title = 'Staff: Edit State ' . $state['name']; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="./index.php">Back to States List</a><br />

  <h1>Edit State: <?php echo h($state['name']); ?></h1>

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
    <button type="submit">Update</button>
  </form>
  <br />
  <a href="./show.php?id=<?php echo $_GET['id']; ?>">Cancel</a>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
