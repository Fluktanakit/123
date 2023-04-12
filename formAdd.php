
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>อัปโหลดเอกสาร</title>
  </head>
  <body> 
    <div class="container">
      <h1>INSERT PDF FILE</h1>
      <form action="formAdd_db.php" method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label">ชื่อ-นามสกุล</label>
            <div class="col-sm-9">
                <input type="text" name="name" class="form-control" placeholder="ชื่อ-นามสกุล ">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label">ชั้นปี</label>
            <div class="col-sm-9">
                <input type="text" name="year" class="form-control" placeholder="ชั้นปี">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label">ชื่อเอกสาร
            </label>
            <div class="col-sm-9">
                <input type="text" name="doc_name" class="form-control" placeholder="ชื่อเอกสาร">
            </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
            <label for="name" class="col-sm-3 control-label">เอกสาร</label>
            <div class="col-sm-9">
                <input type="file" name="doc_file" class="form-control">
            </div>
            </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12"></div>
          <input type ="submit" name="btn_insert" class="btn btn-success" value="Insert">
          <a herf="index.php" class ="btn btn-danger">cancal</a>
        </div>
    </div>
    </body>
</html>
    