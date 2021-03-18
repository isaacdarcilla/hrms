<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Employees 👥</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <label class="block text-gray-700">Filter Employee</label>
        <select v-model="form.trashed" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">Active</option>
          <option value="only">Inactive</option>
        </select>
      </search-filter>
      <button
        @click="showModal"
        class="btn-indigo rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <span>➕ Create</span>
        <span class="hidden md:inline">Employee</span>
      </button>
    </div>
    <div
      class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg overflow-x-auto"
    >
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Employee Name
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Department
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Position
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Phone
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
              Leave Credit
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
            v-for="contact in contacts.data"
            :key="contact.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="border-t transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 flex items-center focus:text-indigo-500"
                :href="route('employees.edit', contact.id)"
              >
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-10 w-10">
                    <img
                      class="h-10 w-10 rounded-full"
                      :src="
                        contact.photo === null
                          ? `/img/user.png`
                          : `/storage/` + contact.photo
                      "
                    />
                  </div>
                  <div class="ml-4">
                    <div class="text-sm font-medium capitalize text-gray-900">
                      {{ contact.first_name }} {{ contact.middle_name }}
                      {{ contact.last_name }} {{ contact.name_extension }}
                    </div>
                    <div
                      v-if="contact.email !== null"
                      class="text-sm lowercase text-blue-500"
                    >
                      {{ contact.email }}
                    </div>
                    <div v-else class="text-sm text-gray-500">
                      No data available
                    </div>
                  </div>
                </div>
                <icon
                  v-if="contact.deleted_at"
                  name="trash"
                  class="flex-shrink-0 w-3 h-3 fill-gray-600 ml-2"
                />
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('employees.edit', contact.id)"
                tabindex="-1"
              >
                <div class="capitalize" v-if="contact.department !== null">
                  {{ contact.department }}
                </div>
                <div v-else class="text-sm text-gray-500">
                  No data available
                </div>
                <div class="capitalize text-sm text-blue-500">
                  {{ contact.status_of_appointment }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('employees.edit', contact.id)"
                tabindex="-1"
              >
                <div class="capitalize" v-if="contact.position !== null">
                  {{ contact.position }}
                </div>
                <div v-else class="text-sm text-gray-500">
                  No data available
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('employees.edit', contact.id)"
                tabindex="-1"
              >
                <div v-if="contact.phone !== null">{{ contact.phone }}</div>
                <div v-else class="text-sm text-gray-500">
                  No data available
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <span
                v-if="contact.status === '1'"
                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-300 text-green-800"
              >
                Active
              </span>
              <span
                v-else-if="contact.status === '0'"
                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-300 text-red-800"
              >
                Inactive
              </span>
              <span v-else class="text-sm text-gray-500">
                No data available
              </span>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <div v-if="$page.auth.user.super === true">
                <inertia-link
                  v-if="contact.status_of_appointment === 'Permanent/Regular'"
                  class="text-indigo-600 hover:text-indigo-900"
                  :href="route('credits', contact.id)"
                  tabindex="-1"
                >
                  <span>⚙️ Manage</span>
                </inertia-link>
                <inertia-link
                  v-else
                  class="text-red-600 hover:text-red-900"
                  :href="route('employees')"
                  tabindex="-1"
                >
                  <div
                    class="flex"
                    title="Leave credits are available to regular employees only."
                  >
                    <span class="mr-1">N/A</span>
                    <span
                      ><svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        ></path></svg
                    ></span>
                  </div>
                </inertia-link>
              </div>
              <div v-else>
                <inertia-link
                  class="text-red-600 hover:text-red-900"
                  :href="route('employees')"
                  tabindex="-1"
                >
                  <div class="flex" title="You have no superadmin rights.">
                    <span class="mr-1">Restricted</span>
                    <span
                      ><svg
                        class="w-4 h-4"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg"
                      >
                        <path
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
                        ></path></svg
                    ></span>
                  </div>
                </inertia-link>
              </div>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="text-indigo-600 hover:text-indigo-900"
                :href="route('employees.edit', contact.id)"
                tabindex="-1"
              >
                <span>👁️‍🗨️ View</span>
              </inertia-link>
            </td>
          </tr>
        </tbody>
        <tr v-if="contacts.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No employees found.
          </td>
        </tr>
      </table>
    </div>
    <employee-add-modal
      :showing="showEmployeeAddModal"
      :modal.sync="showEmployeeAddModal"
    ></employee-add-modal>
    <pagination :links="contacts.links" />
  </div>
</template>

<script>
import Icon from "@/Shared/Icon";
import Layout from "@/Shared/Layout";
import mapValues from "lodash/mapValues";
import Pagination from "@/Shared/Pagination";
import pickBy from "lodash/pickBy";
import SearchFilter from "@/Shared/SearchFilter";
import EmployeeAddModal from "@/Shared/Modals/EmployeeAddModal";
import throttle from "lodash/throttle";

export default {
  metaInfo: { title: "Employees" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    EmployeeAddModal,
  },
  props: {
    contacts: Object,
    filters: Object,
  },
  data() {
    return {
      showEmployeeAddModal: false,
      form: {
        search: this.filters.search,
        trashed: this.filters.trashed,
      },
    };
  },
  watch: {
    form: {
      handler: throttle(function () {
        let query = pickBy(this.form);
        this.$inertia.replace(
          this.route(
            "employees",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    showModal() {
      this.showEmployeeAddModal = true;
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
  },
};
</script>
