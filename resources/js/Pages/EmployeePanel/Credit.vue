<template>
  <div>
    <div class="flex justify-between">
      <h1 class="mb-8 font-bold text-3xl">
        Vacation & Sick Leave Card Credits 🗂️
        <!-- Vacation & Sick Leave Card of {{ employee.first_name }} {{ employee.last_name }} 🗂️ -->
      </h1>
      <inertia-link :href="route('cto.employee.credit', employee.id)">
        <button class="text-right btn-indigo rounded-lg">
          <span>Switch Card</span>
          <span class="hidden md:inline">To CTO & SPL</span>
        </button>
      </inertia-link>
    </div>
    <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
      <div class="p-5 bg-white rounded-lg shadow">
        <div class="flex justify-between">
          <div>
            <div class="font-semibold text-gray-600">Total Vacation Leave</div>
            <div class="flex items-center pt-1">
              <div class="text-2xl font-bold text-gray-700">
                +{{ round(totals.vacation)
                }}<span class="text-sm font-normal"> available</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="p-5 bg-white rounded-lg shadow">
        <div class="flex justify-between">
          <div>
            <div class="font-semibold text-gray-600">Total Sick Leave</div>
            <div class="flex items-center pt-1">
              <div class="text-2xl font-bold text-gray-700">
                +{{ round(totals.sick)
                }}<span class="text-sm font-normal"> available</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="p-5 bg-white rounded-lg shadow">
        <div class="flex justify-between">
          <div>
            <div class="font-semibold text-gray-600">Overall Total</div>
            <div class="flex items-center pt-1">
              <div class="text-2xl font-bold text-green-600">
                +{{ total() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div
      class="shadow overflow-hidden border-b border-gray-200 rounded-lg mt-6"
    >
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Crediting
            </th>

            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Period
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Particulars
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Vacation Leave
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Sick Leave
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Date Processed
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Processed By
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Remarks
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr
            v-for="credit in credits.data"
            :key="credit.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="px-6 py-1 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('credits', employee.id)"
                class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"
              >
                <div
                  v-if="credit.leave_number === 'add'"
                  class="capitalize text-green-600 font-medium text-xl"
                >
                  +
                </div>
                <div
                  v-else-if="credit.leave_number === 'minus'"
                  class="capitalize text-red-600 font-medium text-xl"
                >
                  -
                </div>
                <div v-else class="capitalize text-blue-600 font-medium">
                  #{{ credit.leave_number }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-1 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('credits', employee.id)"
                class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"
              >
                <div
                  v-if="credit.leave_number === 'add'"
                  class="capitalize font-medium"
                >
                  {{ formatDate(credit.created_at) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-1 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('credits', employee.id)"
                class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"
              >
                <div
                  v-if="credit.leave_number !== 'add'"
                  class="capitalize font-medium w-48"
                >
                  {{ credit.particular }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-1 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('credits', employee.id)"
                class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"
              >
                <div
                  v-if="credit.vacation_leave !== null"
                  class="capitalize font-medium text-green-800"
                >
                  {{ credit.vacation_leave }}
                </div>
                <div v-else class="capitalize font-medium">0</div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-1 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('credits', employee.id)"
                class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"
              >
                <div
                  v-if="credit.sick_leave !== null"
                  class="capitalize font-medium text-red-800"
                >
                  {{ credit.sick_leave }}
                </div>
                <div v-else class="capitalize font-medium">0</div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-1 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('credits', employee.id)"
                class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize font-medium">
                  {{ format(credit.updated_at) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-1 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('credits', employee.id)"
                class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize font-medium">
                  {{ credit.user.first_name }} {{ credit.user.last_name }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-1 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('credits', employee.id)"
                class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="normal-case font-medium w-32">
                  {{ credit.remarks }}
                </div>
              </inertia-link>
            </td>
          </tr>
        </tbody>
        <tr v-if="credits.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No leave credits found.
          </td>
        </tr>
      </table>
    </div>
    <div class="mt-3 text-xs font-semibold text-red-600 italic">
      ** These records are for the current year.
    </div>
    <pagination :links="credits.links" />
  </div>
</template>

<script>
import Icon from "@/Shared/Icon";
import Layout from "@/Pages/EmployeePanel/Layout";
import mapValues from "lodash/mapValues";
import Pagination from "@/Shared/Pagination";
import pickBy from "lodash/pickBy";
import SearchFilter from "@/Shared/SearchFilter";
import throttle from "lodash/throttle";
import moment from "moment";

export default {
  metaInfo: { title: "Leave Credits" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
  },
  props: {
    credits: Object,
    employee: Object,
    filters: Object,
    totals: Object,
  },
  data() {
    return {
      credit: null,
      showSick: false,
      showVacation: false,
      showManual: false,
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
            "credits",
            this.employee.id,
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    round(number) {
      return Math.round((number + Number.EPSILON) * 10000) / 10000;
    },
    includes(value) {
      if (value) {
        return value.includes("-");
      }
    },
    check(vacation, sick, credit) {
      if (vacation !== null) {
        this.showVacation = true;
        this.showSick = false;
        this.credit = credit;
      } else if (sick !== null) {
        this.showSick = true;
        this.showVacation = false;
        this.credit = credit;
      }
    },
    total() {
      return this.totals.vacation + this.totals.sick;
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY h:mm A");
      }
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
    formatDate(value) {
      if (value) {
        return moment(String(value)).format("MMMM");
      }
    },
  },
};
</script>
