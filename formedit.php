<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Basic CRUD PHP PDO by devbanban.com 2021</title>
  </head>
  <body>
    <?php
    if(isset($_GET['id'])){
      require_once 'connect.php';
      $stmt = $conn->prepare("SELECT* FROM project WHERE id=?");
      $stmt->execute([$_GET['id']]);
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      //ถ้าคิวรี่ผิดพลาดให้กลับไปหน้า index
      if($stmt->rowCount() < 1){
          header('Location: Sindex.php');
          exit();
      }
    }//isset
    ?>
    <div class="container">
      <div class="row">
        <div class="col-md-4"> <br>
          <h4>ฟอร์มแก้ไขข้อมูล</h4>
          <form action="formEdit_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
            <div class="col-sm-9">
            <input type="text" name="name" class="form-control" required value="<?= $row['name'];?>" minlength="3">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label">ชั้นปี</label>
            <div class="col-sm-9">
            <input type="text" name="year" class="form-control" required value="<?= $row['name'];?>" minlength="3">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label">ชื่อเอกสาร
            </label>
            <div class="col-sm-9">
            <input type="text" name="doc_name" class="form-control" required value="<?= $row['name'];?>" minlength="3">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label">เอกสาร</label>
            <div class="col-sm-9">
            <input type="text" name="doc_file" class="form-control" required value="<?= $row['name'];?>" minlength="3">
            </div>
            </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12"></div>
          <input type ="submit" name="btn_insert" class="btn btn-success" value="แก้ไข">
          <a href="../html5/student.html" class="btn btn-info">หน้าหลัก</a>
        </div>
    </div>
  </body>
</html>