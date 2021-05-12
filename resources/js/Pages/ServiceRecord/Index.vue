<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      Service Record of {{ employee.first_name }} {{ employee.last_name }} 🗂️
    </h1>
    <div class="mb-6 flex items-center justify-between">
      <button @click="showCreate = true" class="btn-indigo rounded-lg">
        <span>➕ Create</span>
        <span class="hidden md:inline">Record</span>
      </button>
      <button class="btn-indigo rounded-lg">
        <span>🖨️ Print</span>
        <span class="hidden md:inline">Service Record</span>
      </button>
    </div>

    <vue-html2pdf
      :show-layout="false"
      :float-layout="false"
      :enable-download="false"
      :preview-modal="true"
      :paginate-elements-by-height="1400"
      :filename="filename"
      :pdf-quality="2"
      :manual-pagination="true"
      pdf-format="legal"
      pdf-orientation="portrait"
      pdf-content-width="mx-auto"
      @hasStartedGeneration="hasStartedGeneration()"
      @hasGenerated="hasGenerated($event)"
      ref="html2Pdf"
    >
      <section
        slot="pdf-content"
        class="mt-2 bg-white font-sans mx-auto text-black"
        style="width: 816px; height: 1280px"
      >
        <div class="flex mt-6">
          <img class="mx-3 rounded-full" src="/img/logo.jpg" width="60px" />
          <div class="my-auto">
            <div class="text-sm italic mt-1">Republic of the Philippines</div>
            <div class="text-sm font-bold uppercase my-1">
              Catanduanes State University
            </div>
            <div class="text-sm italic mb-1">Virac, Catanduanes</div>
          </div>
        </div>
        <div class="border-t-2 mt-2 border-blue-600"></div>
        <div class="mx-4 mt-4">
          <div class="text-center text-lg font-bold uppercase">
            Service Record
          </div>
        </div>
        <div class="mt-4">
          <div class="h-6 ml-2">
            <div class="flex justify-items-auto">
              <div class="w-1/12">
                <div class="uppercase">Name:</div>
              </div>
              <div class="w-7/12 text-center">
                <div class="capitalize border-b-one border-black">
                  <div class="flex justify-between">
                    <div class="w-1/3 uppercase font-semibold">Arcilla</div>
                    <div class="w-1/3 uppercase font-semibold">Geraldine</div>
                    <div class="w-1/3 uppercase font-semibold">Magdaraog</div>
                  </div>
                </div>
              </div>
              <div class="w-5/12 ml-6">
                <div>If married woman, also give maiden name</div>
              </div>
            </div>
            <div class="flex justify-items-auto">
              <div class="w-1/12"></div>
              <div class="w-7/12 text-center">
                <div class="normal-case">
                  <div class="flex justify-between">
                    <div class="w-1/3">Surname</div>
                    <div class="w-1/3">Given Name</div>
                    <div class="w-1/3">Middle Name</div>
                  </div>
                </div>
              </div>
              <div class="w-5/12 ml-6">
                <div>Nee: Not Applicable</div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-4">
          <div class="h-6 ml-2">
            <div class="flex justify-items-auto">
              <div class="w-1/12">
                <div class="uppercase">Birth:</div>
              </div>
              <div class="w-7/12 text-center">
                <div class="capitalize border-b-one border-black">
                  <div class="flex justify-between">
                    <div class="w-1/2">January 28, 1986</div>
                    <div class="w-1/2">Virac, Catanduanes</div>
                  </div>
                </div>
              </div>
              <div class="w-5/12 ml-6">
                <div>Date herein should be checked from birth</div>
              </div>
            </div>
            <div class="flex justify-items-auto">
              <div class="w-1/12"></div>
              <div class="w-7/12 text-center">
                <div class="normal-case">
                  <div class="flex justify-between">
                    <div class="w-1/2">Date</div>
                    <div class="w-1/2">Place</div>
                  </div>
                </div>
              </div>
              <div class="w-5/12 ml-6 text-justify">
                <div>certificate or some other reliable documents.</div>
              </div>
            </div>
          </div>
        </div>
        <div class="mt-12 text-justify" style="text-indent: 50px">
          This is to certify that the employee named herein above actually
          rendered service in this Office as shown by the service record below,
          each line f which is supported by appointment anf oher papers actually
          issued by this Office and approved by the autorities concerned.
        </div>
        <div class="mt-8">
          <div class="h-6 ml-2">
            <div class="flex justify-items-auto">
              <div class="w-3/12 border-t-one border-r-one border-black">
                <div class="uppercase text-center">
                  Service <br />(INCL. DATES)
                </div>
              </div>
              <div class="w-4/12 border-t-one border-r-one border-black">
                <div class="uppercase text-center mt-4">
                  Record of appointment
                </div>
              </div>
              <div class="w-2/12 border-t-one border-r-one border-black">
                <div class="uppercase text-center">
                  Office/Entity/<br />Division
                </div>
              </div>
              <div class="w-1/12 border-t-one border-r-one border-black">
                <div class="uppercase text-center">LV/ABS W/O</div>
              </div>
              <div class="w-2/12 border-t-one border-black">
                <div class="uppercase text-center mt-4">Separation</div>
              </div>
            </div>
          </div>
          <div class="mt-2">
            <div class="h-6 ml-2">
              <div class="flex justify-items-auto">
                <div
                  class="w-3/12 border-t-one border-b-one border-r-one border-black"
                >
                  <div class="flex justify-items-auto text-center">
                    <div class="w-1/2 border-r-one border-black">From</div>
                    <div class="w-1/2">To</div>
                  </div>
                  <div class="flex justify-items-auto text-center">
                    <div class="w-1/2 border-r-one border-t-one border-black">
                      01/02/2020
                    </div>
                    <div class="w-1/2 border-t-one border-black">
                      01/20/2020
                    </div>
                  </div>
                </div>
                <div
                  class="w-4/12 border-t-one border-b-one border-r-one border-black"
                >
                  <div class="flex justify-items-auto text-center">
                    <div class="w-2/5 border-r-one border-black">
                      Designation
                    </div>
                    <div class="w-1/5 border-r-one border-black">Status</div>
                    <div class="w-2/5">Salary</div>
                  </div>
                  <div class="flex justify-items-auto text-center">
                    <div class="w-2/5 border-r-one border-t-one border-black">
                      Administrative Aide III
                    </div>
                    <div class="w-1/5 border-r-one border-t-one border-black">
                      Perm.
                    </div>
                    <div class="w-2/5 border-t-one border-black">
                      P 1,000,000
                    </div>
                  </div>
                </div>
                <div
                  class="w-2/12 border-t-one border-b-one border-r-one border-black"
                >
                  <div class="flex justify-items-auto text-center">
                    <div class="w-1/2 border-r-one border-black">Place</div>
                    <div class="w-1/2">Branch</div>
                  </div>
                  <div class="flex justify-items-auto text-center">
                    <div class="w-1/2 border-r-one border-t-one border-black">
                      Catanduanes State University, Virac, Cat.
                    </div>
                    <div class="w-1/2 border-t-one border-black">Nat'l</div>
                  </div>
                </div>
                <div class="w-1/12 border-r-one border-b-one border-black">
                  <div class="uppercase text-center">PAY</div>
                </div>
                <div class="w-2/12 border-t-one border-b-one border-black">
                  <div class="flex justify-items-auto text-center">
                    <div class="w-1/2 border-r-one border-black">Date</div>
                    <div class="w-1/2">Cause</div>
                  </div>
                </div>
              </div>
              <!-- Start -->
              <!-- <div class="flex justify-items-auto">
                <div class="w-3/12 border-b-one border-r-one border-black">
                  <div class="flex justify-items-auto text-center">
                    <div class="w-1/2 border-r-one border-black">
                      01/11/2020
                    </div>
                    <div class="w-1/2">01/01/2020</div>
                  </div>
                </div>
                <div class="w-4/12 border-b-one border-r-one border-black">
                  <div class="flex justify-items-auto text-center">
                    <div class="w-2/5 border-r-one border-black">
                      Administrative Aide III
                    </div>
                    <div class="w-1/5 border-r-one border-black">Perm.</div>
                    <div class="w-2/5">P 1,000,000</div>
                  </div>
                </div>
                <div class="w-2/12 border-b-one border-r-one border-black">
                  <div class="flex justify-items-auto text-center">
                    <div class="w-1/2 border-r-one border-black">
                      Catanduanes State University, Virac, Cat.
                    </div>
                    <div class="w-1/2">Nat'l</div>
                  </div>
                </div>
                <div class="w-1/12 border-r-one border-b-one border-black">
                  <div class="normal-case text-center">None</div>
                </div>
                <div class="w-2/12 border-b-one border-black">
                  <div class="flex justify-items-auto text-center">
                    <div class="w-1/2 border-r-one border-black">
                      01/01/2020
                    </div>
                    <div class="w-1/2">RA-12299</div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
        </div>
      </section>
    </vue-html2pdf>

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
            <td
              class="px-1 py-4 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <span
                v-if="!service.deleted_at"
                @click="showEditModal(service)"
                class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                >✏️ Edit</span
              >
              <span
                @click="destroy(service.id)"
                v-if="!service.deleted_at"
                class="text-red-600 inline-flex mt-2 cursor-pointer hover:text-red-900"
                >🗑️ Delete</span
              >
              <span
                v-else
                @click="restore(service.id)"
                class="text-yellow-600 inline-flex mt-2 cursor-pointer hover:text-yellow-900"
                >♻️ Restore</span
              >
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
    <create
      :showing="showCreate"
      :employee="employee"
      :modal.sync="showCreate"
    ></create>
    <edit :showing="showEdit" :service="service" :modal.sync="showEdit"></edit>
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
import Create from "@/Pages/ServiceRecord/Create";
import Edit from "@/Pages/ServiceRecord/Edit";
import jobs from "../../Shared/Modals/jobs.json";
import VueHtml2pdf from "vue-html2pdf";

export default {
  metaInfo: { title: "Service Record" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    Create,
    Edit,
    VueHtml2pdf,
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
      options: jobs,
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
