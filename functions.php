<?php

function displayAll($result,$key){

    while($row = mysqli_fetch_assoc($result)){
        //display note's title, description and created date
        echo '
                <div class = "notes-container">
                <form action="NotesAction.php" method="post">
                <input type="hidden" name="order" value="'.$row["ORDER_NOTE"].'">
                <button name = "delete" class="Delete"><b>REMOVE</b></button>
                </form>
                <h3><u>'.decrypt($row["NOTE_TITLE"], $key).'</u></h3>
                <p>'.decrypt($row["NOTE_DESC"], $key).'</p><br>
                <small>'.$row["CREATE_DATE"].'</small><br>
                </div>
                <br><br>';
    }

}

//ENCRYPT FUNCTION
function encrypt($data, $key) {
    $encryption_key = base64_decode($key);
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    return base64_encode($encrypted . '::' . $iv);
}

//DECRYPT FUNCTION
function decrypt($data, $key) {
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
}