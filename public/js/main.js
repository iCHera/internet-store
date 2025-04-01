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