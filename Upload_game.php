<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["game_file"]) && $_FILES["game_file"]["error"] == 0) {
        // Specify directory where the game will be stored on the flash cartridge
        $target_dir = "gba_games/";
        $target_file = $target_dir . basename($_FILES["game_file"]["name"]);
        
        // Move the uploaded file to the specified directory
        if (move_uploaded_file($_FILES["game_file"]["tmp_name"], $target_file)) {
            echo "The game file " . basename($_FILES["game_file"]["name"]) . " has been uploaded.";
            
            // Optionally, you can use additional code here to transfer the game file to the flash cartridge
            // This might involve additional steps depending on the specific flash cartridge you are using
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Error: No file uploaded or file upload error occurred.";
    }
}
?>