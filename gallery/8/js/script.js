// Действия выполняются после загрузки DOM
$(document).ready(function() { 
	
  var z = 0; 				// Переменная для хранения значения свойства z-index
  var inAnimation = false; 	// Флаг, сигнализирующий о выполнении анимации
  
  $('#pictures img').each(function() { 		// Устанавливаем начальные значения свойства z-index
    z++; 								// В перменной будет храниться максимальное значение свойства z-index
    $(this).css('z-index', z); 			// Присваиваем увеличенное значение свойства z-index для <img>
  });

  function swapFirstLast(isFirst) {
  
    if(inAnimation) return false; 		// Если уже выполняется анимация, то прерываем дальнейшее выполнение функции
    else inAnimation = true;            // Устанавливаем флаг, сигнализирующий о выполенении анимации
    
    var processZindex, direction, newZindex, inDeCrease; // Переменные для технических нужд
    
    if(isFirst) { processZindex = z; direction = '-'; newZindex = 1; inDeCrease = 1; } 	// Устанавливаем перменные для действия "следующий"
    else { processZindex = 1; direction = ''; newZindex = z; inDeCrease = -1; } 		// Устанавливаем перменные для действия "предыдущий"
    	
	
    $('#pictures img').each(function() { 				// Цикл по всем изображениям
	
      if($(this).css('z-index') == processZindex) { 	// Проверяем, нужно ли обрабатывать изображение
	  
	    // Анимируем перемещение изображения над/под галереей (предполагается, что все изображения имеют одинаковую высоту)
        $(this).animate({ 'top' : direction + $(this).height() + 'px' }, 'slow', function() { 
          $(this).css('z-index', newZindex) 				// Устанавливаем новое значение свойства z-index
            .animate({ 'top' : '0' }, 'slow', function() {  // Анимируем движение изображения обратно на свое место
              inAnimation = false; 							// Сбрасываем флаг
            });
        });
      } else { 	// Нет изображений для обработки, нужно только увеличть/уменьшить значение свойства z-index
        $(this).animate({ 'top' : '0' }, 'slow', function() { 						
          $(this).css('z-index', parseInt($(this).css('z-index')) + inDeCrease); 	// Увеличиваем или уменьшаем значение свойства z-index
        });
      }
    });
    
    return false; // Прерываем дальнейшую обработку события
  }
  
  $('#previousLink').click(function() {
    return swapFirstLast(false); 	// Переводим первое изображение на последнюю позицию
  });
 
  $('#nextLink').click(function() {
    return swapFirstLast(true); 	// Переводим последнее изображение на первую позицию
  });
});