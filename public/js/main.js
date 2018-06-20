(function() {
  'use strict';

 var cmds = document.getElementsByClassName('btn-sm btn-danger');
 var i;

 for (i = 0; i < cmds.length; i++) {
   cmds[i].addEventListener('click', function(e) {
     e.preventDefault();
     if (confirm('are you sure?')) {
       document.getElementById('form_' + this.dataset.id).submit();
     }
   });
 }

})();
