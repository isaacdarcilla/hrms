<template>
  <div>
    <div class="flex justify-between">
      <h1 class="mb-8 font-bold text-3xl">
        <inertia-link
          class="text-indigo-400 hover:text-indigo-600"
          :href="route('employee.profile', employee.id)"
          >Form</inertia-link
        >
        <span class="text-indigo-400 font-medium">/</span> PDS
      </h1>
      <div class="flex">
        <butto
          @click="printPdf()"
          class="btn-indigo h-10 rounded-lg transition duration-500 ease-in-out transform hover:-translate-y-1"
        >
          <span>🖨️ Print Form</span>
        </butto>
      </div>
    </div>
    <div>
      <vue-html2pdf
        :show-layout="true"
        :float-layout="false"
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
        <!-- Page 1 -->

        <section
          slot="pdf-content"
          class="mt-2 bg-white font-sans mx-auto text-black"
          style="width: 800px; height: 1280px"
        >
          <div class="flex mt-6">
            <div class="my-auto">
              <div class="text-sm italic mt-1 font-semibold">
                CS Form No. 212
              </div>
              <div class="text-xs italic my-1">Revised 2017</div>
            </div>
          </div>
          <div class="mx-auto text-center font-extrabold text-2xl">
            PERSONAL DATA SHEET
          </div>
          <div class="italic text-xs font-semibold text-justify mt-3">
            WARNING: Any misrepresentation made in the Personal Data Sheet and
            the Work Experience Sheet shall cause the filing of
            administrative/criminal case/s against the person concerned.
          </div>
          <div class="italic text-xs font-semibold text-justify">
            READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS)
            BEFORE ACCOMPLISHING THE PDS FORM.
          </div>
          <div class="flex mt-1">
            <div class="w-8/12 text-xxs">
              Print legibly. Tick appropriate boxes ( ) and use separate sheet
              if necessary. Indicate N/A if not applicable. DO NOT ABBREVIATE.
            </div>
            <div
              class="w-1/12 pl-2 bg-gray-500 border-t border-l text-xxs border-r border-black"
            >
              1. CS ID No.
            </div>
            <div
              class="w-3/12 pl-2 text-right border-t text-xxs border-r border-black"
            >
              (Do not fill up. For CSC use only)
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              I. PERSONAL INFORMATION
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-l border-r border-black"
            >
              2. SURNAME
            </div>
            <div
              class="w-10/12 text-xs py-1 pl-1 border-t-2 border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;FIRST NAME
            </div>
            <div
              class="w-7/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Juan</div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>NAME EXTENSION (JR., SR)</div>
                <div class="my-auto capitalize">Jr.</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;MIDDLE NAME
            </div>
            <div
              class="w-10/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Paz</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row mb-3">
                <div>3. DATE OF BIRTH</div>
                <div>&nbsp;&nbsp;&nbsp;(mm/dd/yyy)</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">September 20, 1997</div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-t border-r border-black"
            >
              16. CITIZENSHIP
            </div>
            <div
              class="w-4/12 text-xs pl-2 py-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div class="flex">
                  <div
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Filipino</span>
                  </div>
                  <div
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Dual Citizenship</span>
                  </div>
                </div>
                <div class="flex float-right mt-2">
                  <div
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">by birth</span>
                  </div>
                  <div
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">by naturalization</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>4. PLACE OF BIRTH</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Virac, Catanduanes</div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-r text-center border-black"
            >
              If holder of dual citizenship,
            </div>
            <div class="w-4/12 text-xs pl-2 py-1 border-r border-black">
              <div class="flex">
                <div class="text-xs text-center mx-auto">
                  Pls. indicate country:
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>5. SEX</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex justify-between">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Male</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border bg-black my-auto ml-2 mr-3 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Female</span>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-r text-center border-black"
            >
              please indicate the details.
            </div>
            <div
              class="w-4/12 text-xs pl-2 py-1 border-r border-t border-black"
            >
              <div class="flex">
                <div class="text-xs">America</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>6. CIVIL STATUS</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex justify-between">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Single</span>
                  </div>
                </div>
                <div class="flex mr-6">
                  <div
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Married</span>
                  </div>
                </div>
              </div>
              <div class="flex justify-between">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Widowed</span>
                  </div>
                </div>
                <div class="flex mr-3">
                  <div
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Separated</span>
                  </div>
                </div>
              </div>
              <div class="flex justify-between">
                <div class="flex mx-3">
                  <div
                    class="text-sm h-2 border bg-black my-auto mx-2 border-black p-1"
                  ></div>
                  <div>
                    <span class="text-xs">Other/s:</span>
                  </div>
                </div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-t border-black"
            >
              <div class="flex-row">
                <div>17. RESIDENTIAL ADDRESS</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">#37</div>
                  <div class="my-auto capitalize">Salvacion St.,</div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">House/Block/Lot No.</div>
                  <div class="my-auto capitalize">Street</div>
                </div>
              </div>
              <div class="flex-row border-black border-t">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">#37</div>
                  <div class="my-auto capitalize">Salvacion St.,</div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">Subdivision/Village</div>
                  <div class="my-auto capitalize">Barangay</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>7. HEIGHT (m)</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>1.4</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">#37</div>
                  <div class="my-auto capitalize">Salvacion St.,</div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">City/Municipality</div>
                  <div class="my-auto capitalize">Province</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>8. WEIGHT (kg)</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>56</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            >
              <div class="flex-row mx-auto text-center">
                <div>ZIP CODE</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row text-center">
                <div>4800</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>9. BLOOD TYPE</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>A+</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-t border-black"
            >
              <div class="flex-row">
                <div>18. PERMANENT ADDRESS</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">#37</div>
                  <div class="my-auto capitalize">Salvacion St.,</div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">House/Block/Lot No.</div>
                  <div class="my-auto capitalize">Street</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>10. GSIS ID NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>1.4</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div class="w-5/12 text-xs border-r border-black">
              <div class="flex-row border-black border-t">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">#37</div>
                  <div class="my-auto capitalize">Salvacion St.,</div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">Subdivision/Village</div>
                  <div class="my-auto capitalize">Barangay</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>11. PAG-IBIG ID NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>56</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row">
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">#37</div>
                  <div class="my-auto capitalize">Salvacion St.,</div>
                </div>
                <div class="border-gray-500 border-t"></div>
                <div class="flex justify-evenly">
                  <div class="my-auto capitalize">City/Municipality</div>
                  <div class="my-auto capitalize">Province</div>
                </div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>12. PHILHEALTH NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>56</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            >
              <div class="flex-row mx-auto text-center">
                <div>ZIP CODE</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row text-center">
                <div>4800</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>13. SSS NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>56</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 border-t py-1 border-r border-black"
            >
              <div class="flex-row">
                <div>19. TELEPHONE NO.</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row ml-2">
                <div>092030952931</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>14. TIN NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>56</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 border-t py-1 border-r border-black"
            >
              <div class="flex-row">
                <div>20. MOBILE NO.</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row ml-2">
                <div>092030952931</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              <div class="flex-row">
                <div>15. AGENCY EMPLOYEE NO.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div>56</div>
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 border-t py-1 border-r border-black"
            >
              <div class="flex-row">
                <div>21. E-MAIL ADDRESS (if any)</div>
              </div>
            </div>
            <div class="w-5/12 text-xs pt-1 border-t border-r border-black">
              <div class="flex-row ml-2">
                <div>092030952931</div>
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              II. FAMILY BACKGROUND
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-l border-r border-black"
            >
              22. SPOUSE'S SURNAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t-2 border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 bg-gray-300 pl-1 border-t-2 border-r border-black"
            >
              <div class="my-auto">
                23. NAME of CHILDREN (Write full name and list all)
              </div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 bg-gray-300 border-t-2 border-r border-black"
            >
              <div class="my-auto text-center">DATE OF BIRTH (mm/dd/yyyy)</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;FIRST NAME
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div class="text-xxs">NAME EXTENSION (JR., SR)</div>
                <div class="my-auto capitalize">Jr.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;MIDDLE NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;OCCUPATION
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs px-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;EMPLOYER/BUSINESS NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;BUSINESS ADDRESS
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;TELEPHONE NO.
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              24. FATHERS'S SURNAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;FIRST NAME
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="flex-row">
                <div class="text-xxs">NAME EXTENSION (JR., SR)</div>
                <div class="my-auto capitalize">Jr.</div>
              </div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;MIDDLE NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t border-l border-r border-black"
            >
              25. MOTHER'S MAIDEN NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;SUR NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;FIRST NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-3/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto">John Doe</div>
            </div>
            <div
              class="w-2/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto text-center">September 20, 1997</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-l border-r border-black"
            >
              &nbsp;&nbsp;&nbsp;MIDDLE NAME
            </div>
            <div
              class="w-5/12 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div class="my-auto capitalize">Dela Cruz</div>
            </div>
            <div
              class="w-5/12 bg-gray-200 text-xs py-1 pl-1 border-t border-r border-black"
            >
              <div
                class="my-auto text-center italic text-red-600 font-semibold"
              >
                (Continue on separate sheet if necessary)
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              III. EDUCATIONAL BACKGROUND
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-l border-r border-black"
            >
              26. LEVEL
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">NAME OF SCHOOL<br />(Write in full)</div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">
                BASIC EDUCATION/DEGREE/COURSE (Write in full)
              </div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">PERIOD OF ATTENDANCE</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xxs">
                HIGHEST LEVEL/ UNITS EARNED (if not graduated)
              </div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xxs">YEAR GRADUATED</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xxs">
                SCHOLARSHIP/ ACADEMIC HONORS RECEIVED
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-3 py-1 border-l border-r border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t border-r border-black"
            >
              <div class="text-center">From</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t border-r border-black"
            >
              <div class="text-center">To</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 text-xs pl-3 py-1 border-t border-l border-r border-black"
            >
              <div>ELEMENTARY</div>
            </div>
            <div
              class="w-2/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-3/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center">01/01/2021</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center">01/01/2021</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 text-xs pl-3 py-1 border-t border-l border-r border-black"
            >
              <div>SECONDARY</div>
            </div>
            <div
              class="w-2/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-3/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center">01/01/2021</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center">01/01/2021</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 text-xs pl-3 py-1 border-t border-l border-r border-black"
            >
              <div>VOCATIONAL / TRADE COURSE</div>
            </div>
            <div
              class="w-2/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-3/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center">01/01/2021</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center">01/01/2021</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 text-xs pl-3 py-1 border-t border-l border-r border-black"
            >
              <div>COLLEGE</div>
            </div>
            <div
              class="w-2/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-3/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center">01/01/2021</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center">01/01/2021</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 text-xs pl-3 py-1 border-t border-l border-r border-black"
            >
              <div>GRADUATE STUDIES</div>
            </div>
            <div
              class="w-2/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-3/12 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center">01/01/2021</div>
            </div>
            <div class="w-1/12 text-xs py-1 border-t border-r border-black">
              <div class="text-center">01/01/2021</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
            <div
              class="w-1/12 text-xs py-1 text-center border-t border-r border-black"
            >
              <div>Sample</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-b border-black font-semibold italic text-xs text-center text-red-600 bg-gray-300"
            >
              (Continue on separate sheet if necessary)
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs mx-auto text-center py-2 border-t-2 border-b border-l font-semibold italic border-r border-black"
            >
              SIGNATURE
            </div>
            <div
              class="w-5/12 bg-gray-300 text-xs mx-auto py-2 border-t-2 border-r border-b border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs mx-auto text-center py-2 border-t-2 border-b font-semibold italic border-r border-black"
            >
              DATE
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-b border-black"
            ></div>
          </div>
          <div class="float-right text-xs italic">
            CS FORM 212 (Revised 2017), Page 1 of 4
          </div>
        </section>

        <!-- End Page 1 -->

        <!-- Page 2 -->

        <section
          slot="pdf-content"
          class="mt-12 bg-white font-sans mx-auto text-black"
          style="width: 800px; height: 1280px"
        >
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              IV. CIVIL SERVICE ELIGIBILITY
            </div>
          </div>
          <div class="flex">
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-l border-r border-black"
            >
              27. CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/
              CSEE BARANGAY ELIGIBILITY / DRIVER'S LICENSE
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">RATING<br />(If Applicable)</div>
            </div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">DATE OF EXAMINATION / CONFERMENT</div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center my-auto">
                PLACE OF EXAMINATION / CONFERMENT
              </div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xs mt-4">
                LICENSE (if applicable)
              </div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 text-center border-l border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs py-1 border-t border-r border-black"
            >
              <div class="text-center text-xs">NUMBER</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t border-r border-black"
            >
              <div class="text-center text-xs">Date of Validity</div>
            </div>
          </div>
          <div v-for="n in 7" :key="n" class="flex">
            <div
              class="w-3/12 bg-gray-300 text-xs pl-3 py-2 border-t text-center border-l border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-2 border-t border-r border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 border-t py-1 border-r border-black"
            ></div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-2 border-t border-r border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs py-2 border-t border-r border-black"
            >
              <div class="text-center text-xs">09312412</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-2 border-t border-r border-black"
            >
              <div class="text-center text-xs">12/12/2021</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l text-center text-red-600 text-xs border-r border-black font-semibold italic bg-gray-300"
            >
              (Continue on separate sheet if necessary)
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l border-r border-black font-semibold italic text-base bg-gray-500"
            >
              V. WORK EXPERIENCE <br />
              <span class="text-xs italic"
                >(Include private employment. Start from your recent work)
                Description of duties should be indicated in the attached Work
                Experience sheet.</span
              >
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t-2 border-l border-r border-black"
            >
              28. INCLUSIVE DATES (mm/dd/yyyy)
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">
                POSITION TITLE <br />(Write in full/Do not abbreviate)
              </div>
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-t-2 border-r border-black"
            >
              <div class="text-center">
                DEPARTMENT / AGENCY / OFFICE / COMPANY <br />(Write in full/Do
                not abbreviate)
              </div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center my-auto">MONTHLY SALARY</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xs">
                SALARY/ JOB/ PAY GRADE (if applicable)
              </div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xs">STATUS OF APPOINT<br />MENT</div>
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-black"
            >
              <div class="text-center text-xs">GOV'T SERVICE <br />(Y/ N)</div>
            </div>
          </div>
          <div class="flex">
            <div
              class="w-1/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t border-l border-r border-black"
            >
              From
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs pl-2 py-1 text-center border-t border-r border-black"
            >
              To
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-3/12 bg-gray-300 text-xs pl-2 py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-1 border-r border-black"
            ></div>
          </div>
          <div v-for="n in 28" :key="n" class="flex">
            <div
              class="w-1/12 bg-gray-300 text-xs py-2 text-center border-t border-l border-r border-black"
            >
              12/12/2021
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs py-2 text-center border-t border-r border-black"
            >
              12/12/2021
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-2 text-center border-t border-r border-black"
            >
              Sample Position
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs text-center border-t py-2 border-r border-black"
            >
              Dyan Lang
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs text-center py-2 border-t border-r border-black"
            >
              P 26,000.00
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs text-center py-2 border-t border-r border-black"
            >
              SG-13
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs text-center py-2 border-t border-r border-black"
            >
              Permanent
            </div>
            <div
              class="w-1/12 bg-gray-300 text-xs text-center py-2 border-t border-r border-black"
            >
              Y
            </div>
          </div>
          <div class="flex">
            <div
              class="w-full border-t-2 border-l text-center text-red-600 text-xs border-r border-black font-semibold italic bg-gray-300"
            >
              (Continue on separate sheet if necessary)
            </div>
          </div>
          <div class="flex">
            <div
              class="w-2/12 bg-gray-300 text-xs mx-auto text-center py-2 border-t-2 border-b border-l font-semibold italic border-r border-black"
            >
              SIGNATURE
            </div>
            <div
              class="w-5/12 bg-gray-300 text-xs mx-auto py-2 border-t-2 border-r border-b border-black"
            ></div>
            <div
              class="w-2/12 bg-gray-300 text-xs mx-auto text-center py-2 border-t-2 border-b font-semibold italic border-r border-black"
            >
              DATE
            </div>
            <div
              class="w-3/12 bg-gray-300 text-xs py-1 border-t-2 border-r border-b border-black"
            ></div>
          </div>
          <div class="float-right text-xs italic">
            CS FORM 212 (Revised 2017), Page 2 of 4
          </div>
        </section>
        <!-- End Page 2 -->
      </vue-html2pdf>
    </div>
  </div>
</template>

<script>
import Layout from "@/Pages/EmployeePanel/Layout";
import VueHtml2pdf from "vue-html2pdf";

export default {
  metaInfo: { title: "PDS Form" },
  layout: Layout,
  components: {
    VueHtml2pdf,
  },
  props: {
    employee: Object,
  },
  methods: {
    printPdf() {
      console.log(true);
      this.$refs.html2Pdf.generatePdf();
    },
  },
};
</script>