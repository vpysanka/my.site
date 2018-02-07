<div class="left-navigation">
    <div class="left-nav-logo">
        <a href="/"><img src="/images/logo.jpg" width="200" height="200"></a>
    </div>
    <ul>
        <?php foreach ($categories as $categoryItem):?>
        <li>
            <a href="/catalog/<?php echo $categoryItem['category']?>">
                <span class="caption"><?php echo $categoryItem['name'];?></span></a>
            <a href="/catalog/<?php echo $categoryItem['category']?>#select">
                <p class="select"><?php echo $categoryItem['select'];?></p></a>
        </li>
        <?php endforeach;?>
    </ul>
</div>