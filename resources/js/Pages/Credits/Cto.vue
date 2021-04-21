<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      CTO & SPL Leave Card of {{ employee.first_name }} {{ employee.last_name }} 🗂️
    </h1>
    <div class="mb-6 flex items-center justify-between">
      <button @click="showManual = true" class="btn-indigo rounded-lg">
        <span>➕ Manual</span>
        <span class="hidden md:inline">Crediting</span>
      </button>
      <inertia-link :href="route('credits', employee.id)">
        <button class="text-right btn-indigo rounded-lg">
          <span>Switch</span>
          <span class="hidden md:inline">To Vacation & Sick</span>
        </button>
      </inertia-link>
      <!-- <button @click="printPdf()" class="btn-indigo mx-3 rounded-lg">
        <span>🖨️ Generate</span>
        <span class="hidden md:inline">Credits</span>
      </button> -->
    </div>

    <vue-html2pdf
      :show-layout="false"
      :float-layout="true"
      :enable-download="false"
      :preview-modal="true"
      :paginate-elements-by-height="1400"
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
        <div class="mx-4 mt-4">
          <div class="text-right text-sm">&nbsp;</div>
          <div class="text-right text-sm">&nbsp;</div>
        </div>
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
        <div class="mt-4">
          <div
            class="bg-white font-sans mx-auto text-black"
            style="width: 812px; height: 1113px"
          >
            <div class="w-full">
              <div class="h-4 border-b-2 border-blue-600">
                <div
                  class="uppercase font-bold text-center justify-center my-2"
                ></div>
              </div>
            </div>
            <div class="mx-12">
              <div class="mx-4 mt-6">
                <div class="text-right text-sm">{{ date() }}</div>
              </div>
              <div class="mx-4 mt-2">
                <div class="text-left text-sm">
                  {{ employee.sex === "Male" ? "Mr." : "Ms." }}
                  {{ employee.first_name }} {{ employee.middle_name }}
                  {{ employee.last_name }}
                </div>
                <div class="text-left text-sm capitalize">
                  {{ employee.position }}
                </div>
                <div class="text-left text-sm capitalize">
                  {{ employee.department }}
                </div>
                <div class="text-left text-sm">This University</div>
              </div>
              <div class="mx-4 mt-4">
                <div class="text-left text-sm">
                  Dear {{ employee.sex === "Male" ? "Mr." : "Ms." }}
                  <span class="uppercase">{{ employee.last_name }}</span
                  >:
                </div>
              </div>
              <div class="mx-4 mt-4">
                <div class="text-justify text-sm leading-loose">
                  <span class="pl-12">Please</span> be informed that per records
                  in the Human Resource Management Services your balance of
                  leave credits as of December 31, {{ year() }} are as follows:
                </div>
              </div>
              <div class="mx-4 mt-4">
                <div class="flex">
                  <div class="w-4/12">
                    <div class="text-sm text-right underline">
                      Vacation Leave
                    </div>
                  </div>
                  <div class="w-4/12">
                    <div class="text-sm text-center underline">Sick Leave</div>
                  </div>
                  <div class="w-4/12">
                    <div class="text-sm text-left underline">TOTAL</div>
                  </div>
                </div>
              </div>
              <div class="mx-4 mt-4">
                <div class="flex">
                  <div class="w-4/12">
                    <div class="text-sm text-right underline">
                      {{ round(totals.vacation) }}
                    </div>
                  </div>
                  <div class="w-4/12">
                    <div class="text-sm text-center underline">
                      {{ round(totals.sick) }}
                    </div>
                  </div>
                  <div class="w-4/12">
                    <div class="text-sm text-left underline">{{ total() }}</div>
                  </div>
                </div>
              </div>
              <div class="mx-4 mt-8">
                <div class="text-right text-sm mr-24">Very truly yours,</div>
              </div>
              <div class="mx-4 mt-10">
                <div class="text-right text-sm">
                  <div class="uppercase">{{ hr.leave_hr_approving_name }}</div>
                  <div class="normal-case">
                    {{ hr.leave_hr_approving_position }},
                    {{ hr.leave_hr_approving_office }}
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full mt-10">
              <div class="h-4 border-b-2 border-blue-600">
                <div
                  class="uppercase font-bold text-center justify-center my-2"
                ></div>
              </div>
            </div>
            <div class="flex">
              <div class="w-4/12">
                <div class="text-xs italic text-left">CSU-F-HRM-16l</div>
              </div>
              <div class="w-4/12">
                <div class="text-xs text-center italic">Rev.0</div>
              </div>
              <div class="w-4/12">
                <div class="text-xs text-right italic">
                  Effectivity Date: June 1, 2015
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </vue-html2pdf>

    <div class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
      <div class="p-5 bg-white rounded-lg shadow mr-3 mb-6">
        <div class="flex justify-between">
          <div>
            <div class="font-semibold text-gray-600">Total CTO Leave</div>
            <div class="flex items-center pt-1">
              <div class="text-2xl font-bold text-gray-700">
                +{{ round(totals.cto)
                }}<span class="text-sm font-normal"> available balance</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="p-5 bg-white rounded-lg shadow ml-3 mr-3 mb-6">
        <div class="flex justify-between">
          <div>
            <div class="font-semibold text-gray-600">Total SPL Leave</div>
            <div class="flex items-center pt-1">
              <div class="text-2xl font-bold text-gray-700">
                +{{ round(totals.spl)
                }}<span class="text-sm font-normal"> available balance</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="p-5 bg-white rounded-lg shadow ml-3 mb-6">
        <div class="flex justify-between">
          <div>
            <div class="font-semibold text-gray-600">Overall Balance</div>
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
            <!-- <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              Leave Status
            </th> -->
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
              CTO Leave
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              SPL Leave
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
            <!-- <td
              class="px-6 py-1 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                :href="route('credits', employee.id)"
                class="px-6 py-1 whitespace-nowrap text-sm text-gray-900"
              >
                <div v-if="credit.leave">
                  <div
                    v-if="credit.leave.recommendation === null"
                    class="normal-case font-semibold text-yellow-600"
                  >
                    <span
                      class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-yellow-600 bg-yellow-300 rounded-full"
                      >Pending</span
                    >
                  </div>
                  <div
                    v-else-if="credit.leave.recommendation === 'Approved'"
                    class="normal-case font-semibold text-green-600"
                  >
                    <span
                      class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-green-600 bg-green-300 rounded-full"
                      >Approved</span
                    >
                  </div>
                  <div v-else class="normal-case font-semibold text-red-600">
                    <span
                      class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-600 bg-red-300 rounded-full"
                      >Disapproved</span
                    >
                  </div>
                </div>
                <div v-else>
                  <span
                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-yellow-600 bg-yellow-300 rounded-full"
                    >Pending</span
                  >
                </div>
              </inertia-link>
            </td> -->
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
                  v-if="credit.cto_leave !== null"
                  class="capitalize font-medium text-green-800"
                >
                  {{ credit.cto_leave }}
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
                  v-if="credit.spl_leave !== null"
                  class="capitalize font-medium text-red-800"
                >
                  {{ credit.spl_leave }}
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
            <td
              class="px-6 py-1 whitespace-nowrap text-sm font-medium transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <span
                v-if="
                  credit.cto_leave === null || credit.spl_leave === null
                "
                @click="check(credit.cto_leave, credit.spl_leave, credit)"
                class="text-indigo-600 cursor-pointer hover:text-indigo-900"
                >✏️ Edit</span
              >
              <span
                v-else
                @click="destroy(credit.id)"
                class="text-red-600 cursor-pointer hover:text-red-900"
                >🗑️ Delete</span
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
    <div class="mt-3 text-xs font-semibold text-red-600 italic">
      ** These records are for the current year.
    </div>
    <manual
      :showing="showManual"
      :employee="employee"
      :modal.sync="showManual"
    ></manual>
    <sick :showing="showSick" :credit="credit" :modal.sync="showSick"></sick>
    <vacation
      :showing="showVacation"
      :credit="credit"
      :modal.sync="showVacation"
    ></vacation>
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
import Sick from "@/Pages/Credits/Sick";
import Vacation from "@/Pages/Credits/Vacation";
import Manual from "@/Pages/Credits/CtoManual";
import VueHtml2pdf from "vue-html2pdf";

export default {
  metaInfo: { title: "Leave Credits" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    Sick,
    Vacation,
    Manual,
    VueHtml2pdf,
  },
  props: {
    credits: Object,
    employee: Object,
    filters: Object,
    totals: Object,
    hr: Object,
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
  provide() {
    return {
      totals: this.totals,
    };
  },
  watch: {
    form: {
      handler: throttle(function () {
        let query = pickBy(this.form);
        this.$inertia.replace(
          this.route(
            "cto.credits",
            this.employee.id,
            Object.keys(query).length ? query : { remember: "forget" }
          )
        );
      }, 150),
      deep: true,
    },
  },
  methods: {
    printPdf() {
      console.log(true);
      this.$refs.html2Pdf.generatePdf();
    },
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
      return this.round(this.totals.cto + this.totals.spl);
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
      }
    },
    formatDate(value) {
      if (value) {
        return moment(String(value)).format("MMMM");
      }
    },
    date() {
      return moment().format("MMMM D, YYYY");
    },
    year() {
      return moment().format("YYYY");
    },
    reset() {
      this.form = mapValues(this.form, () => null);
    },
    destroy(id) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete leave credit?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("credits.destroy", id));
        }
      });
    },
  },
};
</script>
