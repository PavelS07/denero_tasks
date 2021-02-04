$(document).ready(function () {
/**
 * 1. Написать функцию перехвата нажатия клавиш left arrow, right arrow, up arrow, down arrow
 * 2. При нажатии на любую из клавиш появляется alert с названием нажатой клавиши
 * 3. Запрещается использовать любые плагины, которые осуществляют перехват нажатых клавиш
 * 4. Необходимо продолжать результат действия этих клавиш после закрытия alert
 * 
 */

pressKey();

function pressKey() {
  $(document).keyup((e) => {
    switch(e.keyCode) 
    {
      case 37:
        alert('Клавиша left arrow');
        break;
      case 38:
        alert('Клавиша up arrow');
        break;
      case 39:
        alert('Клавиша right arrow');
        break;
      case 40:
        alert('Клавиша down arrow');
        break;      
    }
  });
}
  
});