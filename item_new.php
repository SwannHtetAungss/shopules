<?php
    require 'backendheader.php';
?>

    <div class="app-title">
        <div>
            <h1> <i class="icofont-list"></i> Item Form </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <a href="item_list.php" class="btn btn-outline-primary">
                <i class="icofont-double-left"></i>
            </a>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <form action="item_store.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label for="photo_id" class="col-sm-2 col-form-label"> Photo </label>
                            <div class="col-sm-10">
                              <input type="file" id="photo_id" name="photo">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name_id" class="col-sm-2 col-form-label"> Name </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="name_id" name="name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="codeno_id" class="col-sm-2 col-form-label"> Code No. </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="codeno_id" name="codeno">
                            </div>
                        </div>

<!--
                        <div class="form-group row">
                            <label for="price_id" class="col-sm-2 col-form-label"> Price </label>
                            <div class="col-sm-10">
                              <input type="number" class="form-control" id="price_id" name="price">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="discount_id" class="col-sm-2 col-form-label"> Discount </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="discount_id" name="discount">
                            </div>
                        </div>
-->
    <!-- tab 5.0 -->
<!--
                        <div class="form-group row">
                            <label for="price_id" class="col-sm-2 col-form-label"> Price </label>
                            <div class="col-sm-10">
                                <ul class="nav nav-tabs" id="mytab">
                                    <li class="nav-item">
                                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#price" type="button">
                                        Unit Price
                                      </button>
                                    </li>
                                    <li class="nav-item">
                                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#discount" type="button">
                                        Discount
                                      </button>
                                    </li>
                                </ul>

                                <div class="tab-content mt-3" id="myTabContent">
                                    <div class="tab-pane fade show active" id="price">
                                        <input type="number" class="form-control" id="price_id" name="price">
                                    </div>
                                    <div class="tab-pane fade" id="discount">
                                        <input type="text" class="form-control" id="discount_id" name="discount">
                                    </div>
                                </div>
                            </div>
                        </div>
-->
    <!-- tab 4.3.1 -->  
                        <div class="form-group row">
                            <label for="price_id" class="col-sm-2 col-form-label"> Price </label>
                            <div class="col-sm-10">
                                <nav>
                                  <div class="nav nav-tabs" id="nav-tab">
                                    <a class="nav-item nav-link active" data-toggle="tab" href="#nav-price" role="tab">Unit Price</a>
                                    <a class="nav-item nav-link" data-toggle="tab" href="#nav-discount" role="tab">Discount</a>
                            
                                  </div>
                                </nav>

                                <div class="tab-content mt-3" id="nav-tabContent">
                                  <div class="tab-pane fade show active" id="nav-price" role="tabpanel">
                                      <input type="number" class="form-control" id="price_id" name="price">
                                  </div>
                                  <div class="tab-pane fade" id="nav-discount" role="tabpanel">
                                      <input type="text" class="form-control" id="discount_id" name="discount">
                                  </div>
                                  
                                </div>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="description_id" class="col-sm-2 col-form-label"> Description </label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" id="description_id" name="description">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand_id" class="col-sm-2 col-form-label"> Brand </label>
                            <div class="col-sm-10">
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <?php 
                                        require 'connection.php';
                                        $sql="SELECT * FROM brands";
                                        $result=$pdo->query($sql);
                                        $rows=$result->fetchAll(PDO::FETCH_ASSOC);
                                        echo "<option> -- Choose one brand -- </option>";
                                        foreach($rows as $brand){
                                            $id=$brand['id'];
                                            $name=$brand['name'];
                                            echo "<option value='$id'>$name</option>";
                                        }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="subcategory_id" class="col-sm-2 col-form-label"> Sub Category </label>
                            <div class="col-sm-10">
                                <select name="subcategory_id" id="subcategory_id" class="form-control">
                                    <?php 
                                        require 'connection.php';
                                        $sql="SELECT * FROM subcategories";
                                        $result=$pdo->query($sql);
                                        $rows=$result->fetchAll(PDO::FETCH_ASSOC);
                                        echo "<option> -- Choose one subcategory -- </option>";
                                        foreach($rows as $subcategory){
                                            $id=$subcategory['id'];
                                            $name=$subcategory['name'];
                                            echo "<option value='$id'>$name</option>";
                                        }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">
                                    <i class="icofont-save"></i>
                                    Save
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
<?php 
    require 'backendfooter.php';
?>