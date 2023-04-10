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
      <div class="row">
        <div class="col-md-4"> <br> 
          <h4>ฟอร์มเพิ่มข้อมูล</h4>
          <form action="formAdd_db.php" method="post">
            <div class="mb-1">
              <label for="name" class="col-sm-10 col-form-label"> ชื่อ-นามสกุล :  </label>
                <div class="col-sm-10">
                <input type="text" name="name" class="form-control" required minlength="3" placeholder="ชื่อ-นามสกุล">
              </div>
              </div>
              <div class="mb-1">
                <label for="name" class="col-sm-2 col-form-label"> ชั้นปี</label>
                <div class="col-sm-10">
                  <input type="text" name="year" class="form-control" required minlength="3" placeholder="ชั้นปี">
                </div>
                <div class="mb-1">
                <label for="name" class="col-sm-2 col-form-label"> ชื่อเอกสาร</label>
                <div class="col-sm-10">
                  <input type="text" name="doc_name" class="form-control" required minlength="3" placeholder="ชื่อเอกสาร">
                </div>
                <div class="mb-1">
                <label for="name" class="col-sm-2 col-form-label"> เอกสาร</label>
                <div class="col-sm-10">
                <input type="file" name="doc_file" required   class="form-control" accept="application/pdf">
                </div><br>
                <button type="submit" class="btn btn-primary">บันทึก</button>
              </form>
            </div>
          </div>
        </div>
      </body>
    </html>
    