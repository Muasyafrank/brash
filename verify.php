<?php
include 'db.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];
    
    // find the user with the matching token
    $stmt = $conn->prepare("SELECT * FROM users WHERE verification_token = ?");
    $stmt->bind_param("s",$token);
    $stmt->execute();
    $result = $stmt->get_result();

    if(result->num_rows ==1){
        // Marking the user as verified
        $update_stmt = $conn->prepare("UPDATE users SET is_verified = 1,verification_token =NULL WHERE verification_token = ?");
        $update_stmt->bind_param("s",$token);
        
        if($update_stmt->execute()){
            echo "Email  verified successfully!You can "<a href="">Login</a>
        }
    }
}