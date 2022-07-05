(function($) {
    showSuccesssToast = function(position) {
    'use strict';
    $.toast({
      heading: 'Success',
      text: 'oi lindo',
      showHideTransition: 'slide',
      icon: 'success',
      loaderBg: '#f96868',
      position: position
    })
  };
  showInfoToast = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Info',
      text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
      showHideTransition: 'slide',
      icon: 'info',
      loaderBg: '#46c35f',
      position: 'top-right'
    })
  };
  showWarningToast = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Warning',
      text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
      showHideTransition: 'slide',
      icon: 'warning',
      loaderBg: '#57c7d4',
      position: 'top-right'
    })
  };
  showDangerToast = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Danger',
      text: 'And these were just the basic demos! Scroll down to check further details on how to customize the output.',
      showHideTransition: 'slide',
      icon: 'error',
      loaderBg: '#f2a654',
      position: 'top-right'
    })
  };
  showToastPosition = function(position) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Positioning',
      text: 'alex the custom position object or use one of the predefined ones',
      position: String(position),
      icon: 'error',
      stack: false,
      loaderBg: '#f2a654'
    })
  }
  /*xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx script alex xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */

  if(variavel == 1){
      // alert(variavel);

      setTimeout(() => {
          document.getElementById('login_senha').click();
      }, 100);

  }else if(variavel == 2){
      // alert(variavel);
      setTimeout(() => {
          document.getElementById('logar').click();
      }, 100);
  }



  login_senha = function(position) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Error',
      text: 'Usuario ou Senha não existe',
      position: String(position),
      icon: 'error',
      stack: false,
      loaderBg: '#f2a654'
    })
  }

  logar = function(position) {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Error',
      text: 'Necessário realizar login para ter acesso a pagina',
      position: String(position),
      icon: 'error',
      stack: false,
      loaderBg: '#f2a654'
    })
  }

 



  /*xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx fim script alex xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx */
  showToastInCustomPosition = function() {
    'use strict';
    resetToastPosition();
    $.toast({
      heading: 'Custom positioning',
      text: 'Specify the custom position object or use one of the predefined ones',
      icon: 'success',
      position: {
        left: 120,
        top: 120
      },
      stack: false,
      loaderBg: '#f96868'
    })
  }
  resetToastPosition = function() {
    $('.jq-toast-wrap').removeClass('bottom-left bottom-right top-left top-right mid-center'); // to remove previous position class
    $(".jq-toast-wrap").css({
      "top": "",
      "left": "",
      "bottom": "",
      "right": ""
    }); //to remove previous position style
  }
})(jQuery);
