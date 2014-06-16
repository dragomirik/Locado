// �������� ����������� ����� �������� DOM
$(document).ready(function() { 
	
  var z = 0; 				// ���������� ��� �������� �������� �������� z-index
  var inAnimation = false; 	// ����, ��������������� � ���������� ��������
  
  $('#pictures img').each(function() { 		// ������������� ��������� �������� �������� z-index
    z++; 								// � ��������� ����� ��������� ������������ �������� �������� z-index
    $(this).css('z-index', z); 			// ����������� ����������� �������� �������� z-index ��� <img>
  });

  function swapFirstLast(isFirst) {
  
    if(inAnimation) return false; 		// ���� ��� ����������� ��������, �� ��������� ���������� ���������� �������
    else inAnimation = true;            // ������������� ����, ��������������� � ����������� ��������
    
    var processZindex, direction, newZindex, inDeCrease; // ���������� ��� ����������� ����
    
    if(isFirst) { processZindex = z; direction = '-'; newZindex = 1; inDeCrease = 1; } 	// ������������� ��������� ��� �������� "���������"
    else { processZindex = 1; direction = ''; newZindex = z; inDeCrease = -1; } 		// ������������� ��������� ��� �������� "����������"
    	
	
    $('#pictures img').each(function() { 				// ���� �� ���� ������������
	
      if($(this).css('z-index') == processZindex) { 	// ���������, ����� �� ������������ �����������
	  
	    // ��������� ����������� ����������� ���/��� �������� (��������������, ��� ��� ����������� ����� ���������� ������)
        $(this).animate({ 'top' : direction + $(this).height() + 'px' }, 'slow', function() { 
          $(this).css('z-index', newZindex) 				// ������������� ����� �������� �������� z-index
            .animate({ 'top' : '0' }, 'slow', function() {  // ��������� �������� ����������� ������� �� ���� �����
              inAnimation = false; 							// ���������� ����
            });
        });
      } else { 	// ��� ����������� ��� ���������, ����� ������ ��������/��������� �������� �������� z-index
        $(this).animate({ 'top' : '0' }, 'slow', function() { 						
          $(this).css('z-index', parseInt($(this).css('z-index')) + inDeCrease); 	// ����������� ��� ��������� �������� �������� z-index
        });
      }
    });
    
    return false; // ��������� ���������� ��������� �������
  }
  
  $('#previousLink').click(function() {
    return swapFirstLast(false); 	// ��������� ������ ����������� �� ��������� �������
  });
 
  $('#nextLink').click(function() {
    return swapFirstLast(true); 	// ��������� ��������� ����������� �� ������ �������
  });
});