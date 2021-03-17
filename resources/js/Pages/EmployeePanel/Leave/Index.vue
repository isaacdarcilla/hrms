<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Leave Filing 📤</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <label class="block text-gray-700">Filter Leave</label>
        <select v-model="form.trashed" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">Active</option>
          <option value="only">Inactive</option>
        </select>
      </search-filter>
      <button
        @click="showCreateModal"
        class="btn-indigo rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <span>➕ Apply</span>
        <span class="hidden md:inline">Leave</span>
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
              ID
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Leave Type
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Date of Filing
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Working Days
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Inclusive Dates
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
              Action
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr
            v-for="leave in leaves.data"
            :key="leave.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.leave')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="font-semibold text-blue-600">
                  #{{ leave.leave_number }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.leave')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="normal-case font-normal">
                  {{ leave.type_of_leave }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.leave')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="normal-case font-normal">
                  {{ format(leave.date_of_filing) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.leave')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div
                  v-if="leave.number_of_working_days === '1'"
                  class="normal-case font-normal"
                >
                  {{ leave.number_of_working_days }} day
                </div>
                <div v-else class="normal-case font-normal">
                  {{ leave.number_of_working_days }} days
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.leave')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <ul
                  v-for="date in leave.start_of_inclusive_date"
                  :key="date.id"
                  class="normal-case font-semibold text-blue-600"
                >
                  <li class="flex pt-1">
                    {{ format(date.date) }}
                  </li>
                </ul>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.leave')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div
                  v-if="leave.recommendation === null"
                  class="normal-case font-semibold text-yellow-600"
                >
                  Pending
                </div>
                <div
                  v-else-if="leave.recommendation === 'Approved'"
                  class="normal-case font-semibold text-green-600"
                >
                  Approved
                </div>
                <div v-else class="normal-case font-semibold text-red-600">
                  Disapproved -
                  <span class="text-gray-800 normal-case">{{
                    leave.disapproved_due_to
                  }}</span>
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <span
                @click="destroy(leave.id, leave.leave_number)"
                v-if="
                  !leave.deleted_at &&
                  leave.recommendation === null &&
                  leave.approved_for === null &&
                  leave.disapproved_due_to === null
                "
                class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                >🗑️ Delete</span
              >
              <span
                v-else
                class="text-gray-600 inline-flex mt-0 cursor-pointer hover:text-blue-600"
                >Unavailable</span
              >
            </td>
          </tr>
        </tbody>
        <tr v-if="leaves.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No leave found.
          </td>
        </tr>
      </table>
    </div>
    <create-modal :showing="showCreate" :modal.sync="showCreate"></create-modal>
    <pagination :links="leaves.links" />
  </div>
</template>

<script>
import Layout from "@/Pages/EmployeePanel/Layout";
import Icon from "@/Shared/Icon";
import mapValues from "lodash/mapValues";
import Pagination from "@/Shared/Pagination";
import pickBy from "lodash/pickBy";
import SearchFilter from "@/Shared/SearchFilter";
import throttle from "lodash/throttle";
import CreateModal from "@/Pages/EmployeePanel/Leave/CreateModal";
import moment from "moment";

export default {
  metaInfo: { title: "Leave Filing" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    CreateModal,
  },
  props: {
    filters: Object,
    leaves: Object,
    totals: Object,
  },
  provide() {
    return {
      totals: this.totals,
    };
  },
  data() {
    return {
      showCreate: false,
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
            "employee.leave",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    showCreateModal() {
      this.showCreate = true;
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
    oldestDate(array) {
      let oldest = array.slice().sort((a, b) => {
        return Date.parse(a.date) - Date.parse(b.date);
      });
      return moment(String(oldest[0].date)).format("MMMM D, YYYY");
    },
    latestDate(array) {
      let latest = array.slice().sort((a, b) => {
        return Date.parse(b.date) - Date.parse(a.date);
      });
      return moment(String(latest[0].date)).format("MMMM D, YYYY");
    },
    destroy(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("employee.leave.destroy", id));
        }
      });
    },
  },
};
</script>
