<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Personal Data Sheet 📜</h1>
    <div class="border-2 border-black font-sans w-72">
      <div class="p-1 text-sm text-black font-semibold italic">
        CS Form No. 212
      </div>
      <div class="p-1 text-xs text-black font-semibold italic">
        Revised 2017
      </div>
      <div
        class="text-4xl font-extrabold leading-none text-black text-center uppercase"
      >
        Personal Data Sheet
      </div>
      <div class="p-1 text-xs text-black font-semibold mt-4 italic">
        WARNING: Any misrepresentation made in the Personal Data Sheet and the
        Work Experience Sheet shall cause the filing of administrative/criminal
        case/s against the person concerned.
      </div>
      <div class="p-1 text-xs text-black font-semibold mt-0 italic">
        READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS)
        BEFORE ACCOMPLISHING THE PDS FORM.
      </div>
      <div
        class="pl-1 text-xs text-black font-normal mt-1 flex justify-between"
      >
        <div>
          Print legibly. Tick appropriate boxes ( ) and use separate sheet if
          necessary. Indicate N/A if not applicable.
          <span class="font-bold">DO NOT ABBREVIATE</span>.
        </div>
        <div class="flex">
          <div
            class="border-2 border-b-0 border-r-0 bg-gray-600 border-black p-1"
          >
            1. CS ID No.
          </div>
          <div class="border-2 border-b-0 border-r-0 border-black p-1 pl-12">
            (Do not fill up. For CSC use only)
          </div>
        </div>
      </div>
      <div class="border-2 p-0 border-black border-r-0 border-l-0 bg-gray-500">
        <div class="p-1 italic font-semibold text-base text-white">
          I. PERSONAL INFORMATION
        </div>
      </div>
      <div class="flex">
        <div
          class="w-64 pr-2 border-2 border-black border-l-0 border-r-0 border-t-0 bg-gray-300"
        >
          <div class="flex py-3">
            <div class="text-xs font-normal text-black pr-3 p-1">2.</div>
            <div class="my-auto text-xs font-normal text-black">SURNAME</div>
          </div>
          <div class="py-2">
            <div class="text-xs font-normal text-black pl-6 mx-auto">
              FIRST NAME
            </div>
          </div>
          <div class="py-3">
            <div class="text-xs font-normal text-black pl-6 mx-auto">
              MIDDLE NAME
            </div>
          </div>
        </div>
        <div
          class="border-2 border-black border-b-0 border-t-0 border-l-0 border-r-0 w-11/12"
        >
          <div
            class="flex p-3 py-3 border-2 border-t-0 border-r-0 border-black"
          >
            <div class="my-auto text-xs font-normal text-black">JOHN</div>
          </div>
          <div class="flex justify-between">
            <div
              class="my-auto text-xs font-normal text-black p-3 py-3 border-2 border-t-0 border-b-0 border-r-0 border-black"
            >
              DOE
            </div>
            <div class="border-l-2 border-b-0 border-black bg-gray-400">
              <div class="my-auto text-xs font-normal text-black pr-24">
                NAME EXTENSION (JR., SR)
              </div>
            </div>
          </div>
          <div class="flex p-3 py-3 border-2 border-r-0 border-black">
            <div class="my-auto text-xs font-normal text-black">COOPER</div>
          </div>
        </div>
      </div>

      <div class="flex">
        <div
          class="w-64 border-2 border-black border-l-0 border-r-0 border-t-0 border-b-0 bg-gray-300"
        >
          <div class="flex py-3 pr-16 border-b-2 border-black">
            <div class="text-xs font-normal text-black pr-3 p-1">3.</div>
            <div class="my-auto text-xs font-normal text-black">
              DATE OF BIRTH
              <div class="my-auto text-xs font-normal text-black">
                (mm/dd/yyyy)
              </div>
            </div>
          </div>
          <div class="flex py-3 border-b-2 border-black">
            <div class="text-xs font-normal text-black pr-3 p-1">4.</div>
            <div class="my-auto text-xs font-normal text-black">
              PLACE OF BIRTH
            </div>
          </div>
          <div class="flex py-3 border-b-2 border-black">
            <div class="text-xs font-normal text-black pr-3 p-1">5.</div>
            <div class="my-auto text-xs font-normal text-black">SEX</div>
          </div>
        </div>
        <div
          class="border-2 border-black border-b-0 border-t-0 border-l-0 border-r-0 w-2/12"
        >
          <div
            class="flex p-3 pt-4 pb-5 border-2 border-t-0 border-r-0 border-black"
          >
            <div class="my-auto text-xs font-normal text-black">11/11/1111</div>
          </div>
          <div class="flex">
            <div
              class="my-auto text-xs font-normal text-black p-3 py-4 border-2 border-t-0 border-b-0 border-r-0 border-black"
            >
              DOE
            </div>
          </div>
          <div class="flex p-3 py-4 border-2 border-r-0 border-black">
            <i class="my-auto border-2 border-black p-1" />
            <div class="my-auto text-xs font-normal text-black px-2 pr-6">
              Male
            </div>
            <i class="my-auto border-2 border-black p-1" />
            <div class="my-auto text-xs font-normal text-black px-2">
              Female
            </div>
          </div>
        </div>
        <div
          class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-4/12 bg-gray-300"
        >
          <div class="flex py-3 border-black">
            <div class="text-xs font-normal text-black pr-3 p-1">6.</div>
            <div class="my-auto text-xs font-normal text-black">
              CITIZENSHIP
            </div>
          </div>
          <div class="flex flex-col mx-auto">
            <div class="text-xs mx-auto font-normal text-black p-3">
              If holder of dual citizenship,
            </div>
            <div class="text-xs mx-auto font-normal text-black">
              please indicate the details.
            </div>
          </div>
        </div>
        <div
          class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-5/12"
        >
          <div class="flex p-3 pt-4 pb-2 pl-6">
            <i class="my-auto border-2 border-black p-1" />
            <div class="my-auto text-xs font-normal text-black px-2 pr-12">
              Filipino
            </div>
            <i class="my-auto border-2 border-black p-1" />
            <div class="my-auto text-xs font-normal text-black px-2">
              Dual Citizenship
            </div>
          </div>
          <div class="flex p-3 py-2 pl-40">
            <i class="my-auto border-2 border-black p-1" />
            <div class="my-auto text-xs font-normal text-black px-2 pr-6">
              by birth
            </div>
            <i class="my-auto border-2 border-black p-1" />
            <div class="my-auto text-xs font-normal text-black px-2">
              by naturalization
            </div>
          </div>
          <div class="flex p-3 py-1 pl-40">
            <div class="my-auto text-xs font-normal text-black px-2 pr-6">
              Pls. indicate country:
            </div>
          </div>
          <div class="flex pt-5 pl-6">
            <div class="my-auto text-xs font-normal text-black">Canada</div>
          </div>
        </div>
      </div>

      <div class="flex h-20">
        <div
          class="w-64 py-3 border-b-2 border-black bg-gray-300"
        >
          <div class="flex">
            <div class="text-xs font-normal text-black pr-3 pl-1">6.</div>
            <div class="my-auto text-xs font-normal text-black">
              CIVIL STATUS
            </div>
          </div>
        </div>
        <div
          class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-2/12"
        >
          <div class="flex pl-3 pt-3">
            <i class="my-auto border-2 border-black p-1" />
            <div class="my-auto text-xs font-normal text-black px-2 pr-6">
              Single
            </div>
            <i class="my-auto border-2 border-black p-1" />
            <div class="my-auto text-xs font-normal text-black px-2">
              Married
            </div>
          </div>
          <div class="flex pl-3 pt-3">
            <i class="my-auto border-2 border-black p-1" />
            <div class="my-auto text-xs font-normal text-black px-2 pr-2">
              Widowed
            </div>
            <i class="my-auto border-2 border-black p-1" />
            <div class="my-auto text-xs font-normal text-black px-2">
              Separated
            </div>
          </div>
          <div class="flex pl-3 pt-3">
            <i class="my-auto border-2 border-black p-1" />
            <div class="my-auto text-xs font-normal text-black px-2 pr-2">
              Other/s:
            </div>
          </div>
        </div>
        <div
          class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-3/12 bg-gray-300"
        >
          <div class="flex py-3">
            <div class="text-xs font-normal text-black pr-3 pl-1">7.</div>
            <div class="pb-12 my-auto text-xs font-normal text-black">
              RESIDENTIAL ADDRESS
            </div>
          </div>
        </div>
        <div
          class="border-2 border-black border-b-2 border-t-0 border-l-2 border-r-0 w-6/12"
        >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Layout from "@/Shared/Layout";

export default {
  metaInfo: { title: "Personal Data Sheet" },
  layout: Layout,
};
</script>
