<?php
 //ถ้ามีค่าส่งมาจากฟอร์ม
    if(isset($_POST['Sname']) && isset($_POST['year']) && isset($_POST['doc_name']) && isset($_POST['doc_file'])){
    //ไฟล์เชื่อมต่อฐานข้อมูล
    require_once 'connect.php';
    $date1 = date("Ymd_His");
    $numrand = (mt_rand());
    $doc_file = (isset($_POST['doc_file']) ? $_POST['doc_file'] : '');
    $upload=$_FILES['doc_file']['name'];
    //ประกาศตัวแปรรับค่าจากฟอร์ม
    $Sname = $_POST['Sname'];
    $year = $_POST['year'];
    if($upload !='') {
        //ตัดขื่อเอาเฉพาะนามสกุล
        $typefile = strrchr($_FILES['doc_file']['name'],".");
    
        //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
        if($typefile =='.pdf'){
    
        //โฟลเดอร์ที่เก็บไฟล์ **สร้างไฟล์ index.php หรือ index.html (ไม่ต้องมี code) ไว้ในโฟลเดอร์ด้วยนะครับจะได้ป้องกันการเข้าถึงทุกไฟล์ในโฟลเดอร์
        $path="docs/";
        //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
        $newname = 'doc_'.$numrand.$date1.$typefile;
        $path_copy=$path.$newname;
        //คัดลอกไฟล์ไปยังโฟลเดอร์
        move_uploaded_file($_FILES['doc_file']['tmp_name'],$path_copy); 
    
         //ประกาศตัวแปรรับค่าจากฟอร์ม
        $doc_name = $_POST['doc_name'];
    //sql insert
    $stmt = $conn->prepare("INSERT INTO upload   (Sname, year,doc_name,doc_file)
    VALUES (:Sname, :year,:doc_name,doc_file)");
    $stmt->bindParam(':Sname', $Sname, PDO::PARAM_STR);
    $stmt->bindParam(':year', $year , PDO::PARAM_STR);
    $stmt->bindParam(':doc_name', $doc_name , PDO::PARAM_STR);
    $stmt->bindParam(':year', $year , PDO::PARAM_STR);
    $result = $stmt->execute();
    $conn = null;
     // sweet alert 
    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if($result){
        echo '<script>
             setTimeout(function() {
              swal({
                  title: "อัพโหลดไฟล์เอกสารสำเร็จ",
                  type: "success"
              }, function() {
                  window.location = "index.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    }else{
       echo '<script>
             setTimeout(function() {
              swal({
                  title: "เกิดข้อผิดพลาด",
                  type: "error"
              }, function() {
                  window.location = "formAdd.php"; //หน้าที่ต้องการให้กระโดดไป
              });
            }, 1000);
        </script>';
    } //else ของ if result


}else{ //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
    echo '<script>
                 setTimeout(function() {
                  swal({
                      title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                      type: "error"
                  }, function() {
                      window.location = "formAdd.php"; //หน้าที่ต้องการให้กระโดดไป
                  });
                }, 1000);
            </script>';
}
    }
}
?>