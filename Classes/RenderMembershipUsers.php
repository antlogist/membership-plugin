<?php

if ( ! defined( 'ABSPATH' ) ) {
	die;
}

include_once ('UserController.php');

class RenderMembershipUsers {

  static function renderTab() {
    $user = new UserController();

    echo '<script type="text/javascript">
    const users = ' . $user->showAll() . ';
    </script>';

    echo '

      <div class="wrap membership-wrapper" id="membershipUser">
      <h1 class="wp-heading-inline">Users</h1>
        <div id="membershipApp">
          <table class="wp-list-table widefat fixed striped table-view-list users">
            <thead>
              <tr>
                <th scope="col" id="usernameTh" class="manage-column column-id">Id</th>
                <th scope="col" id="nameTh" class="manage-column column-name">First Name</th>
                <th scope="col" id="lastNameTh" class="manage-column column-last-name">Last Name</th>
                <th scope="col" id="emailTh" class="manage-column column-email">Email</th>
                <th scope="col" id="membershipTh" class="manage-column column-membership">Membership</th>
                <th scope="col" id="lastVisitTh" class="manage-column column-last-visit num">Last Visit</th>
              </tr>
            </thead>

            <tbody id="the-list">
              <tr v-for="(user, index) in users" :key="userKeyHelper + user.id" :id="userKeyHelper + index">
                <td class="username-td column-username" v-text="user.id"></td>
                <td class="name-td column-name" v-text="user.first_name"></td>
                <td class="lastName-td column-lastName" v-text="user.last_name"></td>
                <td class="email-td column-email" v-text="user.email"></td>
                <td class="membership-td column-membership" v-text="user.membership"></td>
                <td class="lastVisit-td column-lastVisit" v-text="user.last_visit"></td>
              </tr>
            </tbody>

            <tfoot>
              <tr>
                <th scope="col" id="usernameTh" class="manage-column column-id">Id</th>
                <th scope="col" id="nameTh" class="manage-column column-name">First Name</th>
                <th scope="col" id="lastNameTh" class="manage-column column-last-name">Last Name</th>
                <th scope="col" id="emailTh" class="manage-column column-email">Email</th>
                <th scope="col" id="membershipTh" class="manage-column column-membership">Membership</th>
                <th scope="col" id="lastVisitTh" class="manage-column column-last-visit num">Last Visit</th>
              </tr>
            </tfoot>

          </table>

        </div>
      </div>
    ';
  }
}
