<?php
// for better loginggi system for more easily and secure

// deafult algorithm and array of options for encryption
echo password_hash('secret' , PASSWORD_DEFAULT, array('cost' => 10));
// phpinfo();





?>