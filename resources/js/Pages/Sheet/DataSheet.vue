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
