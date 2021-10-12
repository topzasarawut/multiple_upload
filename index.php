<?php 
/**
 * Multiple Upload Images PHP By AppzStory
 *
 * @link https://appzstory.dev
 * @author Yothin Sapsamran (Jame AppzStory Studio)
 */ 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico">
    <title>Multiple Upload Images PHP By AppzStory</title>
</head>
<body>
    <h1>Multiple Upload Images PHP</h1>
    <h3>ทำการเลือกรูปภาพได้หลายๆรูป</h3>
    <form method="post" action="upload.php" enctype="multipart/form-data">
        <!-- ตัวแปร input จำเป็นที่จะต้องใส่ [] ไว้ในแอตทริบิวต์ name ด้วยเสมอตามตัวอย่าง -->
        <input type="file" name="upload[]" id="upload" multiple="multiple" accept="image/*">
        <input name="submit" type="submit" value="อัปโหลดภาพ">
    </form>
</body>
</html>
