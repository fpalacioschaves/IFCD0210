<?php
  // The plain text password to be hashed
  $plaintext_password = "Password@123";
  
  // The hash of the password that
  // can be stored in the database
  $hash = password_hash($plaintext_password, PASSWORD_DEFAULT);

        //Hay diferentes métodos:
        //PASSWORD_DEFAULT
        //PASSWORD_BCRYPT
        //PASSWORD_ARGON2I
        //PASSWORD_ARGON2ID
  
  // Print the generated hash
  echo "Original Pass: " . $plaintext_password . "<br>";
  echo "Generated hash: ".$hash . "<br>";
  
    // Verify the hash against the password entered
    $verify = password_verify($plaintext_password, $hash);
    
    // Print the result depending if they match
    if ($verify) {
        echo 'Password Verified!';
    } else {
        echo 'Incorrect Password!';
    }
?>