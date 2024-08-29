// Получаем ссылки на кнопку и выпадающий контент
var dropdownBtn = document.getElementById("dropdownBtn");
var dropdownContent = document.getElementById("dropdownContent");

// Добавляем обработчик события клика на кнопку
dropdownBtn.addEventListener("click", function() {
  // Проверяем, отображается ли в данный момент выпадающий контент
  var isVisible = dropdownContent.style.display === "block";

  // Если контент отображается, скрываем его, иначе отображаем
  if (isVisible) {
    dropdownContent.style.display = "none";
  } else {
    dropdownContent.style.display = "block";
  }
});


document.querySelectorAll('.card').forEach(function(card) {
  if (card.scrollHeight > 200 && card.scrollHeight <= 250) {
    card.style.height = card.scrollHeight + 'px';
  }
});


