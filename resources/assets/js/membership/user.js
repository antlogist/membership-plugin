(function(){
  'use strict';

  BASEOBJECT.user.init = function() {
    const app = Vue.createApp({
      data() {
        return {
          users: users,
          userKeyHelper: 'userRow'
        }
      }
    }).mount('#membershipApp');
  }
})();