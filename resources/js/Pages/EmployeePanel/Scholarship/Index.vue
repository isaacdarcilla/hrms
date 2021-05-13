<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Scholarship 🎓</h1>
    <div class="mb-6 flex justify-between items-center">
      <search-filter
        v-model="form.search"
        class="w-full max-w-md mr-4"
        @reset="reset"
      >
      </search-filter>
      <inertia-link
        :href="route('employee.scholarship.create')"
        class="btn-indigo rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <span>➕ Apply</span>
        <span class="hidden md:inline">Scholarship</span>
      </inertia-link>
    </div>
    <div
      class="shadow overflow-auto border-b border-gray-200 sm:rounded-lg overflow-x-auto"
    >
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-white">
          <tr class="transition-all hover:bg-gray-100 hover:shadow-lg">
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
              Department
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Number
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
              Scholarship Type
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Plan
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
              Action
            </th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr
            v-for="scholar in scholars.data"
            :key="scholar.id"
            class="hover:bg-gray-100 focus-within:bg-gray-100"
          >
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.scholarship')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div class="font-semibold text-blue-600">
                  #{{ scholar.scholarship_number }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <span
                class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                >🗑️ Delete</span
              >
              <span
                class="text-gray-600 inline-flex mt-0 cursor-pointer hover:text-blue-600"
              >
                <inertia-link
                  class="text-indigo-600 inline-flex mt-0 cursor-pointer hover:text-indigo-900"
                  >👁️‍🗨️ View Form</inertia-link
                ></span
              >
            </td>
          </tr>
        </tbody>
        <tr v-if="scholars.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No scholarship found.
          </td>
        </tr>
      </table>
    </div>
    <create-modal :showing="showCreate" :modal.sync="showCreate"></create-modal>
    <pagination :links="scholars.links" />
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
import moment from "moment";

export default {
  metaInfo: { title: "Scholarship" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
  },
  props: {
    filters: Object,
    scholars: Object,
    employee: Object,
  },
  provide() {
    return {
      totals: this.totals,
    };
  },
  data() {
    return {
      form: {
        search: this.filters.search,
      },
    };
  },
  watch: {
    form: {
      handler: throttle(function () {
        let query = pickBy(this.form);
        this.$inertia.replace(
          this.route(
            "employee.scholarship",
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null);
    },
    format(value) {
      if (value && moment(value, moment.ISO_8601, true).isValid()) {
        return moment(String(value)).format("MMMM D, YYYY");
      } else {
        return value;
      }
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
