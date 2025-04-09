document.addEventListener("DOMContentLoaded", function() { 

    let button = document.querySelector(".product-add-basket");

    button.addEventListener('click', () => { 
        
        let background = window.getComputedStyle(button).backgroundColor;

        if (background === 'rgb(0, 0, 0)') { 
            button.style.backgroundColor = 'rgb(57, 177, 57)';
            button.textContent = "В КОРЗИНЕ";
        }
        else { 
            button.style.backgroundColor = 'rgb(0, 0, 0)';
            button.textContent = "ДОБАВИТЬ В КОРЗИНУ";
        }
    });
});

document.querySelectorAll('.li-icon-shop-other').forEach(button => { 
    button.addEventListener('click', () => { 
      let backColor = window.getComputedStyle(button).backgroundColor;
  
      if (backColor === 'rgb(31, 31, 31)') button.style.backgroundColor = 'rgb(57, 177, 57)';
      else button.style.backgroundColor = 'rgb(31, 31, 31)';
    });
  });
  
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".li-icon-shop-other").forEach(function (icon) {
        icon.addEventListener("click", function (event) {
            event.stopPropagation();
            event.preventDefault(); 
        });
    }); 
  });

  document.addEventListener("DOMContentLoaded", function() { 

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