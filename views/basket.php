<?php
require_once VIEWS.'/shared/head.php';
require_once VIEWS.'/shared/nav.php';
?>

<script>
    if (localStorage.getItem('myCart')) {
        cart = JSON.parse(localStorage.getItem('myCart'));
        if (cart[0].TotalQuantity == 0) {
            window.location.href = "/";
        }
    }

    document.getElementById("id-user").style.visibility = "hidden";
    document.querySelector(".shopping-bag").style.visibility = "hidden";
</script>

<div class="content">
    <h1>Ваша корзина<?php if (isset($user['name'])): echo ', ' . $user['name']; endif; ?></h1>
    <hr>
    <div class="basket-content">
        <table class="basket-table">
            <tr>
                <th></th>
                <th>Наименование товара</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Стоимость</th>
                <th></th>
            </tr>
        </table>
        <script>
            for (let i = 1; i < cart.length; i++) {
                let tr = document.createElement('tr');

                let td_img = document.createElement('td');
                td_img.setAttribute('class', 'img');
                let a_img = document.createElement('a');
                a_img.setAttribute('href', cart[i].Href)
                let image = document.createElement('img');
                image.setAttribute('src', cart[i].Image);
                a_img.append(image);
                td_img.append(a_img);
                tr.append(td_img);

                let td_title = document.createElement('td');
                td_title.setAttribute('class', 'title');
                let a_title = document.createElement('a');
                a_title.setAttribute('href', cart[i].Href);
                a_title.innerHTML = cart[i].Name;
                td_title.append(a_title);
                tr.append(td_title);

                let td_count = document.createElement('td');
                td_count.setAttribute('class', 'count');
                td_count.innerHTML = cart[i].Quantity;
                tr.append(td_count);

                let td_itemPrice = document.createElement('td');
                td_itemPrice.setAttribute('class', 'item_price');
                td_itemPrice.innerHTML = (parseInt(cart[i].Price) + '').replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
                let span_itemPrice = document.createElement('span');
                span_itemPrice.setAttribute('class', 'currency');
                span_itemPrice.innerHTML = ' грн.';
                td_itemPrice.append(span_itemPrice);
                tr.append(td_itemPrice);

                let td_itemTotalPrice = document.createElement('td');
                td_itemTotalPrice.setAttribute('class', 'item_totalPrice');
                td_itemTotalPrice.innerHTML = (parseInt(cart[i].Quantity * cart[i].Price) + '').replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
                let span_itemTotalPrice = document.createElement('span');
                span_itemTotalPrice.setAttribute('class', 'currency');
                span_itemTotalPrice.innerHTML = ' грн.';
                td_itemTotalPrice.append(span_itemTotalPrice);
                tr.append(td_itemTotalPrice);

                let td_remove = document.createElement('td');
                td_remove.setAttribute('class', 'remove');
                let span_itemRemoveTxt = document.createElement('span');
                span_itemRemoveTxt.setAttribute('class', 'item_removeTxt');
                span_itemRemoveTxt.innerHTML = 'удалить';
                let span_itemRemoveImg = document.createElement('span');
                span_itemRemoveImg.setAttribute('class', 'item_removeImg');
                td_remove.append(span_itemRemoveTxt);
                td_remove.append(span_itemRemoveImg);
                tr.append(td_remove);

                document.querySelector('.basket-table').append(tr);
            }
        
            let div_basketTotal = document.createElement('div');
            div_basketTotal.setAttribute('class', 'basket-total');
            let p_basketTotal = document.createElement('p');
            p_basketTotal.innerHTML = 'Итого: ' + (cart[0].TotalPrice + '').replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, '$1 ');
            let span_basketTotal = document.createElement('span');
            span_basketTotal.setAttribute('class', 'currency');
            span_basketTotal.innerHTML = ' грн.';
            p_basketTotal.append(span_basketTotal);
            div_basketTotal.append(p_basketTotal);

            document.querySelector('.basket-content').append(div_basketTotal);
        </script>
        
        <a href="/order">
            <div class="order-button">
                Оформить заказ
            </div>
        </a>
        
    </div>
</div>

<?php
require_once VIEWS.'/shared/footer.php';