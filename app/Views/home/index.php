<?= $this->extend('layout/template'); ?>


<?= $this->section('content'); ?>
<div class="bungkusutama">
  <!-- section hero -->
  <section class="px-10 md:max-w-screen-md mx-auto mt-24">
    <div class="mt-10">
      <div class="flex items-center justify-center gap-5">
        <img src="mypp.jpg" class="rounded-full w-20 md:w-32" />
        <div>
          <h1 class="text-1xl md:text-2xl font-extrabold">
            Bhadrika Aryaputra Hermawan
          </h1>
          <p class="text-1xl md:text-1xl font-light">Developer | Student</p>
          <div class="mt-2 flex gap-3">
            <a href="https://github.com/dhikaid">
              <svg class="w-5 h-5 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd" />
              </svg></a>
            <a href="https://www.youtube.com/@BhadrikaAryaPutra">
              <svg class="w-5 h-5 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                <path fill-rule="evenodd" d="M19.7 3.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.84c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.84A4.225 4.225 0 0 0 .3 3.038a30.148 30.148 0 0 0-.2 3.206v1.5c.01 1.071.076 2.142.2 3.206.094.712.363 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.15 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965c.124-1.064.19-2.135.2-3.206V6.243a30.672 30.672 0 0 0-.202-3.206ZM8.008 9.59V3.97l5.4 2.819-5.4 2.8Z" clip-rule="evenodd" />
              </svg></a>
          </div>
        </div>
      </div>
    </div>
    <hr class="mt-5 border-3 border-black dark:border-white" />
  </section>

  <!-- section laun -->
  <section class="px-10 md:max-w-screen-md mt-6 m-auto">
    <h2 class="text-1xl font-extrabold underline underline-offset-8 decoration-black-500">
      About Me
    </h2>
    <div class="mt-5 md:flex md:gap-4 md:justify-center md:items-center">
      <img src="https://web.bhadrikais.my.id/img/about.jpg" class="rounded-lg h-44" alt="" />
      <div class="">
        <p class="font-semibold mt-2 leading-relaxed">Halo 👋</p>
        <p class="leading-loose">
          Saya <span class="font-semibold">Bhadrika A.</span> Saya seorang
          <span class="underline underline-offset-8 decoration-4 decoration-indigo-500">
            junior programmer</span>
          yang sangat senang mendalami dan mempelajari hal-hal mengenai
          program software dan web. Selain itu, saya senang sekali mengulik
          jaringan internet dan juga mengulik videografi serta fotografi.
        </p>
      </div>
    </div>
  </section>

  <!-- section laun -->
  <section class="px-10 md:max-w-screen-md mt-6 m-auto">
    <h2 class="text-1xl font-extrabold underline underline-offset-8 decoration-black-500">
      Experience
    </h2>
    <div class="mt-5 md:flex md:gap-4 md:justify-center md:items-center">
      <div class="">
        <ol class="relative border-l border-gray-200 dark:border-gray-700">
          <li class="mb-10 ml-4">
            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Oktober 2019 - Oktober 2020
            </time>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              Anggota Tim IT SMA Pasundan 8 Bandung
            </h3>
            <ul class="mt-1 text-sm text-gray-500 dark:text-gray-400 max-w-md text-gray-500 list-disc list-inside dark:text-gray-400">
              <li>Tim dokumentasi acara OSIS.</li>
              <li>Operator broadcast MPLS online 2020.</li>
              <li>Operator broadcast debat ketua OSIS 2020.</li>
              <li>Developer website pemilihan ketua OSIS 2020.</li>
            </ul>
          </li>
          <li class="mb-10 ml-4">
            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Oktober 2020 - Oktober 2021</time>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              Ketua Tim IT SMA Pasundan 8 Bandung
            </h3>
            <ul class="mt-1 text-sm text-gray-500 dark:text-gray-400 max-w-md text-gray-500 list-disc list-inside dark:text-gray-400">
              <li>Koordinator tim dokumentasi acara OSIS.</li>
              <li>Operator broadcast MPLS online 2021.</li>
              <li>Operator broadcast debat ketua OSIS 2021.</li>
              <li>Developer website MPLS online 2021.</li>
              <li>Developer website pemilihan ketua OSIS 2021.</li>
            </ul>
          </li>
          <li class="ml-4">
            <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">September 2023 - sekarang
            </time>
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              Asisten Dosen UNPAS
            </h3>
            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">
              Membantu dosen dalam mengajarkan praktikum matakuliah Internet
              dan Teknologi Web.
            </p>
          </li>
        </ol>
      </div>
    </div>
  </section>

  <!-- section laun -->
  <!-- <section class="px-10 md:max-w-screen-md mt-6 m-auto">
        <h2
          class="text-1xl font-extrabold underline underline-offset-8 decoration-black-500"
        >
          My Project
        </h2>
        <div class="mt-5 md:flex flex-wrap justify-between">
          <div
            class="max-w-sm mb-5 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-zinc-800 dark:border-zinc-700 md:w-[49%]"
          >
            <a href="#">
              <img
                class="rounded-t-lg"
                src="https://web.bhadrikais.my.id/img/project2.png"
                alt=""
              />
            </a>
            <div class="p-5">
              <a href="#">
                <h5
                  class="mb-2 text-1xl font-bold text-gray-900 dark:text-white"
                >
                  e-Absensi
                </h5>
              </a>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                e-Absensi adalah aplikasi untuk mengelola anggota OSIS secara
                effisien dan mudah.
              </p>
              <a
                href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-blue-800"
              >
                Read more
                <svg
                  class="w-3.5 h-3.5 ml-2"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 14 10"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9"
                  />
                </svg>
              </a>
            </div>
          </div>
          <div
            class="max-w-sm mb-5 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-zinc-800 dark:border-zinc-700 md:w-[49%]"
          >
            <a href="#">
              <img
                class="rounded-t-lg"
                src="https://web.bhadrikais.my.id/img/project2.png"
                alt=""
              />
            </a>
            <div class="p-5">
              <a href="#">
                <h5
                  class="mb-2 text-1xl font-bold text-gray-900 dark:text-white"
                >
                  e-Absensi
                </h5>
              </a>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                e-Absensi adalah aplikasi untuk mengelola anggota OSIS secara
                effisien dan mudah.
              </p>
              <a
                href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-blue-800"
              >
                Read more
                <svg
                  class="w-3.5 h-3.5 ml-2"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 14 10"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9"
                  />
                </svg>
              </a>
            </div>
          </div>
          <div
            class="max-w-sm mb-5 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-zinc-800 dark:border-zinc-700 md:w-[49%]"
          >
            <a href="#">
              <img
                class="rounded-t-lg"
                src="https://web.bhadrikais.my.id/img/project2.png"
                alt=""
              />
            </a>
            <div class="p-5">
              <a href="#">
                <h5
                  class="mb-2 text-1xl font-bold text-gray-900 dark:text-white"
                >
                  e-Absensi
                </h5>
              </a>
              <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                e-Absensi adalah aplikasi untuk mengelola anggota OSIS secara
                effisien dan mudah.
              </p>
              <a
                href="#"
                class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-indigo-700 rounded-lg hover:bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-blue-800"
              >
                Read more
                <svg
                  class="w-3.5 h-3.5 ml-2"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 14 10"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M1 5h12m0 0L9 1m4 4L9 9"
                  />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </section> -->
</div>
<?= $this->endSection(); ?>