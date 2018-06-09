<?php

// Usage 2:
$options = [
  'cost' => 11
];
$hash = password_hash('1234', PASSWORD_BCRYPT, $options);
// $2y$11$6DP.V0nO7YI3iSki4qog6OQI5eiO6Jnjsqg7vdnb.JgGIsxniOn4C
echo $hash;
if (password_verify("1234", $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}
?>