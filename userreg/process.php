<?php

require_once('config.php');
?>
<?php

if (isset($_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    // $password = sha1($_POST['password']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password ) VALUES(?,?,?)"; // positional arg
    $stmtinsert = $db->prepare($sql); // https://www.php.net/manual/en/pdo.prepare.php
    $result = $stmtinsert->execute([$username, $email, $password]); // https://www.php.net/manual/en/pdostatement.execute.php
                                                                    // short array syntax
    if ($result) {
        echo 'Successfully saved.';
    } else {
        echo 'There were erros while saving the data.';
    }
} else {
    echo 'No data';
}
