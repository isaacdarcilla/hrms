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
        <div
          class="border-2 p-0 border-black border-r-0 border-l-0 bg-gray-500"
        >
          <div class="p-1 italic font-semibold text-xs text-white">
            I. PERSONAL INFORMATION
          </div>
        </div>
        <div class="flex">
          <div
            class="w-3/12 pr-2 border-2 border-black border-l-0 border-r-0 border-t-0 bg-gray-300"
          >
            <div class="flex pt-2 pb-1">
              <div class="text-xxs font-normal text-black pr-3 p-1">2.</div>
              <div class="my-auto text-xxs font-normal text-black">SURNAME</div>
            </div>
            <div class="py-2">
              <div class="text-xxs font-normal text-black pl-6 mx-auto">
                FIRST NAME
              </div>
            </div>
            <div class="py-2">
              <div class="text-xxs font-normal text-black pl-6 mx-auto">
                MIDDLE NAME
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-0 border-t-0 border-l-0 border-r-0 w-9/12"
          >
            <div
              class="flex p-3 py-2 border-2 border-t-0 border-r-0 border-black"
            >
              <div class="my-auto text-xxs font-normal text-black">JOHN</div>
            </div>
            <div class="flex justify-between">
              <div
                class="my-auto text-xxs font-normal text-black p-3 py-2 border-2 border-t-0 border-b-0 border-r-0 border-black"
              >
                DOE
              </div>
              <div class="border-l-2 border-b-0 border-black bg-gray-400">
                <div class="my-auto text-xxs font-normal text-black pr-24">
                  NAME EXTENSION (JR., SR)
                </div>
              </div>
            </div>
            <div class="flex p-3 py-2 border-2 border-r-0 border-black">
              <div class="my-auto text-xxs font-normal text-black">COOPER</div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 bg-gray-300">
            <div class="flex h-10 pr-16 border-b-2 border-black">
              <div class="text-xxs font-normal text-black pr-3 pt-3 pl-1">
                3.
              </div>
              <div class="my-auto text-xxs font-normal text-black">
                DATE OF BIRTH
                <div class="my-auto text-xxs font-normal text-black">
                  (mm/dd/yyyy)
                </div>
              </div>
            </div>
            <div class="flex h-6 border-b-2 border-black">
              <div class="text-xxs font-normal text-black pr-3 p-1 my-auto">
                4.
              </div>
              <div class="my-auto text-xxs font-normal text-black">
                PLACE OF BIRTH
              </div>
            </div>
            <div class="flex h-6 border-b-2 border-black">
              <div class="text-xxs font-normal text-black pr-3 p-1 my-auto">
                5.
              </div>
              <div class="my-auto text-xxs font-normal text-black">SEX</div>
            </div>
          </div>
          <div class="w-2/12">
            <div class="flex h-10 border-b-2 border-l-2 border-black">
              <div class="my-auto pl-3 text-xxs font-normal text-black">
                Virac
              </div>
            </div>
            <div class="flex h-6 border-l-2 border-b-2 border-black">
              <div class="my-auto text-xxs font-normal pl-3 text-black">
                DOE
              </div>
            </div>
            <div
              class="flex h-6 justify-items-center p-1 pb-1 pl-3 border-l-2 border-b-2 border-black"
            >
              <i class="my-auto border-2 border-black p-1" />
              <div class="my-auto text-xxs font-normal text-black px-2 pr-6">
                Male
              </div>
              <i class="my-auto border-2 border-black p-1" />
              <div class="my-auto text-xxs font-normal text-black px-2">
                Female
              </div>
            </div>
          </div>
          <div class="w-3/12 bg-gray-300">
            <div class="flex h-10 border-b-0 border-l-2 border-black">
              <div class="text-xxs font-normal text-black pr-3 p-1 my-auto">
                16.
              </div>
              <div class="my-auto text-xxs font-normal text-black">
                CITIZENSHIP
              </div>
            </div>
            <div class="flex h-6 border-l-2 border-b-l border-black">
              <div class="my-auto mx-auto text-xxs font-normal text-black">
                If holder of dual citizenship,
              </div>
            </div>
            <div class="flex h-6 border-l-2 border-b-2 border-black">
              <div class="mx-auto text-xxs font-normal text-black">
                please indicate the details.
              </div>
            </div>
          </div>
          <div class="w-4/12">
            <div class="h-16 border-l-2 border-black pt-3 pl-6">
              <div class="flex">
                <i class="my-auto border-2 border-black p-1" />
                <div class="my-auto text-xxs font-normal text-black px-2 pr-4">
                  Filipino
                </div>
                <i class="my-auto border-2 border-black p-1" />
                <div class="my-auto text-xxs font-normal text-black px-2">
                  Dual Citizenship
                </div>
              </div>
              <div class="p-3 py-1 pl-16">
                <div class="flex">
                  <i class="my-auto border-2 border-black p-1" />
                  <div
                    class="my-auto text-xxs font-normal text-black px-2 pr-4"
                  >
                    by birth
                  </div>
                  <i class="my-auto border-2 border-black p-1" />
                  <div class="my-auto text-xxs font-normal text-black px-2">
                    by naturalization
                  </div>
                </div>
              </div>
              <div class="flex p-2 pt-1 pl-16">
                <div class="my-auto text-xxs font-normal text-black px-2 pr-6">
                  Pls. indicate country:
                </div>
              </div>
            </div>
            <div class="h-6 border-l-2 border-b-2 border-black">
              <div class="flex pt-1 pl-6">
                <div class="my-auto text-xxs font-normal text-black">
                  Canada
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 py-3 border-b-2 border-black bg-gray-300">
            <div class="flex h-10">
              <div class="text-xxs font-normal text-black pr-3 pl-1">6.</div>
              <div class="text-xxs font-normal text-black">CIVIL STATUS</div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-2/12"
          >
            <div class="flex pl-3 pt-2">
              <i class="my-auto border-2 border-black p-1" />
              <div class="my-auto text-xxs font-normal text-black px-1 pr-5">
                Single
              </div>
              <i class="my-auto border-2 border-black p-1" />
              <div class="my-auto text-xxs font-normal text-black px-1">
                Married
              </div>
            </div>
            <div class="flex pl-3 pt-2">
              <i class="my-auto border-2 border-black p-1" />
              <div class="my-auto text-xxs font-normal text-black px-1 pr-2">
                Widowed
              </div>
              <i class="my-auto border-2 border-black p-1" />
              <div class="my-auto text-xxs font-normal text-black px-1">
                Separated
              </div>
            </div>
            <div class="flex pl-3 pt-2">
              <i class="my-auto border-2 border-black p-1" />
              <div class="my-auto text-xxs font-normal text-black px-1 pr-2">
                Other/s:
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-0 border-t-0 border-l-2 border-r-0 w-2/12 bg-gray-300"
          >
            <div class="flex py-3">
              <div class="text-xxs font-normal text-black pr-3 pl-1">17.</div>
              <div class="my-auto text-xxs font-normal text-black">
                RESIDENTIAL ADDRESS
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-5/12"
          >
            <div
              class="flex justify-between text-xxs text-black font-normal mt-2 text-center"
            >
              <div class="items-center mx-auto my-auto">Lot #2</div>
              <div class="items-center mx-auto my-auto">Salvacion St.</div>
            </div>
            <div class="border-b-2 pt-1 border-gray-700 my-auto"></div>
            <div
              class="flex justify-between text-xxs text-black font-normal text-center"
            >
              <div class="items-center mx-auto italic">House/Block/Lot No.</div>
              <div class="items-center mx-auto italic">Street</div>
            </div>
            <div class="border-b-2 border-black my-auto"></div>
            <div
              class="flex justify-between text-xxs text-black font-normal mt-2 text-center"
            >
              <div class="items-center mx-auto">Lot #2</div>
              <div class="items-center mx-auto">Salvacion St.</div>
            </div>
            <div class="border-b-2 pt-1 border-gray-700 my-auto"></div>
            <div
              class="flex justify-between text-xxs text-black font-normal text-center"
            >
              <div class="items-center mx-auto italic">Subdivision/Village</div>
              <div class="items-center mx-auto italic">Barangay</div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div class="flex h-8 border-b-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pr-3 pl-1">
                7.
              </div>
              <div class="my-auto text-xxs font-normal text-black">
                HEIGHT (m)
              </div>
            </div>
            <div class="flex h-8">
              <div class="my-auto text-xxs font-normal text-black pr-3 p-1">
                8.
              </div>
              <div class="my-auto text-xxs font-normal text-black">
                WEIGHT (kg)
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-2/12"
          >
            <div class="flex h-8 border-b-2 border-black">
              <div
                class="my-auto text-xxs font-normal text-black pr-3 p-1 pl-3"
              >
                145 CM
              </div>
            </div>
            <div class="flex h-8">
              <div
                class="my-auto text-xxs font-normal text-black pr-3 p-1 pl-3"
              >
                50 KG
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-2/12 bg-gray-300"
          >
            <div class="flex h-6">
              <div class="mx-auto text-xs font-normal text-black">&nbsp;</div>
            </div>
            <div class="flex h-10 pt-3">
              <div class="mx-auto text-xxs font-normal pt-2 text-black">
                ZIP CODE
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-5/12"
          >
            <div
              class="flex justify-between text-xxs text-black font-normal mt-2 text-center"
            >
              <div class="items-center mx-auto">Lot #2</div>
              <div class="items-center mx-auto">Salvacion St.</div>
            </div>
            <div class="border-b-2 pt-1 border-gray-700 my-auto"></div>
            <div
              class="flex border-b-2 border-black justify-between text-xxs text-black font-normal text-center"
            >
              <div class="items-center mx-auto italic">City/Municipality</div>
              <div class="items-center mx-auto italic">Province</div>
            </div>
            <div
              class="flex justify-between text-xxs text-black font-normal text-center"
            >
              <div class="items-center mx-auto pt-3">4800</div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div class="flex h-8 border-b-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pr-3 pl-1">
                9.
              </div>
              <div class="my-auto text-xxs font-normal text-black">
                BLOOD TYPE
              </div>
            </div>
            <div class="flex h-8">
              <div class="my-auto text-xxs font-normal text-black pr-2 p-1">
                10.
              </div>
              <div class="my-auto text-xxs font-normal text-black">
                GSIS ID NO.
              </div>
            </div>
          </div>

          <div
            class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-2/12"
          >
            <div class="flex h-8 border-b-2 border-black">
              <div
                class="my-auto text-xxs font-normal text-black pr-3 p-1 pl-3"
              >
                A
              </div>
            </div>
            <div class="flex h-8">
              <div
                class="my-auto text-xxs font-normal text-black pr-3 p-1 pl-3"
              >
                12345678
              </div>
            </div>
          </div>

          <div
            class="border-2 border-black border-b-0 border-t-0 border-l-2 border-r-0 w-2/12 bg-gray-300"
          >
            <div class="flex py-3">
              <div class="text-xxs font-normal text-black pr-3 pl-1">18.</div>
              <div class="my-auto text-xxs font-normal text-black">
                PERMANENT ADDRESS
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-5/12"
          >
            <div
              class="flex justify-between text-xxs text-black font-normal mt-2 text-center"
            >
              <div class="items-center mx-auto my-auto">Lot #2</div>
              <div class="items-center mx-auto my-auto">Salvacion St.</div>
            </div>
            <div class="border-b-2 pt-1 border-gray-700 my-auto"></div>
            <div
              class="flex justify-between text-xxs text-black font-normal text-center"
            >
              <div class="items-center mx-auto italic">House/Block/Lot No.</div>
              <div class="items-center mx-auto italic">Street</div>
            </div>
            <div class="border-b-2 border-black my-auto"></div>
            <div
              class="flex justify-between text-xxs text-black font-normal mt-2 text-center"
            >
              <div class="items-center mx-auto">Lot #2</div>
              <div class="items-center mx-auto">Salvacion St.</div>
            </div>
            <div class="border-b-2 pt-1 border-gray-700 my-auto"></div>
            <div
              class="flex justify-between text-xxs text-black font-normal text-center"
            >
              <div class="items-center mx-auto italic">Subdivision/Village</div>
              <div class="items-center mx-auto italic">Barangay</div>
            </div>
          </div>
        </div>

        <div class="flex">
          <div class="w-3/12 border-b-2 border-black bg-gray-300">
            <div class="flex h-8 border-b-2 border-black">
              <div class="my-auto text-xxs font-normal text-black pr-3 pl-1">
                11.
              </div>
              <div class="my-auto text-xxs font-normal text-black">
                PAG-IBIG ID NO.
              </div>
            </div>
            <div class="flex h-8">
              <div class="my-auto text-xxs font-normal text-black pr-3 p-1">
                12.
              </div>
              <div class="my-auto text-xxs font-normal text-black">
                PHILHEALTH NO.
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-2/12"
          >
            <div class="flex h-8 border-b-2 border-black">
              <div
                class="my-auto text-xxs font-normal text-black pr-3 p-1 pl-3"
              >
                23456
              </div>
            </div>
            <div class="flex h-8">
              <div
                class="my-auto text-xxs font-normal text-black pr-3 p-1 pl-3"
              >
                235
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-2/12 bg-gray-300"
          >
            <div class="flex h-6">
              <div class="mx-auto text-xs font-normal text-black">&nbsp;</div>
            </div>
            <div class="flex h-10 pt-3">
              <div class="mx-auto text-xxs font-normal pt-2 text-black">
                ZIP CODE
              </div>
            </div>
          </div>
          <div
            class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-5/12"
          >
            <div
              class="flex justify-between text-xxs text-black font-normal mt-2 text-center"
            >
              <div class="items-center mx-auto">Lot #2</div>
              <div class="items-center mx-auto">Salvacion St.</div>
            </div>
            <div class="border-b-2 pt-1 border-gray-700 my-auto"></div>
            <div
              class="flex border-b-2 border-black justify-between text-xxs text-black font-normal text-center"
            >
              <div class="items-center mx-auto italic">City/Municipality</div>
              <div class="items-center mx-auto italic">Province</div>
            </div>
            <div
              class="flex justify-between text-xxs text-black font-normal text-center"
            >
              <div class="items-center mx-auto pt-3">4800</div>
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

const options = {
  name: "_blank",
  specs: ["fullscreen=yes", "titlebar=no", "scrollbars=yes"],
  styles: ["../css/app.css"],
};

Vue.use(VueHtmlToPaper, options);

export default {
  metaInfo: { title: "Personal Data Sheet" },
  layout: Layout,
  methods: {
    print() {
      this.$htmlToPaper("pds");
    },
  },
};
</script>
