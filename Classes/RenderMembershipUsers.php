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
                <th scope="col" id="selectBtn" class="manage-column column-select-btn"></th>
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
                <td class="selectBtn-td column-select-btn"> <button type="button" @click="openUserMenu(user)"> + </button> </td>
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
                <th scope="col" id="selectBtnTh" class="manage-column column-select-btn"></th>
              </tr>
            </tfoot>

          </table>

          <div v-if="isModal" id="TB_overlay" class="TB_overlayBG"></div>
          <div v-if="isModal" id="TB_window" class="thickbox-loading" style="width: 772px; height: 611px; margin-left: -386px; top: 30px; margin-top: 0px; visibility: visible;">
            <div id="TB_title">
              <div id="TB_ajaxWindowTitle"></div>
              <div id="TB_closeAjaxWindow">
                <button type="button" id="TB_closeWindowButton" @click="openUserMenu(null)" style="width:30px; height:30px; border:1px solid black;">x</button>
              </div>
            </div>
            <div id="TB_ajaxContent" style="width:600px;height:545px">
              <p>{{ currentUser.first_name }}</p>
            </div>
          </div>

        </div>
      </div>
    ';
  }
}
