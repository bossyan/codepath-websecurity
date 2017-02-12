<?php
require_once('../../../private/initialize.php');
?>
<?php $page_title = 'Staff: New Salesperson'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

<?php
$salesperson = [
    'first_name'  => $_POST['first_name']  ?? '',
    'last_name'   => $_POST['last_name']   ?? '',
    'email'       => $_POST['email']       ?? '',
    'phone'       => $_POST['phone']       ?? ''
];
$errors = [];

if(is_post_request()) {
    $errors = validate_salesperson($salesperson);

    insert_salesperson($salesperson);
}

?>

<div id="main-content">
  <a href="./index.php">Back to Salespeople List</a><br />

  <h1>New Salesperson</h1>
  <?php echo display_errors($errors); ?>

  <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <p>First name:</p>
    <input name="first_name" type="text" value="<?php echo $salesperson['first_name']; ?>"/>
    <p>Last name:</p>
    <input name="last_name" type="text" value="<?php echo $salesperson['last_name']; ?>" />
    <p>Email:</p>
    <input name="email" type="text" value="<?php echo $salesperson['email']; ?>"/>
    <p>Phone Number:</p>
    <input name="phone" type="text" value="<?php echo $salesperson['phone']; ?>"/>
    <br />
    <br />
    <button type="submit">Create</button>
  </form>

</div>

<?php include(SHARED_PATH . '/footer.php'); ?>
