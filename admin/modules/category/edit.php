<?php
   $open = "category";
   require_once __DIR__. "/../../autoload/autoload.php" ;
        $error = array();
        $data = array();
        $id = intval(getInput('id'));

         
        if (isset($_POST['edit_action']))
        {
            // Lấy dữ liệu
            $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
          
            // Lưu dữ liệu
            if (!$error)
            {
              
               $isset = $db->fetchOne("category","name = '".$data['name']."'");
              if (count($isset) > 0)
                {
                   $_SESSION['error']= "tên danh mục dã tồn tại ";
                   redirectAdmin("category");
                }
              else{

                $id_update = $db->update("category",$data,array("id"=>$id));
                if($id_update > 0)
                {
                    $_SESSION['success']= "cập nhật thành công ";
                    redirectAdmin("category");
                }
                else
                {
                     $_SESSION['error']= "cập nhật thất bại";
                     redirectAdmin("category");
                }
            }
          }

        }else{
            $EditCategory = $db->fetchID("category",$id);
           
           if (empty($EditCategory)) {
                $_SESSION['error']= "loi ";
                redirectAdmin("category");
           }
        }
?>
 <?php require_once __DIR__. "/../../layouts/header.php" ; ?>
    <div id="content-wrapper">
      <h1>
      CHỈNH SỬA DANH MỤC 
      </h1>
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="http://localhost/didong/admin/">Trang chủ admin</a>
            </li>
            <li class="breadcrumb-item">
              <a href="http://localhost/didong/admin/modules/category/">Danh mục</a>
            </li>
            <li class="breadcrumb-item active">chỉnh sửa danh mục</li>
          </ol>
        </div>
        <div class="forms-add">
           <form class="form-horizontal" role="form" method="post" action="">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">tên danh mục</label>
              <div class="col-sm-8">
                <input type="text"  name="name" class="form-control" id="inputEmail3" placeholder="tên thư mục" value=" <?php echo $EditCategory['name'] ?>"/>
                <p class="text-danger"><?php echo isset($error['name']) ? $error['name'] : ''; ?></p>
              
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="edit_action"  class="btn btn-success">lưu</button>
                <input type="hidden" name="id" value="<?php echo $id;?>">
              </div>
            </div>
          </form>
        </div>

      
</div>
 <?php require_once __DIR__. "/../../layouts/footer.php" ; ?>
 