<div class="main-footer">
    <p class="copyright">&copy; 2017 My E-Shop</p>
    <nav>
        <a href="https://www.facebook.com" title="We in Facebook"><i class="fab fa-facebook-square"></i></a>
        <a href="https://twitter.com" title="We in Twitter"><i class="fab fa-twitter-square"></i></a>
        <a href="https://www.instagram.com" title="We in Instagram"><i class="fab fa-instagram"></i></a>
    </nav>
</div>

<script defer src="/js/top-navigation.js"></script>

<!-- <script>
    setTimeout(function() {
        var script = document.createElement('script');
        script.type = "text/javascript";
        script.src = "js/cart.js";
        document.body.appendChild(script);
    }, 3000);
</script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 500 && $(window).width() > 1125) {
                $('.top').fadeIn(300);
            } else {
                $('.top').fadeOut(200);
            }
        });
        $('.top').click(function() {
            $('body, html').animate({
                scrollTop: 0
            }, 200);
            return false;
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        myCart = JSON.parse(localStorage.myCart);
        $("a[name='buy-button']").click(function() {
            $.ajax({
                type: 'POST',
                url: 'basket/addToCart',
                dataType: 'json',
                data: { 'value':JSON.stringify(myCart) },
                success: function(data) {
                    alert('success');
                }
            });
        });
    });
</script>

</body>
</html>
