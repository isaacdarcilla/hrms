<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      Service Record of {{ employee.first_name }} {{ employee.last_name }} 🗂️
    </h1>
    <div class="mb-6 flex items-center justify-between">
      <button class="btn-indigo rounded-lg">
        <span>🖨️ Print</span>
        <span class="hidden md:inline">Service Record</span>
      </button>
    </div>

    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Service Started
            </th>

            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Service Ended
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Designation
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
              Salary
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Station/Place
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Branch
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              LV/ABS W/O Pay
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Separation Date
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Separation Cause
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
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr
            v-for="service in service_records.data"
            :key="service.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ format(service.service_start) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ format(service.service_end) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ service.designation }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ service.status }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ currency(service.salary) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ service.station_or_place }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ service.branch }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ service.pay }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ format(service.separation_date) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ service.separation_cause }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ formatDate(service.updated_at) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('service.record.index', employee.id)"
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="capitalize">
                  {{ service.user.first_name }} {{ service.user.last_name }}
                </div>
              </inertia-link>
            </td>
          </tr>
        </tbody>
        <tr v-if="service_records.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No service record found.
          </td>
        </tr>
      </table>
    </div>
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
import Create from "@/Pages/ServiceRecord/Create";
import Edit from "@/Pages/ServiceRecord/Edit";

export default {
  metaInfo: { title: "Service Record" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    Create,
    Edit,
  },
  props: {
    employee: Object,
    filters: Object,
    service_records: Object,
  },
  data() {
    return {
      showCreate: false,
      showEdit: false,
      service: null,
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
            "service.record.index",
            this.employee.id,
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    showEditModal(item) {
      this.service = item;
      this.showEdit = true;
    },
    showCreateModal() {
      this.showCreate = true;
    },
    round(number) {
      return Math.round((number + Number.EPSILON) * 10000) / 10000;
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MM/DD/YYYY");
      }
    },
    formatDate(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
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
    destroy(id) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete service record?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("service.record.destroy", id));
        }
      });
    },
  },
};
</script>
