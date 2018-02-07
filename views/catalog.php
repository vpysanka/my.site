<?php
require_once VIEWS.'/shared/head.php';
require_once VIEWS.'/shared/nav.php';
require_once VIEWS.'/shared/leftNavigation.php';
?>

<div class="catalog">
    <h2><?php echo $catalogName;?></h2>
    <div class="catalog-all-blocks">
        <?php foreach($allProducts as $product): ?>
        <div class="catalog-block">
            <h3>
                <a href="../product/<?php echo $product['category'].'/'.$product['code'];?>">
                <?php echo $product['name'];?></a>
            </h3>
            <li productid="<?php echo $product['code'];?>" 
                productname="<?php echo $product['name'];?>" 
                productimage="<?php echo $product['image'];?>" 
                productprice="<?php if($product['new_price']): echo $product['new_price'];
                else: echo $product['price']; endif; ?>" 
                producthref="../product/<?php echo $product['category'].'/'.$product['code'];?>">
                <div class="week-offer-block-image">
                    <a href="../product/<?php echo $product['category'].'/'.$product['code'];?>">
                    <img src="<?php echo $product['image'];?>" height="200"></a>
                </div>
                <ul>
                    <li><span class="attribute">Дисплей:</span> <?php echo $product['display'];?></li>
                    <li><span class="attribute">Процессор:</span> <?php echo $product['processor'];?></li>
                    <?php if($product['camera']): ?>
                    <li><span class="attribute">Камера:</span> <?php echo $product['camera'];?></li>
                    <?php endif; ?>
                    <li><span class="attribute">Память:</span> <?php echo $product['memory'];?></li>
                    <li><span class="attribute">Аккумулятор:</span> <?php echo $product['battery'];?></li>
                    <?php if($product['weight']): ?>
                    <li><span class="attribute">Вес:</span> <?php echo $product['weight'];?></li>
                    <?php endif; ?>
                </ul>
                <?php if($product['new_price']): ?>
                <p><strike><?php echo number_format($product['price'], 0, '', ' '); ?></strike> 
                    <span class="hot-price"><?php echo number_format($product['new_price'], 0, '', ' '); ?>
                    грн.</span></p>
                <?php else: ?>
                <p><span class="catalog-price"><?php echo number_format($product['price'], 0, '', ' '); ?>
                    грн.</span></p>
                <?php endif; ?>
                <a class="buy-button" name="buy-button">Купить</a>
            </li>
        </div>
        <?php endforeach; ?>
    </div>
    <?php echo $pagination->get(); ?>
</div>
    
<?php
require_once VIEWS.'/shared/footer.php';