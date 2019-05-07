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
            $data['category_id'] = isset($_POST['category_id']) ? $_POST['category_id'] : '';
            $data['price'] = isset($_POST['price']) ? $_POST['price'] : '';
            $data['sele'] = isset($_POST['sele']) ? $_POST['sele'] : '';
            $data['number'] = isset($_POST['number']) ? $_POST['number'] : '';
            $data['content'] = isset($_POST['content']) ? $_POST['content'] : '';
            $data['number'] = isset($_POST['number']) ? $_POST['number'] : '';
            //bắt lỗi
            if (!$error)
            {
              
             

                $id_update = $db->update("product",$data,array("id"=>$id));
                if($id_update > 0)
                {
                    $_SESSION['success']= "cập nhật thành công ";
                    redirectAdmin("product");
                }
                else
                {
                     $_SESSION['error']= "cập nhật thất bại";
                     redirectAdmin("product");
                }
            }
          

        }else{
            $EditProduct = $db->fetchID("product",$id);
           
           if (empty($EditProduct)) {
                $_SESSION['error']= "loi ";
                redirectAdmin("product");
           }
        }
?>
 <?php require_once __DIR__. "/../../layouts/header.php" ; ?>
    <div id="content-wrapper">
      <h1>
       CHỈNH SỬA SẢN PHẨM
      </h1>
        <div class="container-fluid">
          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="http://localhost/didong/admin/">Trang chủ admin</a>
            </li>
            <li class="breadcrumb-item">
              <a href="http://localhost/didong/admin/modules/product/">sản phẩm</a>
            </li>
            <li class="breadcrumb-item active"> chỉnh sửa sản phẩm</li>
          </ol>
        </div>
        <div class="forms-add">
           <form class="form-horizontal" role="form" method="post" action="">

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">tên sản phẩm</label>
              <div class="col-sm-8">
                <input type="text"  name="name" class="form-control" id="inputEmail3"  value="<?php echo $EditProduct['name'] ?>"/>
               
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"> giá sản phẩm</label>
              <div class="col-sm-8">
                <input type="number"  name="price" class="form-control" id="inputEmail3" placeholder="9.999.999" value="<?php echo $EditProduct['price'] ?>"/>
               
              
              </div>
            </div>

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"> giảm giá</label>
              <div class="col-sm-3">
                <input type="number"  name="sele" class="form-control" id="inputEmail3" placeholder="10%" value="<?php echo $EditProduct['sele'] ?>"/>
              </div>
            </div>

               <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"> số lượng</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="inputEmail3" name="number"  value="<?php echo $EditProduct['number'] ?>"/>
                  
              </div>
            </div>

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">nội dung</label>
              <div class="col-sm-8">
                <textarea type="text"  name="content" class="form-control" id="inputEmail3" value="<?php echo $EditProduct['content'] ?>" ></textarea>
                
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="edit_action" class="btn btn-success">lưu</button>
              </div>
            </div>
          </form>
        </div>

      
</div>
 <?php require_once __DIR__. "/../../layouts/footer.php" ; ?>
 