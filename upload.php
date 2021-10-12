<?php 
/**
 * Multiple Upload Images PHP By AppzStory
 *
 * @link https://appzstory.dev
 * @author Yothin Sapsamran (Jame AppzStory Studio)
 */  
require_once 'connect.php';
/**เช็คว่ากดปุ่ม submit form มาแล้วหรือยัง */
if( isset($_POST['submit']) ){

    /** loop ข้อมูลรูปภาพทั้งหมดเพื่อทำรายการต่อไป */
    foreach( $_FILES['upload']['tmp_name'] as $key => $tmp_name ){
        /** เข้าถึงรายชื่อรูปภาพทั้งหมด */
        $file_names = $_FILES['upload']['name'];
        /** เข้าถึงนามสกุลไฟล์ของรูปภาพ */
        $extension = strtolower(pathinfo($file_names[$key], PATHINFO_EXTENSION));
        /** นามสกุลรูปภาพที่อนุญาตให้ใช้งานได้ */
        $supported = array('pdf','jpg', 'jpeg', 'png', 'gif');
        /** เช็คนามสกุลรูปภาพว่าตรงตามที่กำหนดไว้หรือไม่ */
        if( in_array($extension, $supported) ){
            /** สร้างชื่อรูปภาพขึ้นมาใหม่ */
            $new_name = rand(0,microtime(true)).'.'.$extension;
            /** ทำการย้ายรูปภาพเข้าสู่โฟลเดอร์ */
            if(move_uploaded_file($_FILES['upload']['tmp_name'][$key], "uploads/".$new_name)){
                $params = array(
                    'image' => $new_name,
                    'product_id' => 1, /** ตัวอย่าง FK สำหรับอ้างถึงว่า รูปภาพที่บันทึกนี้ ถูกใช้กับข้อมูลอะไร */
                    'datetime' => date("Y-m-d h:i:s")
                );
                /** เพิ่มข้อมูลชื่อรูปภาพเข้าสู่ฐานข้อมูล */
                $sql = "INSERT INTO images (image, product_id, created_at) 
                        VALUES (:image, :product_id, :datetime)";
                $stmt = $conn->prepare($sql);
                $stmt->execute($params);
            }else{
                echo '<script> alert("ไม่สามารถอัพโหลดไฟล์ได้") </script>';
                header('Refresh:0; url= ./'); 
                exit();
            }
        } else {
            echo '<script> alert("ไม่รองรับนามสกุลไฟล์นี้: '.$extension.'") </script>';
            header('Refresh:0; url= ./'); 
            exit();
        }
    }

    echo '<script> alert("อัปโหลดรูปภาพทั้งหมดจำนวน: '.count($_FILES['upload']['tmp_name']).' ไฟล์ เรียบร้อยแล้ว") </script>';
    header('Refresh:0; url= ./'); 
    exit();

} else {
    header('Location: ./');
}