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

        <div class="border-black border-b-2 bg-gray-500">
          <div class="p-1 italic font-semibold text-xs text-white">
            II. FAMILY BACKGROUND
          </div>
        </div>
        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div class="flex h-6">
              <div class="my-auto text-xxs font-normal text-black pr-2 pl-1">
                22.
              </div>
              <div class="my-auto text-xxs font-normal text-black">
                SPOUSE'S SURNAME
              </div>
            </div>
            <div class="flex h-6 pl-6">
              <div class="my-auto text-xxs font-normal text-black">
                FIRST NAME
              </div>
            </div>
            <div class="flex h-6 pl-6">
              <div class="my-auto text-xxs font-normal text-black">
                MIDDLE NAME
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-0 border-t-0 border-l-0 border-r-0 w-4/12"
          >
            <div
              class="flex pl-3 h-6 border-2 border-t-0 border-r-0 border-black"
            >
              <div class="my-auto text-xxs font-normal text-black">JOHN</div>
            </div>
            <div
              class="flex justify-between pl-3 h-6 border-2 border-t-0 border-r-0 border-black"
            >
              <div class="my-auto text-xxs font-normal text-black pr-20">
                DOE
              </div>
              <div class="border-l-2 border-black bg-gray-400 pr-6">
                <div class="my-auto text-xxs font-normal text-black">
                  NAME EXTENSION (JR., SR)
                </div>
                <div class="text-xxs text-black">JR.</div>
              </div>
            </div>
            <div
              class="flex pl-3 py-2 border-2 border-t-0 border-r-0 border-black p-1"
            >
              <div class="my-auto text-xxs font-normal text-black">JOHN</div>
            </div>
          </div>
          <div class="w-3/12 border-b-2 border-black">
            <div
              class="flex h-6 border-b-2 border-l-2 border-black bg-gray-300"
            >
              <div class="my-auto text-xxs font-normal text-black pr-1 pl-1">
                23.
              </div>
              <div class="my-auto text-xxs font-normal text-black">
                NAME of CHILDREN (Write full name and list all)
              </div>
            </div>
            <div class="flex h-6 border-b-2 border-l-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pl-2">
                SFAFAF
              </div>
            </div>
            <div class="flex h-6 border-l-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pl-2">
                FSAAAG
              </div>
            </div>
          </div>
          <div class="w-2/12 border-b-2 border-black">
            <div
              class="flex h-6 border-b-2 border-l-2 border-black bg-gray-300"
            >
              <div class="my-auto text-xxs font-normal text-black pr-1 pl-1">
                DATE OF BIRTH (mm/dd/yyyy)
              </div>
            </div>
            <div class="flex h-6 border-b-2 border-l-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pl-2">
                SFAFAF
              </div>
            </div>
            <div class="flex h-6 border-l-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pl-2">
                FSAAAG
              </div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div
              class="flex h-6 pl-6 border-2 border-t-0 border-r-0 border-l-0 border-black"
            >
              <div class="my-auto text-xxs font-normal text-black">
                OCCUPATION
              </div>
            </div>
            <div
              class="flex h-6 pl-6 border-2 border-t-0 border-r-0 border-l-0 border-black"
            >
              <div class="my-auto text-xxs font-normal text-black">
                EMPLOYER/BUSINESS NAME
              </div>
            </div>
            <div
              class="flex h-6 pl-6 border-2 border-t-0 border-r-0 border-l-0 border-black"
            >
              <div class="my-auto text-xxs font-normal text-black">
                BUSINESS ADDRESS
              </div>
            </div>
            <div class="flex h-6 pl-6">
              <div class="my-auto text-xxs font-normal text-black">
                TELEPHONE NO.
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-0 border-t-0 border-l-0 border-r-0 w-4/12"
          >
            <div
              class="flex pl-3 h-6 border-2 border-t-0 border-r-0 border-black"
            >
              <div class="my-auto text-xxs font-normal text-black">JOHN</div>
            </div>
            <div
              class="flex justify-between pl-3 h-6 border-2 border-t-0 border-r-0 border-black"
            >
              <div class="my-auto text-xxs font-normal text-black pr-20">
                DOE
              </div>
            </div>
            <div
              class="flex justify-between pl-3 h-6 border-2 border-t-0 border-r-0 border-black"
            >
              <div class="my-auto text-xxs font-normal text-black pr-20">
                DOE
              </div>
            </div>
            <div
              class="flex pl-3 py-2 border-2 border-t-0 border-r-0 border-black p-1"
            >
              <div class="my-auto text-xxs font-normal text-black">JOHN</div>
            </div>
          </div>
          <div class="w-3/12 border-b-2 border-black">
            <div
              class="flex h-6 border-b-2 border-l-2 border-black"
            >
              <div class="my-auto text-xxs font-normal text-black pl-2">
                SFAF
              </div>
            </div>
            <div class="flex h-6 border-b-2 border-l-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pl-2">
                SFAFAF
              </div>
            </div>
            <div class="flex h-6 border-b-2 border-l-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pl-2">
                SFAFAF
              </div>
            </div>
            <div class="flex h-6 border-l-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pl-2">
                FSAAAG
              </div>
            </div>
          </div>
          <div class="w-2/12 border-b-2 border-black">
            <div
              class="flex h-6 border-b-2 border-l-2 border-black"
            >
              <div class="my-auto text-xxs font-normal text-black pl-2">
                11/1111/1/1
              </div>
            </div>
            <div class="flex h-6 border-b-2 border-l-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pl-2">
                SFAFAF
              </div>
            </div>
            <div class="flex h-6 border-b-2 border-l-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pl-2">
                SFAFAF
              </div>
            </div>
            <div class="flex h-6 border-l-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pl-2">
                FSAAAG
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
import Personal from "@/Pages/Sheet/Components/Personal";

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
  },
  methods: {
    print() {
      this.$htmlToPaper("pds");
    },
  },
};
</script>
