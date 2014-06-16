$(document).ready(function(){ // когда документ готов

    // располагаем фотографии в случайном порядке
    $('#gallery div').each(function() { 
        var iRL = Math.floor(Math.random() * 500);
        var iRT = Math.floor(Math.random() * 350);
        var iMT = Math.floor(Math.random() * 100 - 50);
        $(this).animate({
            left: iRL, 
            top: iRT, 
            rotate: iMT + 'deg',
        }, 2000); 
    }); 

    var bPrevClick = false; // отключение реакции на нажатие кнопки мыши решает проблемы с fancybox
    $('#gallery div').draggable({ // делаем фотографии перетаскиваемыми
        containment: 'parent',
        start: function(e,ui) {
            bPrevClick = true;
        },
        stop: function(e, ui) {
            setTimeout(function() {
                bPrevClick = false;
            }, 50);
        }
    });
    $('#gallery div a').bind('click',function(e) {
        if (bPrevClick) {
            e.preventDefault();
            e.stopImmediatePropagation();
        }
    });

    $('#gallery div').mousedown(function(e) { // событие нажатия кнопки мыши
        var iMZ = 0;
        $('#gallery div').each(function() { // ищем максимальный zIndex
            var z = parseInt($(this).css('zIndex'))
            iMZ = (z > iMZ) ? z : iMZ;
        });
        $(e.target).closest('#gallery div').css({ // поднимаем активное изображение
            zIndex: iMZ + 1
        });
    });

    $('a.fancybox').fancybox({ // инициализация fancybox
        zoomSpeedIn: 500, // скорость увеличения
        zoomSpeedOut: 500, // скорость уменьшения
        overlayShow: false // отключаем маскирующий слой
    });
});