
// Проверяем состояние корзины в localStorage при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    const cartState = localStorage.getItem('cartCollapsed');
    const floatingCart = document.querySelector('.floating_cart');
    
    // По умолчанию свернуто
    if (cartState !== 'false') {
        floatingCart.classList.add('collapsed');
    }
});

function toggleCart() {
    const floatingCart = document.querySelector('.floating_cart');
    
    if (floatingCart.classList.contains('collapsed')) {
        // Разворачиваем
        floatingCart.classList.remove('collapsed');
        localStorage.setItem('cartCollapsed', 'false');
    } else {
        // Сворачиваем
        floatingCart.classList.add('collapsed');
        localStorage.setItem('cartCollapsed', 'true');
    }
}

// Закрытие при клике вне корзины
document.addEventListener('click', function(event) {
    const floatingCart = document.querySelector('.floating_cart');
    const isClickInside = floatingCart.contains(event.target);
    
    if (!isClickInside && !floatingCart.classList.contains('collapsed')) {
        floatingCart.classList.add('collapsed');
        localStorage.setItem('cartCollapsed', 'true');
    }
});
