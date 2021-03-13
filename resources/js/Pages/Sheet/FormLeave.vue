<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Leave Form 📜</h1>
    <p @click="print">Print</p>
    <div id="leave">
      <div
        class="border-none border-black mt-2 bg-white font-sans mx-auto text-black"
        style="width: 816px; height: 1248px"
      >
        <div class="mx-4 mt-4">
          <div class="text-right text-xxs">CSC Form No. 6</div>
          <div class="text-right text-xxs">Revised, 1984</div>
        </div>
        <div class="flex">
          <img class="mx-3 rounded-full" src="/img/logo.jpg" width="60px" />
          <div class="my-auto">
            <div class="text-xs italic mt-1">Republic of the Philippines</div>
            <div class="text-xs font-bold uppercase my-1">
              Catanduanes State University
            </div>
            <div class="text-xs italic mb-1">Virac, Catanduanes</div>
          </div>
        </div>
        <div class="mt-4">
          <div
            class="border border-black bg-white font-sans mx-auto text-black"
            style="width: 816px; height: 1162px"
          >
            <div class="w-full">
              <div class="h-8 border-b-one border-black">
                <div
                  class="uppercase font-bold text-center justify-center my-2"
                >
                  Application For Leave
                </div>
              </div>
            </div>
            <div class="flex">
              <div class="w-5/12">
                <div class="h-8 border-b-one border-r-one border-black">
                  <div class="uppercase text-xs ml-2">1. Agency/Office</div>
                  <div class="capitalize text-sm font-semibold text-center">
                    {{ leave.agency }}
                  </div>
                </div>
              </div>
              <div class="w-3/12">
                <div class="h-8 border-b-one border-r-one border-black">
                  <div class="uppercase text-xs ml-2">2. Last Name</div>
                  <div class="uppercase text-sm font-semibold text-center">
                    {{ leave.last_name }}
                  </div>
                </div>
              </div>
              <div class="w-3/12">
                <div class="h-8 border-b-one border-r-one border-black">
                  <div class="uppercase text-xs mx-auto text-center">
                    First Name
                  </div>
                  <div class="uppercase text-sm font-semibold text-center">
                    {{ leave.first_name }}
                  </div>
                </div>
              </div>
              <div class="w-1/12">
                <div class="h-8 border-b-one border-black">
                  <div class="uppercase text-xs mx-auto text-center">M.I.</div>
                  <div class="uppercase text-sm font-semibold text-center">
                    {{ leave.middle_initial }}
                  </div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div class="w-3/12">
                <div class="h-8 border-b-one border-r-one border-black">
                  <div class="uppercase text-xs ml-2">3. Date of Filing</div>
                  <div class="capitalize text-sm font-semibold text-center">
                    {{ format(leave.date_of_filing) }}
                  </div>
                </div>
              </div>
              <div class="w-5/12">
                <div class="h-8 border-b-one border-r-one border-black">
                  <div class="uppercase text-xs ml-2">4. Position</div>
                  <div class="uppercase text-sm font-semibold text-center">
                    {{ leave.position }}
                  </div>
                </div>
              </div>
              <div class="w-4/12">
                <div class="h-8 border-b-one border-black">
                  <div class="text-xs mx-auto text-center">
                    5. SALARY (Monthly)
                  </div>
                  <div class="uppercase text-sm font-semibold text-center">
                    {{ currency(leave.monthly_salary) }}
                  </div>
                </div>
              </div>
            </div>
            <div class="w-full">
              <div class="h-8 border-b-one border-black">
                <div
                  class="uppercase font-bold text-center justify-center my-2"
                >
                  Details of Application
                </div>
              </div>
            </div>
            <div class="flex">
              <div class="w-6/12">
                <div class="h-48 border-b-one border-r-one border-black">
                  <div class="text-xs ml-2">6.a. TYPE OF LEAVE</div>
                  <div class="flex mt-2">
                    <div class="text-xs ml-6">🗸</div>
                    <div
                      class="text-xs h-2 border my-auto ml-4 border-black p-1"
                    ></div>
                    <div class="text-xs ml-4">VACATION</div>
                  </div>
                  <div class="my-1 text-xs ml-20">To seek employment</div>
                  <div class="flex mt-2">
                    <div class="w-1/2 flex">
                      <div class="text-xs ml-6">🗸</div>
                      <div
                        class="text-xs h-2 w-2 border my-auto ml-4 border-black p-1"
                      ></div>
                      <div class="text-xs ml-4">Others (Specify)</div>
                    </div>
                    <div class="w-1/2">
                      <div
                        class="border-b-one border-black text-center text-xs mr-4"
                      >
                        CTO
                      </div>
                    </div>
                  </div>
                  <div
                    class="ml-12 mt-4 border-b-one border-black text-center text-xs mr-4"
                  ></div>
                  <div class="flex mt-2">
                    <div class="text-xs ml-6">🗸</div>
                    <div
                      class="text-xs h-2 border my-auto ml-4 border-black p-1"
                    ></div>
                    <div class="text-xs ml-4">SICK</div>
                  </div>
                  <div class="flex mt-2">
                    <div class="text-xs ml-6">🗸</div>
                    <div
                      class="text-xs h-2 border my-auto ml-4 border-black p-1"
                    ></div>
                    <div class="text-xs ml-4">MATERNITY</div>
                  </div>
                  <div class="flex mt-2">
                    <div class="w-1/2 flex">
                      <div class="text-xs ml-6">🗸</div>
                      <div
                        class="text-xs h-2 w-2 border my-auto ml-4 border-black p-1"
                      ></div>
                      <div class="text-xs ml-4">Others (Specify)</div>
                    </div>
                    <div class="w-1/2">
                      <div
                        class="border-b-one border-black text-center text-xs mr-4"
                      >
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div
                    class="ml-12 mt-4 mb-2 border-b-one border-black text-center text-xs mr-4"
                  ></div>
                </div>
              </div>
              <div class="w-6/12">
                <div class="h-48 border-b-one border-black">
                  <div class="text-xs ml-2">6.b. WHERE LEAVE WILL BE SPENT</div>
                  <div class="flex mt-2">
                    <div class="text-xs ml-12">
                      1) IN CASE OF VACATION LEAVE
                    </div>
                  </div>
                  <div class="flex mt-1">
                    <div class="text-xs ml-10">🗸</div>
                    <div
                      class="text-xs h-2 border my-auto ml-4 border-black p-1"
                    ></div>
                    <div class="text-xs ml-4">Within the Philippines</div>
                  </div>
                  <div class="flex mt-2">
                    <div class="w-1/2 flex">
                      <div class="text-xs ml-10">🗸</div>
                      <div
                        class="text-xs h-2 w-2 border my-auto ml-4 border-black p-1"
                      ></div>
                      <div class="text-xs ml-4">Abroad (Specify)</div>
                    </div>
                    <div class="w-1/2">
                      <div
                        class="border-b-one border-black text-center text-xs mr-4"
                      >
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div
                    class="ml-16 mt-4 mb-2 border-b-one border-black text-center text-xs mr-4"
                  ></div>
                  <div class="flex mt-2">
                    <div class="text-xs ml-12">2) IN CASE OF SICK LEAVE</div>
                  </div>
                  <div class="flex mt-2">
                    <div class="w-1/2 flex">
                      <div class="text-xs ml-10">🗸</div>
                      <div
                        class="text-xs h-2 w-2 border my-auto ml-4 border-black p-1"
                      ></div>
                      <div class="text-xs ml-4">In Hospital (Specify)</div>
                    </div>
                    <div class="w-1/2">
                      <div
                        class="border-b-one border-black text-center text-xs mr-4"
                      >
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div
                    class="ml-16 mt-4 mb-2 border-b-one border-black text-center text-xs mr-4"
                  ></div>
                  <div class="flex mt-2">
                    <div class="w-1/2 flex">
                      <div class="text-xs ml-10">🗸</div>
                      <div
                        class="text-xs h-2 w-2 border my-auto ml-4 border-black p-1"
                      ></div>
                      <div class="text-xs ml-4">Out Patient (Specify)</div>
                    </div>
                    <div class="w-1/2">
                      <div
                        class="border-b-one border-black text-center text-xs mr-4"
                      >
                        &nbsp;
                      </div>
                    </div>
                  </div>
                  <div
                    class="ml-16 mt-4 mb-2 border-b-one border-black text-center text-xs mr-4"
                  ></div>
                </div>
              </div>
            </div>
            <div class="flex">
              <div class="w-6/12">
                <div class="h-32 border-b-one border-r-one border-black">
                  <div class="text-xs text-center">
                    NUMBER OF WORKING DAYS APPLIED FOR:
                  </div>
                  <div
                    class="mt-2 mx-8 text-xs text-center border-b-one border-black"
                  >
                    1 day
                  </div>
                  <div class="text-xs ml-20 mt-3">
                    <div class="ml-2">INCLUSIVE DATES:</div>
                  </div>
                  <div
                    class="my-2 mx-8 text-xs text-center border-b-one border-black"
                  >
                    June 24, 2020
                  </div>
                </div>
              </div>
              <div class="w-6/12">
                <div class="h-32 border-b-one border-black">
                  <div class="text-xs ml-12">COMMUTATION:</div>
                  <div class="flex mt-2">
                    <div
                      class="text-xs h-2 border my-auto ml-16 border-black p-1"
                    ></div>
                    <div class="text-xs ml-4">Requested</div>
                  </div>
                  <div class="flex mt-2">
                    <div
                      class="text-xs h-2 border my-auto ml-16 border-black p-1"
                    ></div>
                    <div class="text-xs ml-4">Not Requested</div>
                  </div>
                  <div class="flex mt-12 mb-3">
                    <div class="w-2/5 flex">&nbsp;</div>
                    <div class="w-3/5">
                      <div
                        class="border-t-one border-black text-center text-xs mr-4"
                      >
                        (Signature of Applicant)
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "@/Shared/Layout";
import Vue from "vue";
import VueHtmlToPaper from "vue-html-to-paper";
import moment from "moment";

const options = {
  name: "_blank",
  specs: ["fullscreen=yes", "titlebar=no", "scrollbars=yes"],
  styles: ["/css/app.css"],
};

Vue.use(VueHtmlToPaper, options);

export default {
  metaInfo: { title: "Leave Form" },
  layout: Layout,
  components: {},
  props: {
    leave: Object,
  },
  methods: {
    print() {
      this.$htmlToPaper("leave");
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
