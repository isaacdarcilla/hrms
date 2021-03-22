<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Home 🏠</h1>
    <div
      v-if="notices.length !== 0"
      class="mb-4 flex items-center justify-between rounded"
    >
      <div class="flex items-center">
        <div class="mx-4 pb-4">📢</div>
        <div class="pb-4 text-gray text-sm font-medium">
          {{ format(notices[0].created_at) }} • {{ notices[0].notice_type }} •
          {{ notices[0].notice_subject }} •
          {{ notices[0].notice_description }}
        </div>
      </div>
      <button type="button" class="group mr-2 pb-4">
        <button
          :href="route('notices')"
          class="text-xs font-medium text-blue-600 hover:text-blue-700"
        >
          Read more
        </button>
      </button>
    </div>
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
      <button
        :href="route('employees')"
        class="min-w-0 cursor-pointer hover:bg-gray-300 rounded-lg overflow-hidden bg-white dark:bg-gray-800 transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <div class="p-4 flex items-center">
          <div
            class="p-3 rounded-full text-orange-500 dark:text-orange-100 bg-orange-100 dark:bg-orange-500 mr-4"
          >
            <svg
              class="w-5 h-5"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total employees
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
              {{ total.employees }} <span class="text-xs">active</span>
            </p>
          </div>
        </div>
      </button>
      <button
        :href="route('jobs')"
        class="min-w-0 cursor-pointer hover:bg-gray-300 rounded-lg overflow-hidden bg-white dark:bg-gray-800 transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <div class="p-4 flex items-center">
          <div
            class="p-3 rounded-full text-green-500 dark:text-green-100 bg-green-100 dark:bg-green-500 mr-4"
          >
            <svg
              class="w-5 h-5"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                clip-rule="evenodd"
              ></path>
              <path
                d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total job postings
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
              {{ total.jobs }} <span class="text-xs">vacant</span>
            </p>
          </div>
        </div>
      </button>
      <button
        :href="route('applicants')"
        class="min-w-0 cursor-pointer hover:bg-gray-300 rounded-lg overflow-hidden bg-white dark:bg-gray-800 transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <div class="p-4 flex items-center">
          <div
            class="p-3 rounded-full text-blue-500 dark:text-blue-100 bg-blue-100 dark:bg-blue-500 mr-4"
          >
            <svg
              class="w-5 h-5"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2h-1.528A6 6 0 004 9.528V4z"
              ></path>
              <path
                fill-rule="evenodd"
                d="M8 10a4 4 0 00-3.446 6.032l-1.261 1.26a1 1 0 101.414 1.415l1.261-1.261A4 4 0 108 10zm-2 4a2 2 0 114 0 2 2 0 01-4 0z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total applicants
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
              {{ total.applicants }} <span class="text-xs">application</span>
            </p>
          </div>
        </div>
      </button>
      <button
        :href="route('users')"
        class="min-w-0 cursor-pointer hover:bg-gray-300 rounded-lg overflow-hidden bg-white dark:bg-gray-800 transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <div class="p-4 flex items-center">
          <div
            class="p-3 rounded-full text-teal-500 dark:text-teal-100 bg-teal-100 dark:bg-teal-500 mr-4"
          >
            <svg
              class="w-5 h-5"
              fill="currentColor"
              viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg"
            >
              <path
                fill-rule="evenodd"
                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                clip-rule="evenodd"
              ></path>
            </svg>
          </div>
          <div>
            <p
              class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
            >
              Total HR staffs
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
              {{ total.staffs }} <span class="text-xs">active</span>
            </p>
          </div>
        </div>
      </button>
    </div>
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-3">
      <div class="h-64">
        <ul class="flex flex-col bg-white rounded-lg p-4">
          <div class="mb-4 mx-4 flex justify-between items-center">
            <div class="font-semibold">Announcements</div>
            <button
              :href="route('notices')"
              class="text-blue-600 text-sm font-semibold hover:text-blue-700"
            >
              View more
            </button>
          </div>
          <div class="overflow-y-auto h-48">
            <li
              v-for="notice in notices"
              :key="notice.id"
              class="border-gray-400 flex flex-row mb-2"
            >
              <div
                class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-3 transition duration-500 ease-in-out transform hover:-translate-y-1"
              >
                <div
                  class="flex flex-col rounded-md w-10 h-10 bg-blue-200 justify-center items-center mr-4"
                >
                  📢
                </div>
                <div class="flex-1 pl-1 mr-5">
                  <div class="font-medium capitalize">
                    {{ notice.notice_subject }}
                  </div>
                  <div class="text-gray-600 text-sm mt-1">
                    {{ truncate(notice.notice_description) }}
                  </div>
                </div>
              </div>
            </li>
          </div>
          <div v-if="notices.length === 0">
            <div class="mx-auto my-3 text-center items-center">
              <h1 class="text-3xl mb-2">☹️</h1>
              Nothing here yet.
            </div>
          </div>
        </ul>
      </div>
      <div class="h-40">
        <ul class="flex flex-col bg-white rounded-lg p-4">
          <div class="mb-4 mx-4 flex justify-between items-center">
            <div class="font-semibold">Vacant Jobs</div>
            <button
              :href="route('jobs')"
              class="text-blue-600 text-sm font-semibold hover:text-blue-700"
            >
              View more
            </button>
          </div>
          <div class="overflow-y-auto h-48">
            <li
              v-for="job in jobs"
              :key="job.id"
              class="border-gray-400 flex flex-row mb-2"
            >
              <div
                class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-3 transition duration-500 ease-in-out transform hover:-translate-y-1"
              >
                <div
                  class="flex flex-col rounded-md w-10 h-10 bg-red-200 justify-center items-center mr-4"
                >
                  💼
                </div>
                <div class="flex-1 pl-1 mr-5">
                  <div class="font-medium capitalize">
                    {{ job.position }} at {{ job.department }}
                  </div>
                  <div class="text-gray-600 text-sm mt-1">
                    {{ truncate(job.job_description) }}
                  </div>
                </div>
              </div>
            </li>
            <div v-if="jobs.length === 0">
              <div
                class="mx-auto my-12 justify-evenly text-center items-center"
              >
                <h1 class="text-3xl mb-2">☹️</h1>
                Nothing here yet.
              </div>
            </div>
          </div>
        </ul>
      </div>
      <div class="h-40">
        <ul class="flex flex-col bg-white rounded-lg p-4">
          <div class="mb-4 mx-4 flex justify-between items-center">
            <div class="font-semibold">My Tasks</div>
          </div>
          <form @submit.prevent="addTask" class="w-full max-w-lg">
            <div class="flex flex-wrap">
              <div class="w-full px-3 mb-1">
                <input
                  class="form-input block w-full h-8"
                  placeholder="Type new task and press Enter"
                  v-model="form.description"
                />
              </div>
            </div>
          </form>
          <div class="overflow-y-auto h-32">
            <li
              v-for="task in tasks"
              :key="task.id"
              class="border-gray-400 flex flex-row mb-2"
            >
              <div
                class="select-none cursor-pointer bg-white rounded-md flex flex-1 items-center p-3 transition duration-500 ease-in-out transform hover:-translate-y-1"
              >
                <div
                  class="flex flex-col rounded-md w-10 h-10 bg-yellow-200 justify-center items-center mr-4"
                >
                  ⚡
                </div>
                <div class="flex-1 justify-between items-center">
                  <div v-if="!task.cleared_at" class="font-semibold inline">
                    {{ task.description }}
                  </div>
                  <div
                    v-else
                    class="font-semibold line-through inline text-gray-600"
                  >
                    {{ task.description }}
                  </div>
                </div>
                <div
                  v-if="!task.cleared_at"
                  @click.prevent="doneTask(task.id)"
                  class="text-sm text-green-600"
                  title="Mark as done"
                >
                  <svg
                    class="w-5 h-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                    ></path>
                  </svg>
                </div>
                <div
                  v-else
                  @click.prevent="undoneTask(task.id)"
                  class="text-sm text-green-600"
                  title="Mark as undone"
                >
                  <svg
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
              </div>
            </li>
          </div>
          <div class="mx-4 my-2 flex justify-between items-center">
            <div class="text-sm font-semibold inline">
              {{ total.tasks }} task left
            </div>
            <div
              v-if="tasks.length !== 0"
              @click="clearTask"
              class="text-sm font-semibold cursor-pointer text-red-600"
            >
              Clear All
            </div>
          </div>
        </ul>
      </div>
    </div>

    <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <div class="bg-white px-6 py-4 font-semibold text-base">
        Support Tickets and Inquiries
      </div>
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              ID
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Employee
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Inquiry Type
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Description
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Attachment
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Status
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Priority
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Created On
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Action
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr
            v-for="inquiry in inquiries.data"
            :key="inquiry.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <button class="px-0 py-4 whitespace-nowrap text-sm text-gray-900">
                <div class="font-semibold text-blue-600">
                  #{{ inquiry.inquiry_number }}
                </div>
              </button>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <button class="px-0 py-4 whitespace-nowrap text-sm text-gray-900">
                <div class="capitalize text-left font-semibold text-gray-700">
                  {{ inquiry.first_name }} {{ inquiry.last_name }}
                </div>
                <div class="text-sm text-left capitalize text-blue-500">
                  {{ inquiry.position }} <span class="lowercase">at</span>
                  {{ inquiry.department }}
                </div>
              </button>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <button class="px-0 py-4 whitespace-nowrap text-sm text-gray-900">
                <div class="normal-case">
                  {{ inquiry.type }}
                </div>
              </button>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <button class="px-0 py-4 whitespace-nowrap text-sm text-gray-900">
                <div class="normal-case text-left w-48">
                  {{ inquiry.description }}
                </div>
              </button>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <button class="px-0 py-4 whitespace-nowrap text-sm text-gray-900">
                <div class="normal-case font-normal">
                  <img
                    hidden
                    v-viewer="options"
                    :id="'p' + `${inquiry.id}`"
                    :src="
                      inquiry.image === null
                        ? `/img/no-image.png`
                        : `/storage/` + inquiry.image
                    "
                  />
                  <span
                    @click="image(inquiry.id)"
                    class="text-blue-600 font-semibold inline-flex mt-0 cursor-pointer hover:text-blue-900"
                    >View Attachment</span
                  >
                </div>
              </button>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <button class="px-0 py-4 whitespace-nowrap text-sm text-gray-900">
                <div
                  v-if="inquiry.status === 'Open'"
                  class="normal-case font-semibold text-green-600"
                >
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-green-600 rounded-full"
                    >{{ inquiry.status }}</span
                  >
                </div>
                <div v-else class="normal-case font-semibold text-red-600">
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-orange-600 rounded-full"
                    >{{ inquiry.status }}</span
                  >
                </div>
              </button>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <button class="px-0 py-4 whitespace-nowrap text-sm text-gray-900">
                <div
                  v-if="inquiry.priority === 'High'"
                  class="normal-case font-semibold text-red-600"
                >
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full"
                    >{{ inquiry.priority }}</span
                  >
                </div>
                <div v-else class="normal-case font-semibold text-yellow-600">
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-yellow-600 rounded-full"
                    >{{ inquiry.priority }}</span
                  >
                </div>
              </button>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <button class="px-0 py-4 whitespace-nowrap text-sm text-gray-900">
                <div class="normal-case">
                  {{ format(inquiry.created_at) }}
                </div>
              </button>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <span
                v-if="inquiry.replied !== '1'"
                @click="showModal(inquiry)"
                class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                >💬 Reply</span
              >
              <span
                v-else
                class="text-green-600 cursor-pointer hover:text-indigo-900"
                >💬 Replied</span
              >
            </td>
          </tr>
        </tbody>
        <tr v-if="inquiries.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No inquiries found.
          </td>
        </tr>
      </table>
    </div>
    <pagination :links="inquiries.links" />
    <reply :showing="show" :inquiry="inquiry" :modal.sync="show"></reply>
  </div>
</template>

<script>
import Layout from "@/Shared/Layout";
import Pagination from "@/Shared/Pagination";
import Reply from "@/Pages/Dashboard/Reply";
import moment from "moment";
import "viewerjs/dist/viewer.css";
import Viewer from "v-viewer";
import Vue from "vue";

Vue.use(Viewer);

export default {
  metaInfo: { title: "Dashboard" },
  layout: Layout,
  components: {
    Pagination,
    Reply,
  },
  props: {
    total: Object,
    notices: Array,
    jobs: Array,
    tasks: Array,
    inquiries: Object,
  },
  data() {
    return {
      show: false,
      inquiry: null,
      options: { movable: false, toolbar: false, navbar: false, title: false },
      form: {
        description: null,
      },
    };
  },
  methods: {
    showModal(item) {
      this.inquiry = item;
      this.show = true;
    },
    image(value) {
      let image = `#p${value}`;
      const viewer = this.$el.querySelector(image).$viewer;
      viewer.show();
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
    truncate(input) {
      if (input.length > 50) {
        return input.substring(0, 50) + "...";
      }
      return input;
    },
    addTask() {
      this.$inertia.post(
        this.route("task.store", this.$page.auth.user.id),
        this.form,
        {
          onStart: () => (this.sending = true),
          onFinish: () => {
            this.sending = false;
            this.form.description = null;
          },
        }
      );
    },
    doneTask(id) {
      this.$inertia.put(this.route("task.update", id), {
        onStart: () => (this.sending = true),
        onFinish: () => {
          this.sending = false;
        },
      });
    },
    undoneTask(id) {
      this.$inertia.put(this.route("task.update.undone", id), {
        onStart: () => (this.sending = true),
        onFinish: () => {
          this.sending = false;
        },
      });
    },
    clearTask() {
      this.$inertia.delete(
        this.route("task.destroy", this.$page.auth.user.id),
        {
          onStart: () => (this.sending = true),
          onFinish: () => {
            this.sending = false;
          },
        }
      );
    },
  },
};
</script>
