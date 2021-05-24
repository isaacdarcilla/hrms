<template>
  <div>
    <div class="flex justify-between">
      <h1 class="mb-8 font-bold text-3xl">New Leave Form No. 6 📂</h1>
      <button
        v-if="enable_print"
        @click="printPdf()"
        class="btn-indigo h-10 rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
      >
        <span>🖨️ Print Form</span>
      </button>
    </div>
    <div class="pt-3 mx-auto">
      <label class="form-label font-bold"
        >Select VP Name first <span class="text-red-600">*</span></label
      >
      <select
        v-model="vp_name"
        class="form-input w-full mx-auto appearance-none"
      >
        <option disabled selected>Please select VP name</option>
        <option value="1">Ma. Theresa E. Sarmiento, MBA</option>
        <option value="2">Juan Dela Cruz, MBA</option>
      </select>
    </div>
    <vue-html2pdf
      :show-layout="true"
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
          <div class="my-auto">
            <div class="text-sm italic mt-1">Civil Service Form No. 6</div>
            <div class="text-sm italic my-1">Revised 2020</div>
          </div>
        </div>
        <div class="flex justify-between mt-6">
          <div class="w-4/12 my-auto text-center">
            <img class="mx-auto rounded-full" src="/img/logo.jpg" width="60" />
          </div>
          <div class="w-4/12 my-auto text-center">
            <div class="text-sm italic mt-1">Republic of the Philippines</div>
            <div class="text-sm font-bold uppercase my-1">
              Catanduanes State University
            </div>
            <div class="text-sm italic mb-1">Virac, Catanduanes</div>
          </div>
          <div class="w-4/12 my-auto text-center">
            <div class="mx-20 py-2 border text-xxs border-dotted border-black">
              Stamp of Date of Receipt
            </div>
          </div>
        </div>
        <div class="py-5">
          <div class="text-center font-semibold text-xl uppercase">
            Application For Leave
          </div>
        </div>
        <div>
          <div class="flex">
            <div class="w-4/12 pl-2 py-1 border-t border-l border-black">
              <div class="flex-row">
                <p class="uppercase">1. Office/Department:</p>
                <p class="font-semibold text-center mx-auto">
                  Human Resource Management
                </p>
              </div>
            </div>
            <div class="w-8/12 pl-2 py-1 border-t border-r border-black">
              <div class="flex-row">
                <div class="flex justify-between">
                  <p>2. NAME:</p>
                  <p>(Last)</p>
                  <p>(First)</p>
                  <p class="mx-4">(Middle)</p>
                </div>
                <p class="font-semibold mx-8">Dela Cruz, Juan D.</p>
              </div>
            </div>
          </div>
          <div class="flex">
            <div class="w-4/12 pl-2 py-1 border-t border-l border-black">
              <div class="flex my-2">
                <p class="uppercase">3. Date of Filing:</p>
                <div
                  class="mx-auto border-b border-black font-semibold text-sm"
                >
                  September 17, 2021
                </div>
              </div>
            </div>
            <div class="w-4/12 pl-2 py-1 border-t border-black">
              <div class="flex my-2">
                <p class="uppercase">4. Position:</p>
                <div
                  class="mx-auto border-b border-black font-semibold text-sm"
                >
                  Administrative Assitant I
                </div>
              </div>
            </div>
            <div class="w-4/12 pl-2 py-1 border-t border-r border-black">
              <div class="flex my-2">
                <p class="uppercase">5. Salary:</p>
                <div
                  class="mx-auto border-b border-black font-semibold text-sm"
                >
                  P 1,000,000.00
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full pl-2 py-px border-t border-l border-r border-black"
            ></div>
          </div>
          <div class="flex">
            <div
              class="w-full pl-2 py-1 border-t border-l border-r border-black text-center uppercase font-semibold"
            >
              6. Details of Application
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full pl-2 py-px border-t border-l border-r border-black"
            ></div>
          </div>
          <div class="flex">
            <div class="w-7/12 pl-2 py-px border-t border-l border-black">
              <div class="uppercase mb-4">
                6.A. Type of Leave to be Availed Of
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="flex">
                <div
                  class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                ></div>
                <div>
                  <span class="text-sm">Vacation Leave</span>
                  <span class="text-xs"
                    >(Sec. 51, Rule XVI, Omnibus Rules Implementing E.O. No.
                    292)</span
                  >
                </div>
              </div>
              <div class="mx-2 my-3">Others</div>
              <div class="w-8/12 mx-2 border-b border-black text-center">Other Sample Leaves</div>
            </div>
            <div
              class="w-5/12 pl-2 py-px border-t border-l border-r border-black"
            ></div>
          </div>
        </div>
      </section>
    </vue-html2pdf>
  </div>
</template>

<script>
import Layout from "@/Pages/EmployeePanel/Layout";
import VueHtml2pdf from "vue-html2pdf";
import moment from "moment";

export default {
  metaInfo: { title: "Leave Form" },
  layout: Layout,
  components: {
    VueHtml2pdf,
  },
  props: {
    leave: Object,
    totals: Object,
    certification: Object,
    oic: Object,
    hr: Object,
    employee: Object,
  },
  data() {
    return {
      filename: `${this.leave.first_name} ${this.leave.last_name} - ${this.leave.leave_number} - Leave Form`,
      vp_name: null,
      set_vp_name: null,
      set_vp_position: null,
      enable_print: false,
    };
  },
  watch: {
    vp_name(e) {
      if (e === "1") {
        this.set_vp_name = "Ma. Theresa E. Sarmiento, MBA";
        this.set_vp_position = "VP-Administrative and Financial Affairs";
        this.enable_print = true;
      }

      if (e === "2") {
        this.set_vp_name = "Juan Dela Cruz, PHD";
        this.set_vp_position = "VP-Administrative and Support Affairs";
        this.enable_print = true;
      }
    },
  },
  methods: {
    total() {
      return this.totals.vacation + this.totals.sick;
    },
    dates() {
      let dates = [];
      if (
        moment(
          this.leave.start_of_inclusive_date[0].date,
          moment.ISO_8601,
          true
        ).isValid()
      ) {
        this.leave.start_of_inclusive_date.forEach((date) => {
          var data = moment(String(date.date)).format("MMMM D YYYY");
          dates.push(data);
        });
        return dates.join(", ");
      } else {
        this.leave.start_of_inclusive_date.forEach((date) => {
          dates.push(date.date);
        });
        return dates.join();
      }
    },
    formatDate(value) {
      if (value && moment(value, moment.ISO_8601, true).isValid()) {
        return moment(String(value)).format("MMMM D, YYYY");
      } else {
        return value;
      }
    },
    printPdf() {
      console.log(true);
      this.$refs.html2Pdf.generatePdf();
    },
    format(value) {
      if (value) {
        return moment(String(value)).format("MMMM D, YYYY");
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
  },
};
</script>