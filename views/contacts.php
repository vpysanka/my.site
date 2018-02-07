<?php
require_once VIEWS.'/shared/head.php';
require_once VIEWS.'/shared/nav.php';
?>

<div class="content">
    <h1>Контакты</h1>
    <hr>

    <section class="bg bg4"></section>

    <h3>Звоните нам</h3>

    <div class="contacts"><p>
        (044) 333-22-55<br>
        (067) 333-22-55 (Kyivstar)<br>
        (095) 333-22-55 (Vodafone)<br>
        (063) 333-33-55 (Lifecell)<br>
    </p></div>

    <h3>Приезжайте к нам</h3>
    <div class="contacts">
        <p><b>г. Киев, ул. Прорезная, 8</b></p>
        <div class="coordinats"><i>Координаты для GPS навигатора:<br>
            широта: 50°26'55.7" N долгота: 30°31'11.2" E</i></div>
            <p><b>ПН - ПТ</b> 10:00 - 20:00<br>
            <b>СБ</b> 10:00 - 17:00<br>
            <b>ВС Выходной</b></p>
    </div>

    <h3>Остались вопросы?</h3>
    <div class="contacts"><p>
        Напишите нам:
    </p></div>

    <form action="/contacts" method="post">
        <div>
            <input type="text" name="name" id="input-name" placeholder="Имя" 
                value="<?php echo $name; ?>" required>
            <input type="email" name="email" id="input-email" placeholder="E-Mail" 
                value="<?php echo $email; ?>" required>
            <input type="text" name="subject" id="input-subject" placeholder="Тема" required>
            <textarea type="text" name="message" id="input-message" placeholder="Сообщение" required></textarea>
        </div>
        <input type="submit" name="submit" value="Отправить" id="input-submit">
    </form>

    <iframe src="https://snazzymaps.com/embed/20242" width="100%" height="300px" style="border:none;"></iframe>
</div>

<?php
require_once realpath(__DIR__).'/shared/footer.php';