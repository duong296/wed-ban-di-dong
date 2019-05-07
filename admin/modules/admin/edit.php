
 <?php
 $open = "category";
   require_once __DIR__. "/../../autoload/autoload.php" ;
        $error = array();
        $data = array();
        $id = intval(getInput('id'));

         
        if (isset($_POST['edit_action']))
        {
           $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
            $data['phone'] = isset($_POST['phone']) ? $_POST['phone'] : '';
            $data['password'] = isset($_POST['password']) ? $_POST['password'] : '';
            $data['email'] = isset($_POST['email']) ? $_POST['email'] : '';
            $data['address'] = isset($_POST['address']) ? $_POST['address'] : '';
            $data['level'] = isset($_POST['level']) ? $_POST['level'] : '';


            if (!$error)
            {
              
             

                $id_update = $db->update("admin",$data,array("id"=>$id));
                if($id_update > 0)
                {
                    $_SESSION['success']= "cập nhật thành công ";
                    redirectAdmin("admin");
                }
                else
                {
                     $_SESSION['error']= "cập nhật thất bại";
                     redirectAdmin("admin");
                }
            }
          

        }else{
            $EditAdmin = $db->fetchID("admin",$id);
           
           if (empty($EditAdmin)) {
                $_SESSION['error']= "loi ";
                redirectAdmin("admin");
           }
        }
?>
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
           <form class="form-horizontal" role="form" method="post" action="" enctype="multipart/form-data"">


            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">họ và tên</label>
              <div class="col-sm-8">
                <input type="text"  name="name" class="form-control" id="inputEmail3" placeholder="tên" value="<?php echo $EditAdmin['name'] ?>"/>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">email</label>
              <div class="col-sm-8">
                <input type="email"  name="email" class="form-control" id="inputEmail3" placeholder="email" value="<?php echo $EditAdmin['email'] ?>"/>
                <p class="text-danger"><?php echo isset($error['email']) ? $error['email'] : ''; ?></p>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">số điện thoại</label>
              <div class="col-sm-3">
                <input type="number"  name="phone" class="form-control" id="inputEmail3" placeholder="số điện thoại" value="<?php echo $EditAdmin['phone'] ?>"/>
                
              
              </div>
            </div>

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">mật khẩu mới của bạn</label>
              <div class="col-sm-3">
                <input type="password"  name="password" class="form-control" id="inputEmail3" placeholder="******" />
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">xách nhận mật khẩu </label>
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
                <textarea type="text"  name="address" class="form-control" id="inputEmail3" value="<?php echo $EditAdmin['address'] ?>" ></textarea>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="edit_action" value="Gửi liên hệ" class="btn btn-success">lưu</button>
              </div>
            </div>
          </form>
        </div>

      
</div>
 <?php require_once __DIR__. "/../../layouts/footer.php" ; ?>
 