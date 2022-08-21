<?php
$total = null;
?>

<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($_SESSION['Cart'] as $key => $value) {
                                $sql = "SELECT `HinhDaiDien` FROM `sanpham` WHERE `MaSP` ='{$value['key_id']}'";
                                $result = $db->query($sql);
                                $row = $result->fetch();

                                echo '   <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img src="' . $row['HinhDaiDien'] . '" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>' . $value['key_name'] . '</h6>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <div class="pro-qty-2">
                                            <input type="text" value="1">
                                        </div>
                                    </div>
                                </td>
                                <td class="cart__price">$ ' . $value['key_price'] . '</td>
                                <td class="cart__close">
                                <a href="' . $requestCartAPI . '?key_id=' . $key . '&action=RemoveCart' . ' " class="add-cart"><i class="fa fa-close"></i></a>
                                </td>
                            </tr>';
                                $GLOBALS['total'] += number_format($value['key_price'], 2);
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="/Shop">Continue Shopping</a>
                        </div>
                    </div>
                    <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a href="#"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <?php
                    $totalPrice = $total ?? 0;
                    echo " <ul>
                        <li>Subtotal <span>$   $totalPrice</span></li>
                        <li>Total <span>$   $totalPrice</span></li>
                    </ul>";

                    echo "
                    <a href='$requestPaymentAPI' class='primary-btn'>Proceed to checkout</a>
                    ";
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>