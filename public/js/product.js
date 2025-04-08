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