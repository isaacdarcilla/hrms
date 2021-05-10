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
    <div class="mb-6">
      Legend:
      <span
        class="ml-2 box-content h-1 w-2 p-1 bg-blue-300 text-sm text-gray-700"
        >10 years current pay date</span
      ><span
        class="ml-2 box-content h-1 w-2 p-1 bg-orange-300 text-sm text-gray-700"
        >10 years incoming pay date</span
      >
      <span
        class="ml-2 box-content h-1 w-2 p-1 bg-yellow-300 text-sm text-gray-700"
        >5 years previous pay date</span
      >
      <span
        class="ml-2 box-content h-1 w-2 p-1 bg-green-300 text-sm text-gray-700"
        >5 years current pay date</span
      >
      <span
        class="ml-2 box-content h-1 w-2 p-1 bg-purple-400 text-sm text-gray-700"
        >Age 60 to 65</span
      >
      <span
        class="ml-2 box-content h-1 w-2 p-1 bg-red-400 text-sm text-gray-700"
        >Age 65 and above</span
      >
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
              Age
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
              10 Years Loyalty Pay Date
            </th>
            <th
              scope="col"
              class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
            >
              5 Years Loyalty Next Pay Date
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
              v-if="age(psipop.birth_date).toString() >= 60 && age(psipop.birth_date).toString() <= 64"
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1 bg-purple-400"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="font-semibold"
                  v-if="psipop.birth_date !== null"
                >
                  {{ age(psipop.birth_date) }} y.o.
                </div>
                <div v-else class="text-sm text-gray-500">
                  No data available
                </div>
              </inertia-link>
            </td>
            <td
              v-else-if="age(psipop.birth_date).toString() >= 65"
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1 bg-red-400"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="font-semibold"
                  v-if="psipop.birth_date !== null"
                >
                  {{ age(psipop.birth_date) }} y.o.
                </div>
                <div v-else class="text-sm text-gray-500">
                  No data available
                </div>
              </inertia-link>
            </td>
            <td
              v-else
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div
                  class="font-semibold"
                  v-if="psipop.birth_date !== null"
                >
                  {{ age(psipop.birth_date) }} y.o.
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
              v-if="
                nextPay(psipop.appoint_date).toString().slice(-4) >
                year().toString()
              "
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1 bg-orange-300"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div class="capitalize font-semibold">
                  {{ nextPay(psipop.appoint_date) }}
                </div>
              </inertia-link>
            </td>
            <td
              v-else-if="
                nextPay(psipop.appoint_date).toString().slice(-4) ===
                year().toString()
              "
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1 bg-blue-300"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div class="capitalize font-semibold">
                  {{ nextPay(psipop.appoint_date) }}
                </div>
              </inertia-link>
            </td>
            <td
              v-else
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div class="capitalize font-semibold">
                  {{ nextPay(psipop.appoint_date) }}
                </div>
              </inertia-link>
            </td>
            <td
              v-if="
                nextFive(nextPay(psipop.appoint_date)).toString().slice(-4) ===
                year().toString()
              "
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1 bg-green-300"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div class="capitalize font-semibold">
                  {{ nextFive(nextPay(psipop.appoint_date)) }}
                </div>
              </inertia-link>
            </td>
            <td
              v-else-if="
                nextFive(nextPay(psipop.appoint_date)).toString().slice(-4) <=
                  year().toString() &&
                nextFive(nextPay(psipop.appoint_date)) != 0
              "
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1 bg-yellow-300"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div class="capitalize font-semibold">
                  {{ nextFive(nextPay(psipop.appoint_date)) }}
                </div>
              </inertia-link>
            </td>
            <td
              v-else
              class="px-6 py-4 whitespace-nowrap transition duration-500 ease-in-out transform hover:-translate-y-1"
            >
              <inertia-link
                class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"
                :href="route('psipop.index')"
                tabindex="-1"
              >
                <div class="capitalize font-semibold">
                  {{ nextFive(nextPay(psipop.appoint_date)) }}
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
                @click="destroy(psipop.id, psipop.item_number)"
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
    age(birthday) {
      return moment().diff(moment(String(birthday), "YYYY-MM-DD"), "years");
    },
    year() {
      return moment().year();
    },
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
        let ten = this.format(moment(String(appointed)).add(10, "years"));
        return ten;
      } else {
        return 0;
      }
    },
    nextFive(ten) {
      let last_pay_diff = moment().diff(moment(String(ten)), "years");
      if (ten !== 0 && last_pay_diff >= 10) {
        let next = this.format(moment(String(ten)).add(last_pay_diff, "years"));
        return next;
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
    destroy(id, name) {
      swal({
        title: "Delete",
        text: `Are you sure you want to delete ${name}?`,
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
        if (willDelete) {
          this.$inertia.delete(this.route("psipop.destroy", id));
        }
      });
    },
  },
};
</script>
