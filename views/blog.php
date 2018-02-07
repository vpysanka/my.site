<?php
require_once VIEWS.'/shared/head.php';
require_once VIEWS.'/shared/nav.php';
?>

<div class="content">
    <h1>Блог</h1>
    <hr>

    <?php foreach ($blogList as $blogItem):?>
    <section class="blogSection">
        <article class="blogArticle">
            <h3>
                <a href="/blog/<?php echo $blogItem['id'];?>">
                <img src="<?php echo $blogItem['preview'];?>" width="200" height="200">
                <?php echo $blogItem['title']; ?></a>
            </h3>
            <p class="date"><time datetime="<?php echo $blogItem['date'];?>" 
            pubdate><?php echo $blogItem['date'];?></time></p>
            <p class="blogArticleText"><?php echo $blogItem['short_content'];?></p>
            <a href="/blog/<?php echo $blogItem['id'];?>" class="more">Читать дальше ></a>
        </article>
        <!-- <footer>
            <ul class="tag">
                <li><a href="#">#смартфон</a></li>
                <li><a href="#">#гид</a></li>
                <li><a href="#">#помощь в выборе</a></li>
            </ul>
        </footer> -->
    </section>
    <?php endforeach; ?>
</div>

<?php
require_once realpath(__DIR__).'/shared/footer.php';