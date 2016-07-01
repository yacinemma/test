<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<title>Contact_us</title>
	</head>
		<style>
			h1{
				background-color: rgb(12, 15, 30);
				padding-top:10px;
				font-size: 16px;
				color: rgb(255, 255, 255);
				text-align: center;
				border-style:none;
				width: 620px;
				height: 29px;
			}
			.intput_information{
				position:absolute;
				width:640px;
				height:480px;
				top: 20px;
				left: 150px;
			}
			.name,input[type="email"]{
				padding-left:10px;
				margin-right:18px;
				margin-bottom:18px;
				float:left;
				background-color: rgb(255, 255, 255);
				border:2px solid rgb(13, 15, 27);
				width: 287px;
				height: 49px;
			}
			.clear{
				clear:both;
			}
			.title{
				padding-left:10px;
				background-color: rgb(255, 255, 255);
				border:2px solid rgb(13, 15, 27);
				width: 608px;
				height: 49px;
				margin-bottom:18px;
			}
			textarea{
				padding-left:10px;
				padding-TOP:10px;
				background-color: rgb(255, 255, 255);
				border:2px solid rgb(13, 15, 27);
				margin-bottom:18px;
				resize:vertical;
			}
			input[type="submit"]{
				background-color: rgb(12, 15, 30);
				position: absolute;
				margin:auto;
				width: 160px;
				height: 55px;
				left:240px;
				font-size: 16px;
				color: rgb(255, 255, 255);
				text-align: center;
				border-style:none;
			}
			.yourBtn{
			   position: relative;
			   top: 150px;
			   font-family: calibri;
			   width: 150px;
			   padding: 10px;
			   -webkit-border-radius: 5px;
			   -moz-border-radius: 5px;
			   border: 1px dashed #BBB; 
			   text-align: center;
			   background-color: #DDD;
			   cursor:pointer;
			}
	</style>
	<script type="text/javascript">
		 function getFile(){
			document.getElementById("upfile").click();
		 }
		 function sub(obj){
			var file = obj.value;
			var fileName = file.split("\\");
			document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
		  }
	</script>
	<body>			
		<div class="intput_information">
		<h1>Contact_Us</h1>
			<form method="POST" action="send.php" enctype="multipart/form-data" name="myForm">
				<input type="text" name="name" placeholder="Name" class="name">
				<input type="email" name="email" placeholder="Email">
				<div class="clear"></div>
				<input type="text" name="title" placeholder="Title Message" class="title">
				<div style='height: 0px; width: 0px;overflow:hidden;'>
					<input id="upfile" type="file" value="upload" onchange="sub(this)" name="file" required />
				</div>
				<div id="yourBtn" onclick="getFile()"  class="title">click to upload a file (<font color=red>required</font>)</div>
				<textarea rows="15" cols="74" name="message" placeholder="Your Message"></textarea><br>
				<input type="submit" name="Send" value="Send Message">
			</form>
		</div>
	</body>
</html>
