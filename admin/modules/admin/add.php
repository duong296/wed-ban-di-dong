<?php
   $open = "category";
   
   require_once __DIR__. "/../../autoload/autoload.php" ;
   $admin = $db->fetchAll("admin");
        $error = array();
        $data = array();
        if (!empty($_POST['add_action']))
        {
            // Lấy dữ liệu
            $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
            $data['phone'] = isset($_POST['phone']) ? $_POST['phone'] : '';
            $data['password'] = isset($_POST['password']) ? $_POST['password'] : '';
            $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
            $data['address'] = isset($_POST['address']) ? $_POST['address'] : '';
            $data['level'] = isset($_POST['level']) ? $_POST['level'] : '';
            //bắt lỗi
            if (empty($data['name'])){
                $error['name'] = '* mời bạn điền tên đăng nhập';
            }

             if (empty($data['phone'])){
                $error['phone'] = '* nhập số điện thoại của bạn';
            }

            if (empty($data['address'])){
                $error['address'] = '* mời bạn địa chỉ của mình';
            }
            
            if (empty($data['password'])){
                $error['password'] = '* mời bạn nhập password';
            }

            if (empty($data['email'])){
                $error['email'] = '* mời bạn nhập email';
            }

            // Lưu dữ liệu
            if (!$error) {
              if (isset($_FILES['thumbnair'])) 
                {
                  $file_name = $_FILES['thumbnair']['name'];
                  $file_tmp = $_FILES['thumbnair']['tmp_name'];
                  $file_type = $_FILES['thumbnair']['type'];
                  $file_error = $_FILES['thumbnair']['error'];

                  if ($file_error == 0)
                  { 
                    $part = ROOT ."admin";
                    $data['thumbnair'] = $file_name;
                  }
                }
              

               $id_insert = $db->insert("admin",$data);
                if ($id_insert) {
                  move_uploaded_file($file_tmp,$part.$file_name);
                  $_SESSION['success']= "thêm mới thành công ";
                  redirectAdmin("admin");
                }
                else{
                  $_SESSION['error']= "thêm mới thất bại";
                }
            }

        }
?>
 <?php require_once __DIR__. "/../../layouts/header.php" ; ?>
    <div id="content-wrapper">
      <h1>
       THÊM MỚI ADMIN
      </h1>
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="http://localhost/didong/admin/">Trang chủ admin</a>
            </li>
            <li class="breadcrumb-item">
              <a href="http://localhost/didong/admin/modules/admin/">admin</a>
            </li>
            <li class="breadcrumb-item active">thêm mới admin</li>
          </ol>
        </div>
        <div class="forms-add">
           <form class="form-horizontal" role="form" method="post" action="add.php" enctype="multipart/form-data"">


            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">họ và tên</label>
              <div class="col-sm-8">
                <input type="text"  name="name" class="form-control" id="inputEmail3" placeholder="tên" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>"/>
                <p class="text-danger"><?php echo isset($error['name']) ? $error['name'] : ''; ?></p>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">email</label>
              <div class="col-sm-8">
                <input type="email"  name="email" class="form-control" id="inputEmail3" placeholder="email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>"/>
                <p class="text-danger"><?php echo isset($error['email']) ? $error['email'] : ''; ?></p>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">số điện thoại</label>
              <div class="col-sm-3">
                <input type="number"  name="phone" class="form-control" id="inputEmail3" placeholder="số điện thoại" value="<?php echo isset($data['phone']) ? $data['phone'] : ''; ?>"/>
                <p class="text-danger"><?php echo isset($error['phone']) ? $error['phone'] : ''; ?></p>
              
              </div>
            </div>

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">password</label>
              <div class="col-sm-3">
                <input type="password"  name="password" class="form-control" id="inputEmail3" placeholder="******" />
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">xách nhận password </label>
              <div class="col-sm-3">
                <input type="password"  name="re_password" class="form-control" id="inputEmail3" placeholder="******"  required="" />
              </div>
            </div>

             

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"> level</label>
              <div class="col-sm-3">
                <select class="form-control" name="level">
                  <option value="1"  <?php echo isset($data['level']) && $data['level'] == 1 ? "selected='selected'": ''?>>CTV</option>
                  <option value="2" <?php echo isset($data['level']) && $data['level'] == 1 ? "selected='selected'": ''?>>admin</option>
                </select>
              </div>
            </div>

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">địa chỉ</label>
              <div class="col-sm-8">
                <textarea type="text"  name="address" class="form-control" id="inputEmail3"></textarea>
                <p class="text-danger"><?php echo isset($error['address']) ? $error['address'] : ''; ?></p>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="add_action" value="Gửi liên hệ" class="btn btn-success">lưu</button>
              </div>
            </div>
          </form>
        </div>

      
</div>
 <?php require_once __DIR__. "/../../layouts/footer.php" ; ?>
 