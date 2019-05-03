<?php
   $open = "category";
   
   require_once __DIR__. "/../../autoload/autoload.php" ;
   $category = $db->fetchAll("category");
        $error = array();
        $data = array();
        if (!empty($_POST['add_action']))
        {
            // Lấy dữ liệu
            $data['name'] = isset($_POST['name']) ? $_POST['name'] : '';
            $data['category_id'] = isset($_POST['category_id']) ? $_POST['category_id'] : '';
            $data['price'] = isset($_POST['price']) ? $_POST['price'] : '';
            $data['sele'] = isset($_POST['sele']) ? $_POST['sele'] : '';
            $data['name'] = isset($_POST['number']) ? $_POST['number'] : '';
            $data['content'] = isset($_POST['content']) ? $_POST['content'] : '';
            //bắt lỗi
            if (empty($data['name'])){
                $error['name'] = '* mời bạn điền đầy đủ tên sản phẩm';
            }

             if (empty($data['category_id'])){
                $error['category_id'] = '* mời bạn chọn tên danh mục';
            }

             if (empty($data['price'])){
                $error['price'] = '* mời bạn nhập giá sản phẩm';
            }

            if (empty($data['content'])){
                $error['content'] = '* mời bạn nhập nội dung sản phẩm';
            }
            
            if (empty($data['number'])){
                $error['number'] = '* mời bạn nhập số lượng sản phẩm';
            }

            if (! isset($_FILES['thumbnair'])) {
               $error['thumbnair'] = '* mời bạn nhập ảnh';
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
                    $part = ROOT ."product";
                    $data['thumbnair'] = $file_name;
                  }
                }
              

               $id_insert = $db->insert("product",$data);
                if ($id_insert) {
                  move_uploaded_file($file_tmp,$part.$file_name);
                  $_SESSION['success']= "thêm mới thành công ";
                  redirectAdmin("product");
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
       THÊM MỚI SẢN PHẨM
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
            <li class="breadcrumb-item active">thêm mới sản phẩm</li>
          </ol>
        </div>
        <div class="forms-add">
           <form class="form-horizontal" role="form" method="post" action="add.php" enctype="multipart/form-data"">

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">danh mục sản phẩm</label>
              <div class="col-sm-8">
              <select class="form-control col-md-8" name="category_id">
              <option value="">- mời bạn chọn danh mục sản phẩm -</option>  
              <?php foreach ($category as $item):?>
                <option value="<?php echo $item['id'] ?>"><?php echo $item['name']?></option>
              <?php endforeach ?>
              </select>
                <p class="text-danger"><?php echo isset($error['category_id']) ? $error['category_id'] : ''; ?></p>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">tên sản phẩm</label>
              <div class="col-sm-8">
                <input type="text"  name="name" class="form-control" id="inputEmail3" placeholder="tên sản phẩm" value="<?php echo isset($data['name']) ? $data['name'] : ''; ?>"/>
                <p class="text-danger"><?php echo isset($error['name']) ? $error['name'] : ''; ?></p>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"> giá sản phẩm</label>
              <div class="col-sm-8">
                <input type="number"  name="price" class="form-control" id="inputEmail3" placeholder="9.999.999" value="<?php echo isset($data['price']) ? $data['price'] : ''; ?>"/>
                <p class="text-danger"><?php echo isset($error['price']) ? $error['price'] : ''; ?></p>
              
              </div>
            </div>

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"> giảm giá</label>
              <div class="col-sm-3">
                <input type="number"  name="sele" class="form-control" id="inputEmail3" placeholder="10%" value="0"/>
              </div>
            </div>

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"> hình ảnh</label>
              <div class="col-sm-3">
                <input type="file" class="form-control" id="inputEmail3" name="thumbnair" />
                  <p class="text-danger"><?php echo isset($error['thumbnair']) ? $error['thumbnair'] : ''; ?></p>
              </div>
            </div>

            <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label"> số lượng</label>
              <div class="col-sm-3">
                <input type="number" class="form-control" id="inputEmail3" name="number" />
                  <p class="text-danger"><?php echo isset($error['number']) ? $error['number'] : ''; ?></p>
              </div>
            </div>

             <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">nội dung</label>
              <div class="col-sm-8">
                <textarea type="text"  name="content" class="form-control" id="inputEmail3"></textarea>
                <p class="text-danger"><?php echo isset($error['content']) ? $error['content'] : ''; ?></p>
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
 