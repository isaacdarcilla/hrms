<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">
      Service Record of {{ employee.first_name }} {{ employee.last_name }} 🗂️
    </h1>
    <div class="mb-6 flex items-center justify-between">
      <button @click="printPdf()" class="btn-indigo rounded-lg">
        <span>🖨️ Print</span>
        <span class="hidden md:inline">Service Record</span>
      </button>
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
        style="width: 800px; height: 1280px"
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
                  <div
                    v-if="service_records.data[0]"
                    class="flex justify-between"
                  >
                    <div class="w-1/3 uppercase font-semibold">
                      {{ service_records.data[0].contact.last_name }}
                    </div>
                    <div class="w-1/3 uppercase font-semibold">
                      {{ service_records.data[0].contact.first_name }}
                    </div>
                    <div class="w-1/3 uppercase font-semibold">
                      {{ service_records.data[0].contact.middle_name }}
                    </div>
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
                  <div
                    v-if="service_records.data[0]"
                    class="flex justify-between"
                  >
                    <div class="w-1/2">
                      {{
                        formatDate(service_records.data[0].contact.birth_date)
                      }}
                    </div>
                    <div class="w-1/2">
                      {{ service_records.data[0].contact.birth_place }}
                    </div>
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
        <div class="mt-6">
          <div class="flex">
            <div
              class="w-2/12 py-1 border-t border-l text-center border-r border-black"
            >
              SERVICE <br />
              (INCL. DATES)
            </div>
            <div class="w-4/12 border-t text-center border-r border-black">
              &nbsp; <br />
              RECORD OF APPOINTMENT
            </div>
            <div class="w-3/12 py-1 border-t text-center border-r border-black">
              OFFICE/ENTITY/<br />DIVISION
            </div>
            <div class="w-1/12 py-1 border-t text-center border-r border-black">
              LV/ABS<br />W/O
            </div>
            <div class="w-2/12 py-1 border-t text-center border-r border-black">
              &nbsp; <br />
              SEPARATION
            </div>
          </div>
          <div class="flex">
            <div
              class="w-1/12 py-1 border-t border-b border-l text-center border-r border-black"
            >
              From
            </div>
            <div
              class="w-1/12 py-1 border-t border-b text-center border-r border-black"
            >
              To
            </div>
            <div
              class="w-2/12 py-1 border-t border-b text-center border-r border-black"
            >
              Designation
            </div>
            <div
              class="w-1/12 py-1 border-t border-b text-center border-r border-black"
            >
              Status
            </div>
            <div
              class="w-1/12 py-1 border-t border-b text-center border-r border-black"
            >
              Salary
            </div>
            <div
              class="w-2/12 py-1 border-t border-b text-center border-r border-black"
            >
              Station/Place
            </div>
            <div
              class="w-1/12 py-1 border-t border-b text-center border-r border-black"
            >
              Branch
            </div>
            <div class="w-1/12 py-1 text-center border-r border-b border-black">
              PAY
            </div>
            <div
              class="w-1/12 py-1 border-t border-b text-center border-r border-black"
            >
              Date
            </div>
            <div
              class="w-1/12 py-1 border-t border-b text-center border-r border-black"
            >
              Cause
            </div>
          </div>
          <div v-if="service_records.data[0]" class="flex">
            <div
              class="w-1/12 mx-auto py-2 border-l text-center border-r border-black"
            >
              <div class="text-xs">
                {{ format(service_records.data[0].service_start) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[0].service_end) }}
              </div>
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[0].designation }}
            </div>
            <div
              class="w-1/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[0].status }}
            </div>
            <div class="w-1/12 text-sm py-2 text-center border-r border-black">
              {{ currency(service_records.data[0].salary) }}
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[0].station_or_place }}
            </div>
            <div
              class="w-1/12 py-2 capitalize text-center border-r border-black"
            >
              {{ service_records.data[0].branch }}
            </div>
            <div
              class="w-1/12 py-2 text-center capitalize border-r border-black"
            >
              {{ service_records.data[0].pay }}
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[0].separation_date) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs capitalize">
                {{ service_records.data[0].separation_cause }}
              </div>
            </div>
          </div>
          <div v-if="service_records.data[1]" class="flex">
            <div
              class="w-1/12 mx-auto py-2 border-l text-center border-r border-black"
            >
              <div class="text-xs">
                {{ format(service_records.data[1].service_start) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[1].service_end) }}
              </div>
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[1].designation }}
            </div>
            <div
              class="w-1/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[1].status }}
            </div>
            <div class="w-1/12 text-sm py-2 text-center border-r border-black">
              {{ currency(service_records.data[1].salary) }}
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[1].station_or_place }}
            </div>
            <div
              class="w-1/12 py-2 capitalize text-center border-r border-black"
            >
              {{ service_records.data[1].branch }}
            </div>
            <div
              class="w-1/12 py-2 text-center capitalize border-r border-black"
            >
              {{ service_records.data[1].pay }}
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[1].separation_date) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs capitalize">
                {{ service_records.data[1].separation_cause }}
              </div>
            </div>
          </div>
          <div v-if="service_records.data[2]" class="flex">
            <div
              class="w-1/12 mx-auto py-2 border-l text-center border-r border-black"
            >
              <div class="text-xs">
                {{ format(service_records.data[2].service_start) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[2].service_end) }}
              </div>
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[2].designation }}
            </div>
            <div
              class="w-1/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[2].status }}
            </div>
            <div class="w-1/12 text-sm py-2 text-center border-r border-black">
              {{ currency(service_records.data[2].salary) }}
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[2].station_or_place }}
            </div>
            <div
              class="w-1/12 py-2 capitalize text-center border-r border-black"
            >
              {{ service_records.data[2].branch }}
            </div>
            <div
              class="w-1/12 py-2 text-center capitalize border-r border-black"
            >
              {{ service_records.data[2].pay }}
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[2].separation_date) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs capitalize">
                {{ service_records.data[2].separation_cause }}
              </div>
            </div>
          </div>
          <div v-if="service_records.data[3]" class="flex">
            <div
              class="w-1/12 mx-auto py-2 border-l text-center border-r border-black"
            >
              <div class="text-xs">
                {{ format(service_records.data[3].service_start) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[3].service_end) }}
              </div>
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[3].designation }}
            </div>
            <div
              class="w-1/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[3].status }}
            </div>
            <div class="w-1/12 text-sm py-2 text-center border-r border-black">
              {{ currency(service_records.data[3].salary) }}
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[3].station_or_place }}
            </div>
            <div
              class="w-1/12 py-2 capitalize text-center border-r border-black"
            >
              {{ service_records.data[3].branch }}
            </div>
            <div
              class="w-1/12 py-2 text-center capitalize border-r border-black"
            >
              {{ service_records.data[3].pay }}
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[3].separation_date) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs capitalize">
                {{ service_records.data[3].separation_cause }}
              </div>
            </div>
          </div>
          <div v-if="service_records.data[4]" class="flex">
            <div
              class="w-1/12 mx-auto py-2 border-l text-center border-r border-black"
            >
              <div class="text-xs">
                {{ format(service_records.data[4].service_start) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[4].service_end) }}
              </div>
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[4].designation }}
            </div>
            <div
              class="w-1/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[4].status }}
            </div>
            <div class="w-1/12 text-sm py-2 text-center border-r border-black">
              {{ currency(service_records.data[4].salary) }}
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[4].station_or_place }}
            </div>
            <div
              class="w-1/12 py-2 capitalize text-center border-r border-black"
            >
              {{ service_records.data[4].branch }}
            </div>
            <div
              class="w-1/12 py-2 text-center capitalize border-r border-black"
            >
              {{ service_records.data[4].pay }}
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[4].separation_date) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs capitalize">
                {{ service_records.data[4].separation_cause }}
              </div>
            </div>
          </div>
          <div v-if="service_records.data[5]" class="flex">
            <div
              class="w-1/12 mx-auto py-2 border-l text-center border-r border-black"
            >
              <div class="text-xs">
                {{ format(service_records.data[5].service_start) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[5].service_end) }}
              </div>
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[5].designation }}
            </div>
            <div
              class="w-1/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[5].status }}
            </div>
            <div class="w-1/12 text-sm py-2 text-center border-r border-black">
              {{ currency(service_records.data[5].salary) }}
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[5].station_or_place }}
            </div>
            <div
              class="w-1/12 py-2 capitalize text-center border-r border-black"
            >
              {{ service_records.data[5].branch }}
            </div>
            <div
              class="w-1/12 py-2 text-center capitalize border-r border-black"
            >
              {{ service_records.data[5].pay }}
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[5].separation_date) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs capitalize">
                {{ service_records.data[5].separation_cause }}
              </div>
            </div>
          </div>
          <div v-if="service_records.data[6]" class="flex">
            <div
              class="w-1/12 mx-auto py-2 border-l text-center border-r border-black"
            >
              <div class="text-xs">
                {{ format(service_records.data[6].service_start) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[6].service_end) }}
              </div>
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[6].designation }}
            </div>
            <div
              class="w-1/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[6].status }}
            </div>
            <div class="w-1/12 text-sm py-2 text-center border-r border-black">
              {{ currency(service_records.data[6].salary) }}
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[6].station_or_place }}
            </div>
            <div
              class="w-1/12 py-2 capitalize text-center border-r border-black"
            >
              {{ service_records.data[6].branch }}
            </div>
            <div
              class="w-1/12 py-2 text-center capitalize border-r border-black"
            >
              {{ service_records.data[6].pay }}
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[6].separation_date) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs capitalize">
                {{ service_records.data[6].separation_cause }}
              </div>
            </div>
          </div>
          <div v-if="service_records.data[7]" class="flex">
            <div
              class="w-1/12 mx-auto py-2 border-l text-center border-r border-black"
            >
              <div class="text-xs">
                {{ format(service_records.data[7].service_start) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[7].service_end) }}
              </div>
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[7].designation }}
            </div>
            <div
              class="w-1/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[7].status }}
            </div>
            <div class="w-1/12 text-sm py-2 text-center border-r border-black">
              {{ currency(service_records.data[7].salary) }}
            </div>
            <div
              class="w-2/12 py-2 text-center border-r capitalize border-black"
            >
              {{ service_records.data[7].station_or_place }}
            </div>
            <div
              class="w-1/12 py-2 capitalize text-center border-r border-black"
            >
              {{ service_records.data[7].branch }}
            </div>
            <div
              class="w-1/12 py-2 text-center capitalize border-r border-black"
            >
              {{ service_records.data[7].pay }}
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs">
                {{ format(service_records.data[7].separation_date) }}
              </div>
            </div>
            <div class="w-1/12 py-2 text-center border-r border-black">
              <div class="text-xs capitalize">
                {{ service_records.data[7].separation_cause }}
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-1/12 mx-auto py-2 border-l border-b text-center border-r border-black"
            >
              &nbsp;
            </div>
            <div class="w-1/12 py-2 text-center border-b border-r border-black">
              &nbsp;
            </div>
            <div class="w-2/12 py-2 text-center border-b border-r border-black">
              &nbsp;
            </div>
            <div class="w-1/12 py-2 text-center border-b border-r border-black">
              &nbsp;
            </div>
            <div
              class="w-1/12 text-sm py-2 border-b text-center border-r border-black"
            >
              &nbsp;
            </div>
            <div class="w-2/12 py-2 text-center border-b border-r border-black">
              &nbsp;
            </div>
            <div class="w-1/12 py-2 text-center border-b border-r border-black">
              &nbsp;
            </div>
            <div class="w-1/12 py-2 text-center border-b border-r border-black">
              &nbsp;
            </div>
            <div class="w-1/12 py-2 text-center border-b border-r border-black">
              &nbsp;
            </div>
            <div class="w-1/12 py-2 text-center border-b border-r border-black">
              &nbsp;
            </div>
          </div>
          <div class="inset-x-0 bottom-0">
            <div class="mt-8 text-justify" style="text-indent: 50px">
              Issued in compliance with Executive Order No. 54, dated August 10,
              1954 and in accordance with Circular No. 58, dated August 10 1954
              of the system.
            </div>
            <div class="mt-12 flex justify-between">
              <div class="w-4/12"></div>
              <div class="w-8/12 uppercase text-center">Certified Correct:</div>
            </div>
            <div class="mt-12 flex justify-between">
              <div class="w-6/12 text-center align-middle">{{ moment() }}</div>
              <div class="w-6/12 uppercase text-center">
                <span class="font-semibold">MA. SIONNE MAY T. CRISPINO</span
                ><br />
                <span class="italic">Administrative Officer V</span><br />
                <span class="italic">HRM Service</span>
              </div>
            </div>
            <div class="border-b-2 border-blue-600 mt-12"></div>
            <div class="flex pb-20">
              <div class="w-4/12">
                <div class="text-sm italic text-left">CSU-F-HRM-24</div>
              </div>
              <div class="w-4/12">
                <div class="text-sm text-center italic">Rev.0</div>
              </div>
              <div class="w-4/12">
                <div class="text-sm text-right italic">
                  Effectivity Date: June 1, 2015
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </vue-html2pdf>

    <div class="shadow overflow-auto border-b border-gray-200 sm:rounded-lg">
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
          </tr>
        </tbody>
        <tr v-if="service_records.data.length === 0">
          <td class="border-t px-6 py-4 text-red-500 font-bold" colspan="4">
            ☹️ No service record found.
          </td>
        </tr>
      </table>
    </div>
  </div>
</template>

<script>
import Icon from "@/Shared/Icon";
import Layout from "@/Pages/EmployeePanel/Layout";
import mapValues from "lodash/mapValues";
import Pagination from "@/Shared/Pagination";
import pickBy from "lodash/pickBy";
import SearchFilter from "@/Shared/SearchFilter";
import throttle from "lodash/throttle";
import moment from "moment";
import Create from "@/Pages/ServiceRecord/Create";
import Edit from "@/Pages/ServiceRecord/Edit";
import VueHtml2pdf from "vue-html2pdf";

export default {
  metaInfo: { title: "Service Record" },
  layout: Layout,
  components: {
    Icon,
    Pagination,
    SearchFilter,
    Create,
    VueHtml2pdf,
    Edit,
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
    printPdf() {
      console.log(true);
      this.$refs.html2Pdf.generatePdf();
    },
    moment() {
      return moment().format("MMMM D, YYYY");
    },
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
