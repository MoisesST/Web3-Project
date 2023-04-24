<div class="flex mt-6 ">
  <div class="flex justify-around items-center h-14 w-full rounded bg-violet-500">
    <div title="Register Rolê" class="">
      <a href="<?= URL_RAIZ . 'rolles' ?>">
        <i class="fa-solid fa-circle-plus text-xl text-black hover:text-white"></i>
      </a>
    </div>
    <div title="Register City" class="">
      <a href="<?= URL_RAIZ . 'cities' ?>">
        <i class="fa-solid fa-square-plus text-xl text-black hover:text-white"></i>
      </a>
    </div>
    <div class="">
      <div title="Sort By City" class="flex items-center relative">
        <i class="fa-sharp fa-solid fa-map-location-dot w-6 text-xl text-black"></i>
        <select class="absolute left-3 bg-transparent w-1 text-black text-xl h-6 outline-none rounded cursor-pointer">
          <option value="select" selected>Select</option>
          <option value="guarapuava">Guarapuava</option>
          <option value="bahia">Bahia</option>
          <option value="acre">Acre</option>
        </select>
      </div>
    </div>
    <div title="Sort By Highest Score" class="">
      <button>
        <i class="fa-solid fa-star text-xl text-black hover:text-white"></i>
      </button>
    </div>
    <div title="Sort Alphabetically" class="">
      <button>
        <i class="fa-solid fa-arrow-down-a-z text-xl text-black hover:text-white"></i>
      </button>
    </div>
  </div>
</div>

<div class="border-2 border-neutral-500 mt-6 rounded">
  <div class="flex h-72 m-2 rounded">
    <div class="h-full rounded">
      <img
        class="h-full rounded"
        src="https://s2.glbimg.com/F7yvdswolNWTG-FHLQdJNiLMelI=/0x0:1600x1200/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2020/t/7/1Fm9BwQ4GgQL5g7ZGblg/shopping.jpg">
      </img>
    </div>

    <div class="w-6"></div>

    <div class="flex-grow h-full w-2/4">
      <div class="flex justify-between items-center h-14 bg-black text-white">
        <h1 class="text-2xl font-semibold">
          Shopping Cidade dos Lagos
        </h1>
        <button class="w-8 h-8 ml-6 bg-red-400	rounded hover:bg-red-500 mr-4">
          <i class="fa-solid fa-trash-can text-black"></i>
        </button>
      </div>

      <div class="flex mt-2">
        <div class="flex-grow flex items-center  h-5 text-white">
          <i class="fa-solid fa-location-dot text-sm"></i>
          <div class="ml-1">Guarapuava</div>
        </div>
        <div class="flex items-center h-5 ml-6 text-white">
          <i class="fa-solid fa-clock text-sm"></i>
          <div class="ml-1">Morning</div>
        </div>
        <div class="flex items-center h-5 ml-6 text-white">
          <i class="fa-solid fa-star text-sm"></i>
          <div class="ml-1 mr-4">5</div>
        </div>
      </div>

      <div class="mt-6 mr-4">
        <p class="text-sm text-justify text-neutral-500">
          Contrary to popular belief, Lorem Ipsum is not simply random text
          It has roots in a piece of classical Latin literature from 45 BC
          making it over 2000 years old.
          Richard McClintock, a Latin professor at Hampden-Sydney College
          looked up one of the more obscure Latin words, consectetur, from
          comes from a line in section 1.10.32.
          Richard McClintock, a Latin professor at Hampden-Sydney College
          looked up one of the more obscure Latin words, consectetur, from
          comes from a line in section 1.10.32.
          looked up one of the more obscure Latin words, consectetur, from
          comes from a line in section 1.10.32.
          looked up one of the more obscure Latin words, consectetur, from
          comes from a line in section 1.10.32.
        </p>
      </div>
    </div>
  </div>
</div>