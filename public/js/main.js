document.querySelectorAll('.li-icon-shop').forEach(button => { 
  button.addEventListener('click', () => { 
    let backColor = window.getComputedStyle(button).backgroundColor;

    if (backColor === 'rgb(31, 31, 31)') button.style.backgroundColor = 'rgb(57, 223, 57)';
    else button.style.backgroundColor = 'rgb(31, 31, 31)';
  });
});

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".li-icon-shop").forEach(function (icon) {
      icon.addEventListener("click", function (event) {
          event.stopPropagation();
          event.preventDefault(); 
      });
  }); 
});

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
