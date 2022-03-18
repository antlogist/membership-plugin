(function(){
  'use strict';

  BASEOBJECT.user.init = function() {
    const app = Vue.createApp({
      data() {
        return {
          users: users,
          userKeyHelper: 'userRow',
          isModal: false,
          currentUser: null
        }
      },
      methods: {
        openUserMenu(user) {
          this.currentUser = this.currentUser === null ? user : null;
          this.isModal = !this.isModal;
        }
      }
    }).mount('#membershipApp');
  }
})();