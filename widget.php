<?php
$netshop = nc_netshop::get_instance();
$items = $netshop->cart->get_items();
$totals = $netshop->cart->get_totals();
$total_items = $netshop->cart->get_item_count();
?>
<div class="floating_cart <?php echo $total_items ? 'has-items' : 'empty'; ?>">
    <div class="cart_icon" onclick="toggleCart()">
        <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M3 3H5L5.4 5M7 13H17L21 5H5.4M7 13L5.4 5M7 13L4.7 15.3C4.3 15.7 4.6 16.4 5.1 16.4H17M17 17C16.4 17 16 17.4 16 18C16 18.6 16.4 19 17 19C17.6 19 18 18.6 18 18C18 17.4 17.6 17 17 17ZM9 18C9 18.6 8.6 19 8 19C7.4 19 7 18.6 7 18C7 17.4 7.4 17 8 17C8.6 17 9 17.4 9 18Z" stroke="currentColor" stroke-width="2"/>
        </svg>
        <?php if ($total_items) { ?>
            <span class="cart_badge"><?= $total_items; ?></span>
        <?php } ?>
    </div>
    
    <div class="cart_content" id="cartContent">
        <div class="cart_header">
            <h3>Корзина товаров</h3>
            <button class="cart_close" onclick="toggleCart()">×</button>
        </div>
        
        <div class="cart_body">
            <?php if ($total_items) { ?>
                <div class="cart_summary">
                    В корзине <span class="tpl-field-amount"><?= $total_items; ?> <?= plural_form($total_items, 'товар', 'товара', 'товаров'); ?></span>
                </div>
                
                <div class="cart_items">
                    <?php foreach ($items as $citem) {
                        echo '<div class="cart_item">
                            <div class="cart_item__name">
                                <a href="'.$citem['Hidden_URL'].''.$citem['Keyword'].'.html">'.$citem['Name'].'</a>
                            </div>
                        </div>';
                    } ?>
                </div>
                
                <div class="cart_total">
                    <strong>Всего на сумму: <?php echo $netshop->format_price($totals); ?></strong>
                </div>
                
                <div class="cart_actions">
                    <a href="/cart" class="cart_button">Перейти в корзину</a>
                </div>
            <?php } else { ?>
                <div class="cart_empty">
                    Корзина пуста
                </div>
            <?php } ?>
        </div>
    </div>
</div>
