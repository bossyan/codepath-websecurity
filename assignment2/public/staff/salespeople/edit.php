<?php
require_once('../../../private/initialize.php');

$errors = [];


if(!isset($_GET['id'])) {
  redirect_to('index.php');
}
$salespeople_result = find_salesperson_by_id($_GET['id']);
// No loop, only one result
$salesperson = db_fetch_assoc($salespeople_result);

if(is_post_request()) {
    $salesperson = [
        'first_name'  => $_POST['first_name']  ?? '',
        'last_name'   => $_POST['last_name']   ?? '',
        'email'       => $_POST['email']       ?? '',
        'phone'       => $_POST['phone']       ?? '',
        'id'          => $_GET['id']           ?? ''
    ];

    $result = update_salesperson($salesperson);
    if($result === true) {
      redirect_to('show.php?id=' . $salesperson['id']);
    } else {
      $errors = $result;
    }
}

?>


<?php $page_title = 'Staff: Edit Salesperson ' . h($salesperson['first_name']) . " " . h($salesperson['last_name']); ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<div id="main-content">
  <a href="./index.php">Back to Salespeople List</a><br />

  <h1>Edit Salesperson: <?php echo h($salesperson['first_name']) . " " . h($salesperson['last_name']); ?></h1>
  <?php echo display_errors($errors); ?>
  <form method="POST" action="<?php echo h($_SERVER["REQUEST_URI"]); ?>">
    <p>First name:</p>
    <input name="first_name" type="text" value="<?php echo h($salesperson['first_name']); ?>"/>
    <p>Last name:</p>
    <input name="last_name" type="text" value="<?php echo h($salesperson['last_name']); ?>" />
    <p>Email:</p>
    <input name="email" type="text" value="<?php echo h($salesperson['email']); ?>"/>
    <p>Phone Number:</p>
    <input name="phone" type="text" value="<?php echo h($salesperson['phone']); ?>"/>
    <br />
    <br />
    <button type="submit">Update</button>
  </form>
  <br />
  <a href="./show.php?id=<?php echo $_GET['id']; ?>">Cancel</a>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
