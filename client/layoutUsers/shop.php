   <?php
    $sql = "SELECT * FROM `sanpham`";
    $strSQL = "SELECT * FROM `loaisp`";
    ?>

   <section class="breadcrumb-option">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="breadcrumb__text">
                       <h4>Shop</h4>
                       <div class="breadcrumb__links">
                           <a href="/">Home</a>
                           <span>Shop</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <section class="shop spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-3">
                   <div class="shop__sidebar">
                       <div class="shop__sidebar__search">
                           <form action="#">
                               <input type="text" placeholder="Search...">
                               <button type="submit"><span class="icon_search"></span></button>
                           </form>
                       </div>
                       <div class="shop__sidebar__accordion">
                           <div class="accordion" id="accordionExample">
                               <div class="card">
                                   <div class="card-heading">
                                       <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                   </div>
                                   <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                       <div class="card-body">
                                           <div class="shop__sidebar__categories">
                                               <ul class="nice-scroll">
                                                   <li><a href="/Shop">All</a></li>
                                                   <?php
                                                    $result = $db->query($strSQL);
                                                    while ($row = $result->fetch()) {
                                                        echo '
                                                    <li><a href="?filter=' . $row['MaLoai'] . '">' . $row['TenLoai'] . '</a></li>
                                                    ';
                                                    }
                                                    ?>
                                               </ul>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <?php
                echo '<div class="col-lg-9">
               <div class="shop__product__option">
                   <div class="row">
                       <div class="col-lg-6 col-md-6 col-sm-6">
                           <div class="shop__product__option__left">
                               <p>Showing 1???12 of 126 results</p>
                           </div>
                       </div>
                       <div class="col-lg-6 col-md-6 col-sm-6">
                           <div class="shop__product__option__right">
                               <p>Sort by Price:</p>
                               <select>
                                   <option value="">Low To High</option>
                                   <option value="">$0 - $55</option>
                                   <option value="">$55 - $100</option>
                               </select>
                           </div>
                       </div>
                   </div>
               </div>';
                ?>
               <div class="row">
                   <?php
                    if (isset($_GET['filter'])) {
                        $GLOBALS['sql'] = "SELECT * FROM `sanpham` WHERE `LoaiSP` = '{$_GET['filter']}'";
                    }
                    $product = $db->query($sql);
                    while ($row = $product->fetch(PDO::FETCH_ASSOC)) {
                        $sql = "SELECT * FROM `loaisp` WHERE `MaLoai` = '{$row['MaSP']}'";
                        $category = $db->query($sql);
                        $filter = $category->fetch(PDO::FETCH_ASSOC);
                        $key_id = $row['MaSP'];
                        $key_name = $row['TenSP'];
                        $key_picture = $row['HinhDaiDien'];
                        $key_price = $row['GiaMoi'];
                        $key_category = $filter['TenLoai'];
                        echo '
                            <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="' . $key_picture  . '">
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="client/layoutUsers/img/icon/heart.png" alt=""></a></li>
                                        <li><a href="#"><img src="client/layoutUsers/img/icon/compare.png" alt=""> <span>Compare</span></a>
                                        </li>
                                        <li><a href="#"><img src="client/layoutUsers/img/icon/search.png" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>' . $key_name . '</h6>
                                    <a href="' . $requestCartAPI . '?key_id=' . $key_id . '&key_name=' . $key_name . '&key_picture='
                            . $key_picture . '&key_price=' . $key_price . '&key_category=' . $key_category . '&action=AddCart' .
                            ' " class="add-cart">+ Add To Cart</a>
                                    <div class="rating">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <h5>' . $key_price . '</h5>
                                    <div class="product__color__select">
                                        <label for="pc-4">
                                            <input type="radio" id="pc-4">
                                        </label>
                                        <label class="active black" for="pc-5">
                                            <input type="radio" id="pc-5">
                                        </label>
                                        <label class="grey" for="pc-6">
                                            <input type="radio" id="pc-6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                    }
                    ?>
               </div>
               <div class="row">
                   <div class="col-lg-12">
                       <div class="product__pagination">
                           <a class="active" href="#">1</a>
                           <a href="#">2</a>
                           <a href="#">3</a>
                           <span>...</span>
                           <a href="#">21</a>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       </div>
   </section>

