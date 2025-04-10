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

document.addEventListener("DOMContentLoaded", function() {

  const shopListButton = document.querySelector('.header-list-li-shop');
  const shopList = document.querySelector('.basket');
  const closeButton = document.querySelector('.span-point');

  const textIsunderFind = document.querySelector('.basket-text-underfind');
  const textIsFind = document.querySelector('.basket-text');
  const shopListUl = document.querySelector('.basket-list');
  const shopListLi = document.querySelectorAll('.basket-item');
  const ShopButton = document.querySelector('.buy-basket');  

  shopListButton.addEventListener('click', function() { 
    shopList.classList.toggle('basket--active');
    document.body.classList.add('no-scroll');
  });

  closeButton.addEventListener('click', function() { 
    shopList.classList.remove('basket--active');
    document.body.classList.remove('no-scroll');
  });

  const isEmpty = shopListLi.length === 0;

  if (isEmpty) { 
    textIsunderFind.classList.toggle('basket-text-underfind--active');
    textIsFind.classList.toggle('basket-text--active');
    shopListUl.classList.toggle('basket-list--active');
    shopListLi.forEach(item => item.classList.toggle('basket-item--active'));
    ShopButton.classList.toggle('buy-basket--active');
  }
  else { 
    textIsunderFind.classList.remove('basket-text-underfind--active');
    textIsFind.classList.remove('basket-text--active');
    shopListUl.classList.remove('basket-list--active');
    // shopListLi.classList.remove('basket-item--active');
    ShopButton.classList.remove('buy-basket--active');
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const basketList = document.querySelector('.basket-list');
  const emptyText = document.querySelector('.basket-text-underfind');
  const basketText = document.querySelector('.basket-text');

  function updateBasketText() {
    const items = basketList.querySelectorAll('li.basket-item'); // <-- исправили тут!
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
  

  function saveCartToStorage() {
    const items = Array.from(basketList.children).map(item => ({
      name: item.querySelector('.basket-name')?.textContent,
      price: item.querySelector('.basket-price')?.textContent,
      image: item.querySelector('img')?.src,
    }));
    localStorage.setItem('cartItems', JSON.stringify(items));
  }

  function loadCartFromStorage() {
    const savedItems = JSON.parse(localStorage.getItem('cartItems') || '[]');
    savedItems.forEach(item => {
      addItemToBasket(item.name, item.price, item.image);
    });
    updateBasketText();
  }

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

  function removeItemFromBasket(name) {
    const items = basketList.querySelectorAll('.basket-item');
    items.forEach(item => {
      const itemName = item.querySelector('.basket-name')?.textContent;
      if (itemName === name) {
        item.remove();
      }
    });
  }

  loadCartFromStorage();

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
});

