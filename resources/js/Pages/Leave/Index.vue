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
              Employee
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Monthly Salary
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
                :href="route('leaves')"
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
                :href="route('leaves')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="normal-case font-normal">
                  {{ leave.first_name }} {{ leave.middle_initial }}
                  {{ leave.last_name }}
                </div>
                <div class="capitalize text-sm text-blue-500">
                  {{ leave.position }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('leaves')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="normal-case font-normal">
                  {{ currency(leave.monthly_salary) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('leaves')"
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
                :href="route('leaves')"
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
                :href="route('leaves')"
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
                :href="route('leaves')"
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
                :href="route('leaves')"
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
                  Disapproved
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <div
                v-if="
                  leave.recommendation === null &&
                  leave.approved_for === null &&
                  leave.disapproved_due_to === null
                "
              >
                <span
                  @click="approve(leave)"
                  class="text-green-600 inline-flex mt-2 cursor-pointer hover:text-green-900"
                  >✅ Approve</span
                >
                <span
                  @click="disapprove(leave)"
                  class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                  >🚫 Disapprove</span
                >
              </div>
              <div v-else>
                <inertia-link
                  :href="route('leaves.form', leave.id)"
                  class="text-indigo-600 inline-flex mt-0 cursor-pointer hover:text-indigo-900"
                  >👁️‍🗨️ View Form</inertia-link
                >
              </div>
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
    <disapprove-modal
      :showing="show"
      :id="id"
      :modal.sync="show"
    ></disapprove-modal>
    <approve-modal :showing="approved" :id="id" :modal.sync="approved"></approve-modal>
    <pagination :links="leaves.links" />
  </div>
</template>

<script>
import Layout from "@/Shared/Layout";
import Icon from "@/Shared/Icon";
import mapValues from "lodash/mapValues";
import Pagination from "@/Shared/Pagination";
import pickBy from "lodash/pickBy";
import SearchFilter from "@/Shared/SearchFilter";
import throttle from "lodash/throttle";
import moment from "moment";
import DisapproveModal from "@/Pages/Leave/DisapproveModal";
import ApproveModal from "@/Pages/Leave/ApproveModal";

export default {
  metaInfo: { title: "Leave Filing" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    DisapproveModal,
    ApproveModal,
  },
  props: {
    filters: Object,
    leaves: Object,
  },
  data() {
    return {
      id: null,
      approved: false,
      show: false,
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
            "leaves",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    disapprove(id) {
      this.id = id;
      this.show = true;
    },
    approve(id) {
      this.id = id;
      this.approved = true;
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMM D, YYYY");
      }
    },
    currency(price, sign = "₱ ") {
      const pieces = parseFloat(price).toFixed(2).split("");
      let ii = pieces.length - 3;
      while ((ii -= 3) > 0) {
        pieces.splice(ii, 0, ",");
      }
      return sign + pieces.join("");
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
  },
};
</script>
