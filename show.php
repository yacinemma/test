<?
include_once("config.php");
$sql = "SELECT * FROM `contact`";
    if(isset($_GET['e'])){
		$sql .= " WHERE `email` = '".base64_decode($_GET['e'])."' AND `stat` = 1";
		$result = $conn->query($sql);
		if($result->num_rows == 1){
			$rows = $result->fetch_array(MYSQLI_ASSOC);
			echo "<center><form method=post>
			<table border=1>
			<tr>
			<td>name</td>
			<td>email</td>
			<td>message</td>
			<td>Code disable</td>
			</tr>
			<tr>
			<td>".$rows['username']."</td>
			<td>".$rows['email']."</td>
			<td>".$rows['message']."</td>
			<td><input type=text name=code size=30 ></td>
			</tr>
			</table>
			<input type=submit value=Disable name=disable>
			</form></center>";
		}

	}
	if(isset($_POST['disable'])){
	$sql = 	"SELECT * FROM `contact` WHERE `email` = '".base64_decode($_GET['e'])."' AND `code_disable` = '".$_POST['code']."'";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		$update = "UPDATE `contact` SET `stat` = 0 WHERE `email` = '".base64_decode($_GET['e'])."'";
		if ($conn->query($update) !== FALSE) {
			echo "تم إخفاء الرسالة التي أرسلتها بنجاح ";
		}
	}
	}

?>
