<?php
include_once("config.php");
$target_dir = "uploads/";
if(isset($_POST['Send'])) {
	testdir("uploads");
	testdir("uploads/".$_POST['name']);

	$path = explode('/',$_SERVER['SCRIPT_URI']);
	unset($path[count($path)-1]);
	$link = implode('/',$path);
	$target_file = $link.'/'.$target_dir .$_POST['name'].'/'. $_FILES["file"]["name"];
    if(move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
		// SEND MESSAGE FOR ADMIN
		@mail("contact-us@hotmail.com",$_POST['title'],$content);
		$content.= "email   : ".$_POST['email']."\n";
		$content.= "file    : <a href='".$target_file."' target='_blank'>".basename($target_file)."</a>\n";
		$content.= "message : ".$_POST['message']."\n";
		// Make Code disable randome nomber min 100 max 10000000
		$code_disable = rand(1000,10000000);
		// SEND CODE DISABLE FOR USER
		$content_user = "code disable : $code_disable\n
						 lien de message : $link/show.php?e=".base64_encode($_POST['email'])."\n";
		@mail($_POST['email'],"Code Disable Your Message",$content_user);
		// Fin send Code Disable
		// sql to insert data into database
		$sql = "INSERT INTO contact
		(username, email, message, file_lien, code_disable, stat)
		VALUES 
		('".$_POST['name']."', '".$_POST['email']."', '".$_POST['message']."', '".$target_file."', '".$code_disable."', '1')";
		if ($conn->query($sql) === FALSE) {
			die("Error insert data: " . $conn->error);
		}{
			echo "<center><h3>تم ارسال الرسالة <br>
			رابط مشاهدة نسخة من الرسالة
			<a href='show.php?e=".base64_encode($_POST['email'])."' > Click Here</a></center></h3>";
		} 	 
    } else {
        echo "File is not upload";
    }
}
// Function part
   function testdir($dir){

        if(!is_dir($dir)) @mkdir($dir);
    }
	
	
	
	$conn->close();
?>
