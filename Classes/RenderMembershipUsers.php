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
            <div style="padding-left: 25px; padding-right: 25px;">

              <h1>{{ currentUser.first_name }} {{ currentUser.last_name }}</h1>
              <div>{{ currentUser.email }}</div>

              <div>
                <h2>Membership Plan: <span style="font-weight: normal; color: red;">Test Plan</span></h2>
              </div>

              <div>
                <h2>Viewable Pages:</h2>
                <p><input type="checkbox" value="newsletters"> Newsletters</p>
                <p><input type="checkbox" value="historyPages"> History Pages</p>
                <button class="button button-primary" style="margin-top: 15px;">Save Changes</button>
              </div>

              <h2 style="margin-top: 25px;">Orders</h2>
              <table class="wp-list-table widefat fixed striped table-view-list">
              <thead>
                <tr>
                  <th scope="col" id="usernameTh" class="manage-column column-order-id">Order Id</th>
                  <th scope="col" id="nameTh" class="manage-column column-product-name">Product</th>
                  <th scope="col" id="lastNameTh" class="manage-column column-quantity" style="text-align: center;">Quantity</th>
                  <th scope="col" id="emailTh" class="manage-column column-date" style="text-align: center;">Date</th>
                </tr>
              </thead>

              <tbody id="the-list">
                <tr>
                  <td class="username-td column-order-id">730</td>
                  <td class="name-td column-product-name">Test product</td>
                  <td class="email-td column-quantity text-center" style="text-align: center;">2</td>
                  <td class="membership-td column-date" style="text-align: center;">2022-03-06</td>
                </tr>
              </tbody>

              <tfoot>
                <tr>
                <th scope="col" id="usernameTh" class="manage-column column-order-id">Order Id</th>
                <th scope="col" id="nameTh" class="manage-column column-product-name">Product</th>
                <th scope="col" id="lastNameTh" class="manage-column column-quantity" style="text-align: center;">Quantity</th>
                <th scope="col" id="emailTh" class="manage-column column-date" style="text-align: center;">Date</th>
                </tr>
              </tfoot>

            </table>

            </div>
          </div>

        </div>
      </div>
    ';
  }
}
