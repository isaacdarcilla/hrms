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
              Scholarship Type
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Applied On
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
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.scholarship')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div
                  v-if="scholar.status === 'Pending'"
                  class="normal-case font-semibold text-yellow-600"
                >
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-yellow-600 bg-yellow-300 rounded-full"
                    >Pending</span
                  >
                </div>
                <div
                  v-else-if="scholar.status === 'Approved'"
                  class="normal-case font-semibold text-green-600"
                >
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-green-600 bg-green-300 rounded-full"
                    >Accepted</span
                  >
                </div>
                <div v-else class="normal-case font-semibold text-green-600">
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-600 bg-red-300 rounded-full"
                    >Declined</span
                  >
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.scholarship')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div>
                  {{ scholar.contact.first_name }}
                  {{ scholar.contact.middle_name[0] }}
                  {{ scholar.contact.last_name }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.scholarship')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div>
                  {{ scholar.office.office_name }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.scholarship')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div v-if="scholar.scholarship_type == '1'">
                  Local Training Grant
                </div>
                <div v-else-if="scholar.scholarship_type == '2'">
                  Training Grant Abroad
                </div>
                <div v-else-if="scholar.scholarship_type == '3'">
                  Sabbatical Leave
                </div>
                <div v-else>Advanced Degree Program</div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('employee.scholarship')"
                class="px-6 py-2 whitespace-nowrap text-sm text-gray-900"
              >
                <div>
                  {{ format(scholar.created_at) }}
                </div>
              </inertia-link>
            </td>
            <td
              class="px-6 py-2 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <span
                v-if="scholar.status == 'Approved'"
                class="text-gray-600 inline-flex mt-0 cursor-pointer hover:text-blue-600"
              >
                <inertia-link
                  :href="route('employee.scholarship.form', scholar.id)"
                  class="text-indigo-600 inline-flex mt-0 cursor-pointer hover:text-indigo-900"
                  >👁️‍🗨️ View Form</inertia-link
                ></span
              >
              <span
                v-if="scholar.status == 'Approved'"
                class="text-gray-600 inline-flex mt-0 cursor-pointer hover:text-blue-600"
              >
                <inertia-link
                  :href="route('employee.scholarship.documents', scholar.id)"
                  class="text-indigo-600 inline-flex mt-0 cursor-pointer hover:text-indigo-900"
                  >⬆️ Documentary Requirements</inertia-link
                ></span
              >
              <span
                v-if="scholar.status == 'Pending'"
                class="text-gray-600 inline-flex mt-0 cursor-pointer hover:text-blue-600"
              >
                <inertia-link
                  :href="route('employee.scholarship.edit', scholar.id)"
                  class="text-indigo-600 inline-flex mt-0 cursor-pointer hover:text-indigo-900"
                  >✏️ Edit</inertia-link
                ></span
              >
              <span
                v-if="scholar.status == 'Pending'"
                @click="destroy(scholar.id, scholar.scholarship_number)"
                class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                >🗑️ Delete</span
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
          this.$inertia.delete(this.route("employee.scholarship.destroy", id));
        }
      });
    },
  },
};
</script>
