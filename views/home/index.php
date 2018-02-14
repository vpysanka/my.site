<?php
die($_SERVER['SERVER_NAME']);
require_once VIEWS.'/shared/head.php';
require_once VIEWS.'/shared/nav.php';
require_once VIEWS.'/shared/leftNavigation.php';
require_once VIEWS.'/shared/mainBanner.php';
?>

<div class="week-offer">
    <h2>Предложения недели</h2>
    <div class="week-offer-all-blocks">
        <?php foreach ($weekOfferProducts as $weekOfferItem):?>
        <div class="week-offer-block">
            <h3>
                <a href="/product/<?php echo $weekOfferItem['category'].'/'.$weekOfferItem['code'];;?>">
                <?php echo $weekOfferItem['name'];?></a>
            </h3>
            <li productid="<?php echo $weekOfferItem['code'];?>" 
                productname="<?php echo $weekOfferItem['name'];?>" 
                productimage="<?php echo $weekOfferItem['image'];?>" 
                productprice="<?php echo $weekOfferItem['new_price'];?>" 
                producthref="/product/<?php echo $weekOfferItem['category'].'/'.$weekOfferItem['code'];?>">
                <div class="week-offer-block-image">
                    <a href="/product/<?php echo $weekOfferItem['category'].'/'.$weekOfferItem['code'];?>">
                    <img src="<?php echo $weekOfferItem['image'];?>" height="200"></a>
                </div>
                <ul>
                    <li><span class="attribute">Дисплей:</span> <?php echo $weekOfferItem['display'];?></li>
                    <li><span class="attribute">Процессор:</span> <?php echo $weekOfferItem['processor'];?></li>
                    <?php if($weekOfferItem['category'] == 'smartphones'): ?>
                    <li><span class="attribute">Камера:</span> <?php echo $weekOfferItem['camera'];?></li>
                    <?php endif; ?>
                    <li><span class="attribute">Память:</span> <?php echo $weekOfferItem['memory'];?></li>
                    <li><span class="attribute">Аккумулятор:</span> <?php echo $weekOfferItem['battery'];?></li>
                    <?php if($weekOfferItem['category'] == 'tablets' || $weekOfferItem['category'] == 'watches'): ?>
                    <li><span class="attribute">Вес:</span> <?php echo $weekOfferItem['weight'];?></li>
                    <?php endif; ?>
                </ul>
                <p>
                    <strike><?php echo number_format($weekOfferItem['price'], 0, '', ' ');?></strike> 
                    <span class="hot-price"><?php echo number_format($weekOfferItem['new_price'], 0, '', ' ');?> грн.</span>
                </p>
                <a class="buy-button" name="buy-button">Купить</a>
            </li>
        </div>
        <?php endforeach; ?>
    </div>
    <button class="wo_prev">&#10094;</button>
    <button class="wo_next">&#10095;</button>
</div>

<div class="sale-leaders">
    <h2>Лидеры продаж</h2>
    <ul class="grid caption-hover">
        <?php foreach ($saleLeadersProducts as $saleLeaderItem): ?>
        <div class="leader_block">
            <h3>
                <a href="/product/<?php echo $saleLeaderItem['category'].'/'.$saleLeaderItem['code'];?>">
                <?php echo $saleLeaderItem['name'];?></a>
            </h3>
            <li>
                <figure>
                    <img src="<?php echo $saleLeaderItem['image'];?>" height="250">
                    <?php if($saleLeaderItem['action']): ?>
                    <span class="ribbon1">А<br>К<br>Ц<br>И<br>Я</span>
                    <?php endif; ?>
                    <span class="ribbon2">
                        <?php if($saleLeaderItem['new_price']):
                            echo number_format($saleLeaderItem['new_price'], 0, '', ' ');
                        else:
                            echo number_format($saleLeaderItem['price'], 0, '', ' ');
                        endif; ?>
                    грн.</span>
                    <figcaption>
                        <ul class="leader_grid" 
                            productid="<?php echo $saleLeaderItem['code'];?>" 
                            productname="<?php echo $saleLeaderItem['name'];?>" 
                            productprice="<?php if($saleLeaderItem['new_price']): echo $saleLeaderItem['new_price'];
                            else: echo $saleLeaderItem['price']; endif; ?>" 
                            productimage="<?php echo $saleLeaderItem['image'];?>" 
                            producthref="/product/<?php $saleLeaderItem['category'].'/'.$saleLeaderItem['code'];?>">
                            <li>Дисплей: <?php echo $saleLeaderItem['display'];?></li>
                            <li>Процессор: <?php echo $saleLeaderItem['processor'];?></li>
                            <?php if($saleLeaderItem['camera']):?>
                            <li>Камера: <?php echo $saleLeaderItem['camera'];?></li>
                            <?php endif; ?>
                            <li>Память: <?php echo $saleLeaderItem['memory'];?></li>
                            <li>Аккумулятор: <?php echo $saleLeaderItem['battery'];?></li>
                            <?php if($saleLeaderItem['weight']):?>
                            <li>Вес: <?php echo $saleLeaderItem['weight'];?></li>
                            <?php endif; ?>
                            <a name="buy-button">Купить</a>
                        </ul>
                    </figcaption>
                </figure>
            </li>
        </div>
        <?php endforeach; ?>
    </ul>
</div>

<script src="js/banner-slider.js"></script>
<script src="js/week-offer-carousel.js"></script>
    
<?php
require_once VIEWS.'/shared/footer.php';