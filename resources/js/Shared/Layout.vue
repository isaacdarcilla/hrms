<template>
  <div>
    <portal-target name="dropdown" slim />
    <div class="md:flex md:flex-col">
      <div class="md:h-screen md:flex md:flex-col" @click="hideDropdownMenus">
        <div class="md:flex md:flex-shrink-0">
          <div
            class="bg-indigo-900 md:flex-shrink-0 md:w-56 px-6 py-4 flex items-center justify-between md:justify-center"
          >
            <inertia-link class="mt-1" href="/">
              <logo class="fill-white" width="120" height="28" />
            </inertia-link>
            <dropdown class="md:hidden" placement="bottom-end">
              <svg
                class="fill-white w-6 h-6"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
              >
                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
              </svg>
              <div
                slot="dropdown"
                class="mt-2 px-8 py-4 shadow-lg bg-indigo-800 rounded"
              >
                <main-menu :url="url()" />
              </div>
            </dropdown>
          </div>
          <div
            class="bg-white border-b w-full p-4 md:py-0 md:px-12 text-sm md:text-md flex justify-between items-center"
          >
            <div class="mt-1 mr-4 font-bold">
              {{ $page.auth.user.account.name }}
            </div>

            <dropdown class="mt-1" placement="bottom-end">
              <div class="flex items-center cursor-pointer select-none group">
                <div
                  class="text-gray-700 flex items-center group-hover:text-indigo-600 focus:text-indigo-600 mr-1 whitespace-no-wrap font-bold"
                >
                  <img
                    class="w-5 h-5 mx-2"
                    :src="
                      $page.auth.user.photo
                        ? $page.auth.user.photo
                        : '/img/user.png'
                    "
                  />
                  <span> {{ $page.auth.user.first_name }}</span>
                  <span class="hidden md:inline ml-1">{{
                    $page.auth.user.last_name
                  }}</span>
                </div>
                <icon
                  class="w-5 h-5 group-hover:fill-indigo-600 fill-gray-700 focus:fill-indigo-600"
                  name="cheveron-down"
                />
                <span class="relative inline-block mx-1 pr-3">
                  <svg
                    class="w-6 h-6"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                    ></path>
                  </svg>
                  <span v-if="$page.notifiable.count !== 0"
                    class="animate-bounce absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"
                    >{{ $page.notifiable.count }}</span
                  >
                </span>
              </div>

              <div
                slot="dropdown"
                class="mt-2 py-4 shadow-xl bg-white rounded text-sm"
              >
                <inertia-link
                  class="block px-6 py-2 hover:bg-indigo-500 font-bold hover:text-white"
                  :href="route('users.edit', $page.auth.user.id)"
                  >My Profile</inertia-link
                >
                <div
                  @click="showNotifModal"
                  class="block px-6 py-2 hover:bg-indigo-500 cursor-pointer font-bold hover:text-white"
                >
                  <div>
                    <span class="relative inline-block">
                      Notifications
                      <span
                        class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full"
                        >{{ $page.notifiable.count }}</span
                      >
                    </span>
                  </div>
                </div>

                <inertia-link
                  class="block px-6 py-2 hover:bg-indigo-500 font-bold hover:text-white"
                  :href="route('users')"
                  >Manage Staffs</inertia-link
                >
                <inertia-link
                  class="block font-bold px-6 py-2 hover:bg-indigo-500 hover:text-white"
                  :href="route('logout')"
                  method="post"
                  >Logout</inertia-link
                >
              </div>
            </dropdown>
          </div>
        </div>
        <div class="md:flex md:flex-grow md:overflow-hidden">
          <main-menu
            :url="url()"
            class="hidden md:block bg-indigo-800 flex-shrink-0 w-56 p-12 overflow-y-auto"
          />
          <div
            class="md:flex-1 px-4 py-8 md:p-12 md:overflow-y-auto"
            scroll-region
          >
            <flash-messages />
            <slot />
          </div>
        </div>
      </div>
    </div>
    <notification-modal
      :showing="showModal"
      :modal.sync="showModal"
    ></notification-modal>
  </div>
</template>

<script>
import Dropdown from "@/Shared/Dropdown";
import FlashMessages from "@/Shared/FlashMessages";
import Icon from "@/Shared/Icon";
import Logo from "@/Shared/Logo";
import MainMenu from "@/Shared/MainMenu";
import NotificationModal from "@/Shared/Modals/NotificationModal.vue";
import swal from "sweetalert";

export default {
  components: {
    Dropdown,
    FlashMessages,
    Icon,
    Logo,
    MainMenu,
    NotificationModal,
  },
  props: {
    modal: {
      default: false,
    },
  },
  data() {
    return {
      showModal: false,
      showUserMenu: false,
      accounts: null,
    };
  },
  methods: {
    showNotifModal() {
      this.showModal = true;
    },
    url() {
      return location.pathname.substr(1);
    },
    hideDropdownMenus() {
      this.showUserMenu = false;
    },
  },
};
</script>
