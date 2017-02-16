<?php

  // is_blank('abcd')
  function is_blank($value='') {
    return !isset($value) || trim($value) == '';
  }

  // has_length('abcd', ['min' => 3, 'max' => 5])
  function has_length($value, $options=array()) {
    $length = strlen($value);
    if(isset($options['max']) && ($length > $options['max'])) {
      return false;
    } elseif(isset($options['min']) && ($length < $options['min'])) {
      return false;
    } elseif(isset($options['exact']) && ($length != $options['exact'])) {
      return false;
    } else {
      return true;
    }
  }

  // has_valid_email_format('test@test.com')
  function has_valid_email_format($value) {
    // Function can be improved later to check for
    // more than just '@'.
    return preg_match("/^[A-Za-z0-9@._]+$/", $value);
  }


  /**
   * My custom validation
   * Check if it's a valid phone number that contains number, parenthesis, or dash
   * @param  string  $number phone number
   * @return boolean true if valid phone number
   */
  function has_valid_phone_number_format($number) {
    return preg_match("/^[0-9 ()-]+$/", $number);
  }

  /**
   * My custom validation
   * Checks if it's a number
   * @param  mixed  $number
   * @return boolean true if valid number
   */
  function isNumber($number)
  {
    return preg_match("/^[0-9]+$/", $number);
  }

  /**
   * My custom validation
   * Checks if input is a valid username containing alphanum, and underscore
   * @param  string  $username
   * @return boolean
   */
  function has_valid_username($username) {
    return preg_match("/^[A-Za-z0-9_]+$/", $username);
  }

  /**
   * My custom validation
   * Checks if input has a valid state code
   * @param  string  $code
   * @return boolean
   */
  function has_valid_state_code($code) {
    return preg_match("/^[A-Z]+$/", $code);
  }

?>
