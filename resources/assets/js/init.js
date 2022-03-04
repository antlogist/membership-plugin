(function() {
  'use strict';

  const el = document.querySelector('.membership-wrapper');
  switch(el.id) {
    case 'membership':
      BASEOBJECT.membership.init();
      break;
    case 'membershipUser':
      BASEOBJECT.user.init();
      break;
  }

})();