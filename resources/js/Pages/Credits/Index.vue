<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      Leave Credits of {{ employee.first_name }} {{ employee.last_name }} 📊
    </h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
        <label class="block text-gray-700">Filter Leave Credit</label>
        <select v-model="form.trashed" class="mt-1 w-full form-select">
          <option :value="null" />
          <option value="with">Active</option>
          <option value="only">Inactive</option>
        </select>
      </search-filter>
      <button class="btn-indigo rounded-lg">
        <span>➕ Manual</span>
        <span class="hidden md:inline">Credit</span>
      </button>
    </div>
    <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
      <div class="p-5 bg-white rounded-lg shadow mr-3 mb-6">
        <div class="flex justify-between">
          <div>
            <div class="font-semibold text-gray-600">Total Vacation Leave</div>
            <div class="flex items-center pt-1">
              <div class="text-2xl font-bold text-gray-700">
                +{{ totals.vacation
                }}<span class="text-sm font-normal"> available</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="p-5 bg-white rounded-lg shadow mr-3 mb-6">
        <div class="flex justify-between">
          <div>
            <div class="font-semibold text-gray-600">Total Sick Leave</div>
            <div class="flex items-center pt-1">
              <div class="text-2xl font-bold text-gray-700">
                +{{ totals.sick
                }}<span class="text-sm font-normal"> available</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="p-5 bg-white rounded-lg shadow mr-3 mb-6">
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
    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Leave Number
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
              Action
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
                <div class="capitalize text-blue-600 font-medium">
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
                  v-if="credit.vacation_leave !== null"
                  class="capitalize font-medium text-red-600"
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
                  class="capitalize font-medium text-red-600"
                >
                  {{ credit.sick_leave }}
                </div>
                <div v-else class="capitalize font-medium">0</div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-1 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <span class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                >✏️ Edit</span
              >
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
    <pagination :links="credits.links" />
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
  },
};
</script>
