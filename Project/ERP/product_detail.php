    <?php 
    include "connect.php";
    $page_name = "Product";
    $pid= $_GET['id'];
    $query = mysqli_query($con,"SELECT * FROM product where id = ".$pid);
    $row=mysqli_fetch_array($query);    
    $query_category = mysqli_query($con,"SELECT * FROM prodict_category where parent_id is NULL");

    ?>
    <?php
    if (isset($_POST["barcode"])) {
        $ids= $rowmax[0] +1;
        //$sql= "insert into product values(".$ids.",'".$_POST['product']."',".$_POST['stock'].",'".$_POST['barcode']."',".$_POST['cate']." )";

        $sql = "UPDATE `product` SET `id`=".$pid.",`product_name`='".$_POST['product']."',`qty_on_hand`=".$_POST['stock'].",`barcode`='".$_POST['barcode']."',`category`=".$_POST['cate']." WHERE `id` = ".$pid ; 
        echo $sql;
        $query = mysqli_query($con,$sql);
        header("Location:product.php");
    }
    ?>
    <?php include "header.php"; ?>

    <?php include "nav.php"; ?>
    <div class="content">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">

                    <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li><a href="product.php"><i class="fa fa-cart-arrow-down"></i> Product</a></li>
                    <li class="active"><i class="fa fa-plus"></i> Detail Product</li>
                </ol>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-lg-4 col-md-3">
                        <div class="card " style="box-shadow: 3px 3px 3px 0px rgba(0,0,0,0.75)">
                            <div class="header">
                                <h4 class="title">Detail Product</h4>
                            </div>
                            <hr>
                            <div class="content">
                                <form method="post" action"">
                                    <div class="row">
                                        <div class="col-md-11">
                                            <div class="form-group border-input">
                                                <label>Product Name</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon border-input" style="background-color: #c2c2c2; "><?php
                                                        echo $row['id']?></span>
                                                        <input type="text" name= "product" class="form-control border-input" placeholder="Product Name"   value="<?php echo $row['product_name']; ?>" style="width:230px">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Product's Category</label>                                                    
                                                <select class="input-group form-control border-input" name="cate" id="cate" >
                                                 <?php while($row_category = mysqli_fetch_assoc($query_category)){ 
                                                    if($row_category['id'] == $row['category']){
                                                        ?>
                                                        <option selected="selected" value="<?php echo $row_category['id'];  ?>">
                                                            <?php echo $row_category['category'];  ?>
                                                        </option> 
                                                        <?php }
                                                        else {
                                                            ?>
                                                            <option value="<?php echo $row_category['id'];  ?>">
                                                                <?php echo $row_category['category'];  ?>
                                                            </option>   
                                                            <?php }?>

                                                        <?php
                                                        $query_sub_category = mysqli_query($con,"SELECT * FROM prodict_category where parent_id=".$row_category['id']);
                                                        while($row_sub_category = mysqli_fetch_assoc($query_sub_category)){
                                                            if($row_sub_category['id'] == $row['category'])
                                                            {

                                                                ?>
                                                                <option selected="selected" value="<?php echo $row_sub_category['id']?>"><?php
                                                                    echo "&nbsp &nbsp"; 
                                                                    echo $row_sub_category['category'];  ?> </option>
                                                                <?php 
                                                                }
                                                                else {
                                                                    ?>

                                                                <option value="<?php echo $row_sub_category['id']?>"><?php
                                                                    echo "&nbsp &nbsp"; 
                                                                    echo $row_sub_category['category'];  ?> </option>
                                                                    <?php }?>
                                                                    <?php }?>
                                                                    <?php }?>
                                                                    <hr>

                                                                    <option value="add">( Add New Category )</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label> <i class="fa fa-cart-arrow-down"></i>Stock</label>
                                                                    <input type="text" name="stock" class="form-control border-input" placeholder="Stock"  value="<?php echo $row['qty_on_hand']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label> <i class="fa fa-barcode"></i> Barcode</label>
                                                                    <input type="text" name="barcode"class="form-control border-input" placeholder="barcode"  value="<?php echo $row['barcode']; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="col-md-4">

                                                            <a href="productDelete.php?id=<?php echo$pid ;?>" class="btn btn-danger btn-fill "><i class="fa fa-trash"></i>Delete</a>
                                                        </div><div class="col-md-2"> &nbsp</div>
                                                            
                                                        <div class="col-md-4">
                                                            <button type="submit" class="btn btn-info btn-fill "><i class="fa fa-save"></i>Save</button>
                                                            </div>
                                                            
                                                        <div class="clearfix"></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function(){
                                $("#cate").change(function(){
                                    if($(this).val()==="add")
                                    {
                                        $('#myModal').modal("show");
                                    }

                                });
                                $("#modalsubmit").on('click',function(){
                                    var nama1 =document.getElementById("categoryname").value ;
                                    var e=document.getElementById("categoryselect");
                                    var categorytype1 = e.options[e.selectedIndex].value;

                                    $.post("productCategoryAdd.php", 
                                    { 
                                       nama :nama1,
                                       categorytype : categorytype1
                                   });
                    // type : "POST",
                    // url :"productCategoryAdd.php",
                    // data : {
                    //     nama :nama1,
                    //     categorytype : categorytype1
                    // }

                });
                            });
                        </script>

                        <?php include "footer.php"; ?>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Add Category</h4>
                            </div>
                            <div class="modal-body">
                                <div class="col-md-3 col-md-offset-1">
                                    <div class="row">
                                        <label>Add category : </label>
                                        <select class="input-group form-control border-input" name="categoryselect" id="categoryselect" >
                                         <option value="Null" >( Null )</option>
                                         <?php
                                         $queryparent = mysqli_query($con,"SELECT * FROM prodict_category where parent_id is NULL");
                                         while($rowparent = mysqli_fetch_assoc($queryparent)){ ?>
                                         <option value="<?php echo $rowparent['id'];  ?>">
                                            <?php echo $rowparent['category'];  ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row" >
                                <label style="color:white">Category's Name :</label>
                                <input type="text" name= "categoryname" id="categoryname" class="form-control border-input" placeholder="Category Name"  style="width:300px">
                            </div>



                        </div>
                        <div class="section">
                            <div class="modal-footer" >
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <div type="button" class="btn btn-primary" name="modalsubmit" id="modalsubmit" data-dismiss="modal"><i class="fa fa-plus"></i> Add</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>