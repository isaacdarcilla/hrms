<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Personal Data Sheet 📜</h1>
    <p @click="print">Print</p>
    <div id="pds">
      <div
        class="border-2 border-black font-sans mx-auto"
        style="width: 816px; height: 1344px"
      >
        <div class="pl-1 pt-1 text-xxs text-black font-semibold italic">
          CS Form No. 212
        </div>
        <div class="pl-1 text-xxs text-black font-semibold italic">
          Revised 2017
        </div>
        <div
          class="text-2xl font-extrabold leading-none text-black text-center uppercase"
        >
          Personal Data Sheet
        </div>
        <div class="pl-1 text-xxs text-black font-semibold mt-4 italic">
          WARNING: Any misrepresentation made in the Personal Data Sheet and the
          Work Experience Sheet shall cause the filing of
          administrative/criminal case/s against the person concerned.
        </div>
        <div class="pl-1 pt-1 text-xxs text-black font-semibold mt-0 italic">
          READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS)
          BEFORE ACCOMPLISHING THE PDS FORM.
        </div>
        <div
          class="pl-1 text-xxs text-black font-normal mt-1 flex justify-between"
        >
          <div>
            Print legibly. Tick appropriate boxes ( ) and use separate sheet if
            necessary. Indicate N/A if not applicable.
            <span class="font-bold">DO NOT ABBREVIATE</span>.
          </div>
          <div class="flex">
            <div
              class="border-2 text-xxs border-b-0 border-r-0 bg-gray-600 border-black"
            >
              1. CS ID No.
            </div>
            <div
              class="border-2 text-xxs border-b-0 border-r-0 border-black pl-12"
            >
              (Do not fill up. For CSC use only)
            </div>
          </div>
        </div>

        <personal />

        <family />

        <div class="border-black border-b-2 bg-gray-500">
          <div class="p-1 italic font-semibold text-xs text-white">
            III. EDUCATIONAL BACKGROUND
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div class="flex h-16">
              <div class="my-auto text-xxs font-normal text-black pr-2 pl-1">
                26.
              </div>
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                LEVEL
              </div>
            </div>
          </div>
          <div class="w-2/12 border-b-2 border-l-2 border-black bg-gray-300">
            <div class="flex h-16">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                NAME OF SCHOOL
                <div class="text-center text-xxs font-normal text-black">
                  (Write in full)
                </div>
              </div>
            </div>
          </div>
          <div class="w-3/12 border-b-2 border-l-2 border-black bg-gray-300">
            <div class="flex h-16">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                BASIC EDUCATION/DEGREE/COURSE
                <div class="text-center text-xxs font-normal text-black">
                  (Write in full)
                </div>
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black bg-gray-300">
            <div class="flex h-12 border-b-2 border-black">
              <div class="my-auto text-center text-xxs font-normal text-black">
                PERIOD OF ATTENDANCE
              </div>
            </div>
            <div class="flex justify-between h-4">
              <div
                class="my-auto pl-1 text-center text-xxs font-normal text-black"
              >
                From
              </div>
              <div class="border-l-2 border-black"></div>
              <div
                class="my-auto text-center text-xxs font-normal text-black pr-3"
              >
                To
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black bg-gray-300">
            <div class="flex h-16">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                HIGHEST LEVEL/ UNITS EARNED
                <div class="text-center text-xxs font-normal text-black">
                  (if not graduated)
                </div>
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black bg-gray-300">
            <div class="flex h-16">
              <div class="my-auto text-center text-xxs font-normal text-black">
                YEAR GRADUATED
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black bg-gray-300">
            <div class="flex h-16">
              <div class="my-auto text-center text-xxs font-normal text-black">
                SCHOLARSHIP/ ACADEMIC HONORS RECEIVED
              </div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div class="flex h-8">
              <div class="my-auto pl-6 text-xxs font-normal text-black">
                ELEMENTARY
              </div>
            </div>
          </div>
          <div class="w-2/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                22222
              </div>
            </div>
          </div>
          <div class="w-3/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                33333333
              </div>
            </div>
          </div>
          <div
            class="border-b-2 border-l-2 border-black"
            style="width: 4.166666%"
          >
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                11/11/2222
              </div>
            </div>
          </div>
          <div
            class="border-b-2 border-l-2 border-black"
            style="width: 4.166666%"
          >
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                11/11/1111
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                555555
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                6666666
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                7777777
              </div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div class="flex h-8">
              <div class="my-auto pl-6 text-xxs font-normal text-black">
                SECONDARY
              </div>
            </div>
          </div>
          <div class="w-2/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                22222
              </div>
            </div>
          </div>
          <div class="w-3/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                33333333
              </div>
            </div>
          </div>
          <div
            class="border-b-2 border-l-2 border-black"
            style="width: 4.166666%"
          >
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                11/11/2222
              </div>
            </div>
          </div>
          <div
            class="border-b-2 border-l-2 border-black"
            style="width: 4.166666%"
          >
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                11/11/1111
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                555555
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                6666666
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                7777777
              </div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div class="flex h-8">
              <div class="my-auto pl-6 text-xxs font-normal text-black">
                VOCATIONAL / TRADE SCHOOL
              </div>
            </div>
          </div>
          <div class="w-2/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                22222
              </div>
            </div>
          </div>
          <div class="w-3/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                33333333
              </div>
            </div>
          </div>
          <div
            class="border-b-2 border-l-2 border-black"
            style="width: 4.166666%"
          >
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                11/11/2222
              </div>
            </div>
          </div>
          <div
            class="border-b-2 border-l-2 border-black"
            style="width: 4.166666%"
          >
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                11/11/1111
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                555555
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                6666666
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                7777777
              </div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div class="flex h-8">
              <div class="my-auto pl-6 text-xxs font-normal text-black">
                COLLEGE
              </div>
            </div>
          </div>
          <div class="w-2/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                22222
              </div>
            </div>
          </div>
          <div class="w-3/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                33333333
              </div>
            </div>
          </div>
          <div
            class="border-b-2 border-l-2 border-black"
            style="width: 4.166666%"
          >
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                11/11/2222
              </div>
            </div>
          </div>
          <div
            class="border-b-2 border-l-2 border-black"
            style="width: 4.166666%"
          >
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                11/11/1111
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                555555
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                6666666
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                7777777
              </div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div class="flex h-8">
              <div class="my-auto pl-6 text-xxs font-normal text-black">
                GRADUATE STUDIES
              </div>
            </div>
          </div>
          <div class="w-2/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                22222
              </div>
            </div>
          </div>
          <div class="w-3/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                33333333
              </div>
            </div>
          </div>
          <div
            class="border-b-2 border-l-2 border-black"
            style="width: 4.166666%"
          >
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                11/11/2222
              </div>
            </div>
          </div>
          <div
            class="border-b-2 border-l-2 border-black"
            style="width: 4.166666%"
          >
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                11/11/1111
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                555555
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                6666666
              </div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-center text-xxs font-normal text-black"
              >
                7777777
              </div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-full border-b-2 border-black bg-gray-300">
            <div class="flex h-4">
              <div
                class="my-auto mx-auto text-xxs font-semibold italic text-red-500"
              >
                (Continue on separate sheet if necessary)
              </div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xs font-bold italic text-black">
                SIGNATURE
              </div>
            </div>
          </div>
          <div class="w-5/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-xxs font-normal text-black"
              ></div>
            </div>
          </div>
          <div class="w-1/12 border-b-2 border-l-2 border-black bg-gray-300">
            <div class="flex h-8">
              <div class="my-auto mx-auto text-xs font-bold italic text-black">
                DATE
              </div>
            </div>
          </div>
          <div class="w-3/12 border-b-2 border-l-2 border-black">
            <div class="flex h-8">
              <div
                class="my-auto mx-auto text-xxs font-normal text-black"
              ></div>
            </div>
          </div>
        </div>

        <div class="w-full text-right border-b-0 border-black">
          <div class="text-right h-2">
            <p
              class="my-auto text-right text-xxs font-normal italic text-black"
            >
              CS FORM 212 (Revised 2017), Page 1 of 4
            </p>
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
import Personal from "@/Pages/Sheet/Components/Personal";
import Family from "@/Pages/Sheet/Components/Family";

const options = {
  name: "_blank",
  specs: ["fullscreen=yes", "titlebar=no", "scrollbars=yes"],
  styles: ["../css/app.css"],
};

Vue.use(VueHtmlToPaper, options);

export default {
  metaInfo: { title: "Personal Data Sheet" },
  layout: Layout,
  components: {
    Personal,
    Family,
  },
  methods: {
    print() {
      this.$htmlToPaper("pds");
    },
  },
};
</script>
