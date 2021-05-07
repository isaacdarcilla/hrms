<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">PSIPOP 📂</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <label class="block text-gray-700">Filter Psipop</label>
      </search-filter>
      <inertia-link
        class="btn-indigo rounded-lg cursor-pointer"
        :href="route('psipop.create')"
      >
        <span>➕ Create</span>
        <span class="hidden md:inline">New</span>
      </inertia-link>
    </div>
    <div class="shadow overflow-auto border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Unique Item Number
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
              TIN No.
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Incumbent Name
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Sex
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Birth Date
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Original Appoint Date
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Latest Promotion Date
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Salary Grade
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Step Increment
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Filled Position
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
              Annual Salary
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Actual Salary
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Years of Service
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Loyalty Pay Date
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Action
            </th>
          </tr>
        </thead>
        <tbody class="bg-white overflow-auto divide-y divide-gray-200">
          <tr
            v-for="psipop in psipops.data"
            :key="psipop.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize w-32 font-semibold"
                  v-if="psipop.item_number !== null"
                >
                  {{ psipop.item_number }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize w-32 font-semibold"
                  v-if="psipop.position !== null"
                >
                  {{ psipop.position }}
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
                class="px-6 w-40 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize w-32 font-semibold"
                  v-if="psipop.tin_number !== null"
                >
                  {{ psipop.tin_number }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize w-32 font-semibold"
                  v-if="psipop.incumbent_name !== null"
                >
                  {{ psipop.incumbent_name }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize font-semibold"
                  v-if="psipop.sex !== null"
                >
                  {{ psipop.sex[0] }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize font-semibold"
                  v-if="psipop.birth_date !== null"
                >
                  {{ format(psipop.birth_date) }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize font-semibold"
                  v-if="psipop.appoint_date !== null"
                >
                  {{ format(psipop.appoint_date) }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize font-semibold"
                  v-if="psipop.last_promo_date !== null"
                >
                  {{ format(psipop.last_promo_date) }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize font-semibold"
                  v-if="psipop.salary_grade !== null"
                >
                  {{ psipop.salary_grade }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div class="capitalize font-semibold">
                  {{ increment(psipop.last_promo_date) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize font-semibold"
                  v-if="psipop.filled_position !== null"
                >
                  {{ psipop.filled_position }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize font-semibold"
                  v-if="psipop.monthly_salary !== null"
                >
                  {{ currency(psipop.monthly_salary) }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize font-semibold"
                  v-if="psipop.authorized_salary !== null"
                >
                  {{ currency(psipop.authorized_salary) }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize font-semibold"
                  v-if="psipop.actual_salary !== null"
                >
                  {{ currency(psipop.actual_salary) }}
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
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div class="capitalize font-semibold">
                  {{ loyalty(psipop.appoint_date) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="capitalize font-semibold"
                >
                  {{ nextPay(psipop.appoint_date) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-1 py-4 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('psipop.edit', psipop.id)"
                class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                >✏️ Edit</inertia-link
              >
              <span
                class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                >🗑️ Delete</span
              >
            </td>
          </tr>
        </tbody>
        <tr v-if="psipops.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No psipops found.
          </td>
        </tr>
      </table>
    </div>
    <pagination :links="psipops.links" />
  </div>
</template>

<script>
import Icon from "@/Shared/Icon";
import Layout from "@/Shared/Layout";
import mapValues from "lodash/mapValues";
import Pagination from "@/Shared/Pagination";
import pickBy from "lodash/pickBy";
import SearchFilter from "@/Shared/SearchFilter";
import throttle from "lodash/throttle";
import moment from "moment";

export default {
  metaInfo: { title: "PSIPOP" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
  },
  props: {
    psipops: Object,
    filters: Object,
  },
  data() {
    return {
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
            "psipop.index",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    increment(date) {
      if (date !== null) {
        let diff_from_latest_to_now = moment().diff(
          moment(String(date)),
          "years"
        );

        let divide = parseInt(diff_from_latest_to_now) / 3;

        return parseInt(divide + 1);
      } else {
        return 1;
      }
    },
    loyalty(date) {
      if (date !== null) {
        return moment().diff(moment(String(date)), "years");
      } else {
        return 0;
      }
    },
    nextPay(appointed) {
      if (appointed !== null) {
        return this.format(moment(String(appointed)).add(10, 'years'));
      } else {
        return 0;
      }
    },
    truncate(input) {
      if (input.length > 50) {
        return input.substring(0, 50) + "...";
      }
      return input;
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MM/DD/YYYY");
      }
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
    currency(price, sign = "₱ ") {
      const pieces = parseFloat(price).toFixed(2).split("");
      let ii = pieces.length - 3;
      while ((ii -= 3) > 0) {
        pieces.splice(ii, 0, ",");
      }
      return sign + pieces.join("");
    },
  },
};
</script>
