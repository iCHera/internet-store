// === Слайдер "Новинки" ===

document.addEventListener('DOMContentLoaded', function() {
  const newItems = document.querySelector('.new-items');
  const newLists = document.querySelectorAll('.new-list');
  const sliderButtonBack = document.querySelector('.slider-button-back-new');
  const sliderButtonNext = document.querySelector('.slider-button-next-new');

  let scrollPosition = 0;
  const itemWidth = newLists[0].offsetWidth + 20; 
  const visibleItems = Math.floor(newItems.offsetWidth / itemWidth);

  sliderButtonNext.addEventListener('click', function() {
    if (scrollPosition < (newLists.length - visibleItems) * itemWidth) {
      scrollPosition += itemWidth;
      newItems.style.transform = `translateX(-${scrollPosition}px)`;
    }
  });

  sliderButtonBack.addEventListener('click', function() {
    if (scrollPosition > 0) {
      scrollPosition -= itemWidth;
      newItems.style.transform = `translateX(-${scrollPosition}px)`;
    }
  });
});

// === Слайдер "Хиты продаж" ===

document.addEventListener('DOMContentLoaded', function() { 

  const xiteItems = document.querySelector('.xite-items');
  const xiteList = document.querySelectorAll('.xite-list');
  const nextSlide = document.querySelector('.slider-button-next-xite');
  const backSlide = document.querySelector('.slider-button-back-xite');

  let scrollPoss = 0;
  const itemWidth = xiteList[0].offsetWidth + 20;
  const visibleItems = Math.floor(xiteItems.offsetWidth / itemWidth);

  nextSlide.addEventListener('click', function() { 
    if (scrollPoss < (xiteList.length - visibleItems) * itemWidth) { 
      scrollPoss += itemWidth;
      xiteItems.style.transform = `translateX(-${scrollPoss}px)`;
    }
  });

  backSlide.addEventListener('click', function() { 
    if (scrollPoss > 0) { 
      scrollPoss -= itemWidth;
      xiteItems.style.transform = `translateX(-${scrollPoss}px)`;
    }
  });
});

// === Слайдер "SERI продуктов" ===

document.addEventListener("DOMContentLoaded", function() { 
  const seriProductUl = document.querySelector('.seri-product-ul');
  const seriProductLi = document.querySelectorAll('.seri-pdocuct-li');
  const sliderBack = document.querySelector('.seri-button-back');
  const sliderNext = document.querySelector('.seri-button-next');

  let slideCart = 0;
  const itemWidth = seriProductLi[0].offsetWidth + 20; 
  const visibleItems = Math.floor(seriProductUl.offsetWidth / itemWidth);
  const maxSlide = (seriProductLi.length - visibleItems) * itemWidth;

  sliderNext.addEventListener('click', function() {
    if (slideCart < maxSlide) {
      slideCart += itemWidth;
      if (slideCart > maxSlide) {
        slideCart = maxSlide;
      }
      seriProductUl.style.transform = `translateX(-${slideCart}px)`;
    }
  });

  sliderBack.addEventListener('click', function() {
    if (slideCart > 0) { 
      slideCart -= itemWidth;
      if (slideCart < 0) {
        slideCart = 0;
      }
      seriProductUl.style.transform = `translateX(-${slideCart}px)`;
    }
  });
});

// === Слайдер "Tefia продукты" ===

document.addEventListener("DOMContentLoaded", function() { 

  const tefiaUl = document.querySelector(".tefia-product-ul");
  const tefiaLi = document.querySelectorAll(".tefia-pdocuct-li");
  const nextButton = document.querySelector(".tefia-button-next");
  const backButton = document.querySelector(".tefia-button-back");

  let slideCart = 0; 
  const itemWidth = tefiaLi[0].offsetWidth + 20;
  const visibleItems = Math.floor(tefiaUl.offsetWidth / itemWidth);
  const maxSlide = (tefiaLi.length - visibleItems) * itemWidth;

  nextButton.addEventListener('click', function() { 
    if (slideCart < maxSlide) { 
      slideCart += itemWidth;
      if(slideCart > maxSlide) { 
        slideCart = maxSlide;
      }
      tefiaUl.style.transform = `translateX(-${slideCart}px)`;
    }
  });

  backButton.addEventListener('click', function() { 
    if (slideCart > 0) { 
      slideCart -= itemWidth;
      if (slideCart < 0) { 
        slideCart = 0;
      }
      tefiaUl.style.transform = `translateX(-${slideCart}px)`;
    }
  });
});

// === Открытие и закрытие корзины по клику ===

document.addEventListener("DOMContentLoaded", function() {

  const shopListButton = document.querySelector('.header-list-li-shop');
  const shopList = document.querySelector('.basket');
  const closeButton = document.querySelector('.span-point');

  shopListButton.addEventListener('click', function() { 
    shopList.classList.toggle('basket--active');
    document.body.classList.add('no-scroll');
  });

  closeButton.addEventListener('click', function() { 
    shopList.classList.remove('basket--active');
    document.body.classList.remove('no-scroll');
  });
});

// === Работа с корзиной (отображение, добавление, удаление, сохранение в localStorage) ===

document.addEventListener("DOMContentLoaded", function () {
  const basketList = document.querySelector('.basket-list');
  const emptyText = document.querySelector('.basket-text-underfind');
  const basketText = document.querySelector('.basket-text');

  // Обновление текста "В корзине N товаров"

  function updateBasketText() {
    const items = basketList.querySelectorAll('li.basket-item');
    const count = items.length;
  
    if (count === 0) {
      basketText.style.display = 'none';
      if (emptyText) { 
        emptyText.style.display = 'flex';
        emptyText.textContent = 'Корзина пуста';
      } 
    } else {
      basketText.style.display = 'flex';
      basketText.textContent = `В корзине ${count} товар${count === 1 ? '' : count < 5 ? 'а' : 'ов'}`;
      if (emptyText) emptyText.style.display = 'none';
    }
  }
  
   // Сохранение корзины в localStorage
  function saveCartToStorage() {
    const items = Array.from(basketList.children).map(item => ({
      name: item.querySelector('.basket-name')?.textContent,
      price: item.querySelector('.basket-price')?.textContent,
      image: item.querySelector('img')?.src,
    }));
    localStorage.setItem('cartItems', JSON.stringify(items));
  }

  // Загрузка товаров из localStorage
  function loadCartFromStorage() {
    const savedItems = JSON.parse(localStorage.getItem('cartItems') || '[]');
    savedItems.forEach(item => {
      addItemToBasket(item.name, item.price, item.image);
    });
    updateBasketText();
  }

  // Добавление товара в корзину
  function addItemToBasket(name, price, image) {
    
    if (!name || !price || !image) return;

    const li = document.createElement('li');
    li.classList.add('basket-item');
    li.setAttribute('data-id', name); 
    li.innerHTML = `
      <div class="basket-item">
          <img src="${image}" alt="photo" class="basket-image">
      </div>
      <div class="basket-product">
          <h1 class="basket-name">${name}</h1>
          <h1 class="basket-price">${price}</h1>
      </div>
    `;
    basketList.appendChild(li);
  }

  // Удаление товара из корзины
  function removeItemFromBasket(name) {
    const items = basketList.querySelectorAll('.basket-item');
    items.forEach(item => {
      const itemName = item.querySelector('.basket-name')?.textContent;
      if (itemName === name) {
        item.remove();
      }
    });
  }

  // Загрузка корзины при загрузке страницы
  loadCartFromStorage();

  // === Добавление товара в корзину с карточки (иконка корзины) ===
  document.querySelectorAll(".li-icon-shop").forEach(function (icon) {
    icon.addEventListener("click", function (e) {
      e.preventDefault();
      e.stopPropagation();

      const name = icon.dataset.name;
      const price = icon.dataset.price;
      const image = icon.dataset.image;

      const isAdded = icon.classList.toggle("active");

      if (isAdded) {
        icon.style.backgroundColor = 'rgb(57, 177, 57)';
        addItemToBasket(name, price, image);
      } else {
        icon.style.backgroundColor = 'rgb(31, 31, 31)';
        removeItemFromBasket(name);
      }

      updateBasketText();
      saveCartToStorage();
    });

    const savedItems = JSON.parse(localStorage.getItem('cartItems') || '[]');
    const itemInCart = savedItems.find(i => i.name === icon.dataset.name);
    if (itemInCart) {
      icon.classList.add("active");
      icon.style.backgroundColor = 'rgb(57, 177, 57)';
    } else {
      icon.style.backgroundColor = 'rgb(31, 31, 31)';
    }
  });

  // === Кнопка "Добавить в корзину" на странице товара ===
  let productButton = document.querySelector(".product-add-basket");
  if (productButton) {
    const productName = document.querySelector(".product-name")?.textContent;
    const productPrice = document.querySelector(".product-price")?.textContent;
    const productImage = document.querySelector(".product-photo")?.src;

    const savedItems = JSON.parse(localStorage.getItem('cartItems') || '[]');
    const isInCart = savedItems.some(item => item.name === productName);

    if (isInCart) {
      productButton.style.backgroundColor = 'rgb(57, 177, 57)';
      productButton.textContent = "В КОРЗИНЕ";
    }

    productButton.addEventListener('click', function(e) {
      e.preventDefault();
    
    const background = window.getComputedStyle(productButton).backgroundColor;
    const isAdded = background === 'rgb(57, 177, 57)';
    
    if (!isAdded) {
      productButton.style.backgroundColor = 'rgb(57, 177, 57)';
      productButton.textContent = "В КОРЗИНЕ";
      addItemToBasket(productName, productPrice, productImage);
    } else {
      productButton.style.backgroundColor = 'rgb(0, 0, 0)';
      productButton.textContent = "ДОБАВИТЬ В КОРЗИНУ";
      removeItemFromBasket(productName);
    }

    updateBasketText();
    saveCartToStorage();
  });
}

  // === Переключения фона у иконки товара  ===
  document.querySelectorAll('.li-icon-shop').forEach(button => { 
    button.addEventListener('click', (e) => { 
      e.preventDefault();
      e.stopPropagation();
      
      let backColor = window.getComputedStyle(button).backgroundColor;
  
      if (backColor === 'rgb(31, 31, 31)') {
        button.style.backgroundColor = 'rgb(57, 177, 57)';
      } else {
        button.style.backgroundColor = 'rgb(31, 31, 31)';
      }
    });
  });

  // === Слайдер "С выбраным товаром" на странице товара ===
    const otherUl = document.querySelector('.other-items');
    const otherLi = document.querySelectorAll('.other-list');
    const sliderNext = document.querySelector('.slider-button-next-other');
    const sliderBack = document.querySelector('.slider-button-back-other');

    let slideCart = 0;
    const itemWidth = otherLi[0].offsetWidth + 20;
    const visibleItems = Math.floor(otherUl.offsetWidth / itemWidth);
    const maxSlide = (otherLi.length - visibleItems) * itemWidth;

    sliderNext.addEventListener('click', () => { 

        if (slideCart < maxSlide) {
            slideCart += itemWidth;
            if (slideCart > maxSlide) { 
                slideCart = maxSlide;
            }
            otherUl.style.transform = `translate(-${slideCart}px)`;
        }
    });

    sliderBack.addEventListener('click', () => { 
        
        if(slideCart > 0) { 
            slideCart -= itemWidth;
            if (slideCart < 0) { 
                slideCart = 0;
            }
            otherUl.style.transform = `translate(-${slideCart}px)`;
        }
    });
});


