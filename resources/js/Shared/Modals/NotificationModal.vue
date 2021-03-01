<template>
  <div v-if="showing">
    <div class="fixed z-8 inset-0 overflow-y-auto">
      <div
        class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0"
      >
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span
          class="hidden sm:inline-block sm:align-middle sm:h-screen"
          aria-hidden="true"
          >&#8203;</span
        >
        <div
          class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-4 sm:align-middle sm:max-w-lg sm:w-full"
          role="dialog"
          aria-modal="true"
          aria-labelledby="modal-headline"
        >
          <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div>
              <div class="mt-3 sm:mt-0 sm:ml-4 sm:text-left">
                <h3
                  class="text-lg leading-6 font-medium text-gray-900"
                  id="modal-headline"
                >
                  🔔 Notifications
                </h3>
                <form class="pt-5">
                  <li
                    v-for="notification in $page.notifiable.notifications"
                    :key="notification.id"
                    class="border-gray-400 flex flex-row mb-3"
                  >
                    <div
                      class="select-none cursor-pointer mb-2 bg-white rounded-md flex flex-1 pr-4 items-center transition duration-500 ease-in-out transform hover:-translate-y-1"
                    >
                      <div
                        class="flex flex-col rounded-md w-8 h-8 justify-center items-center mr-2"
                      >
                        <img
                          :src="
                            notification.photo === null
                              ? `/img/user.png`
                              : `/storage/` + notification.photo
                          "
                        />
                      </div>
                      <div class="flex-1 pl-1 mr-1">
                        <div class="font-medium">
                          {{ notification.first_name }}
                          {{ notification.last_name }}
                          {{ notification.notification }}
                        </div>
                        <div class="text-gray-600 text-xs mt-1">
                          {{ format(notification.created_at) }}
                        </div>
                      </div>
                      <div class="text-gray-600 text-xs">
                        {{ time(notification.created_at) }}
                      </div>
                    </div>
                  </li>
                  <div
                    class="text-center"
                    v-if="$page.notifiable.notifications.length === 0"
                  >
                    <h1 class="text-3xl mb-3">🔕</h1>
                    <p class="font-medium">No notifications as of now.</p>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="pr-4 pb-4">
            <div
              class="bg-gray-50 px-4 pb-3 sm:px-6 sm:flex sm:flex-row-reverse"
            >
              <button
                type="button"
                @click="clearModal"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-red-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
              >
                Clear All
              </button>
              <button
                type="button"
                @click="closeModal"
                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
              >
                Close
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mask } from "vue-the-mask";
import moment from "moment";

export default {
  props: {
    modal: {
      default: false,
    },
    showing: Boolean,
  },
  directives: { mask },
  data() {
    return {
      notifications: this.$page.notifiable.notifications,
    };
  },
  methods: {
    clearModal() {
      this.$emit("update:modal");
      this.read();
      this.$page.notifiable.notifications = null;
    },
    closeModal() {
      this.$emit("update:modal");
    },
    read() {
      this.$inertia.put(this.route("notification.update"));
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
    time(value) {
      if (value) {
        return moment(String(value)).format("h:mm A");
      }
    },
  },
};
</script>
