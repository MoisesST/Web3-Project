<div class="flex mt-6 ">
  <div class="flex justify-around items-center h-14 w-full rounded bg-violet-500">
    <div title="Register Rolê">
      <a href="<?= URL_RAIZ . 'rolles/create' ?>">
        <i
          class="fa-solid fa-circle-plus text-xl text-black hover:text-white"
        ></i>
      </a>
    </div>
    <div title="Register City">
      <a href="<?= URL_RAIZ . 'cities/create' ?>">
        <i
          class="fa-solid fa-square-plus text-xl text-black hover:text-white"
        ></i>
      </a>
    </div>
    <div>
      <div title="Sort By City" class="flex items-center relative">
        <i
          class="fa-sharp fa-solid fa-map-location-dot w-6 text-xl text-black"
        ></i>
        <select
          id="cityId"
          name="cityId"
          class="absolute left-3 bg-transparent w-1 text-black text-xl h-6 outline-none rounded cursor-pointer"
        >
          <?php foreach ($cities as $city) : ?>
            <?php
              $selected = $this->getPost('cityId') == $city->getId()
                ? 'selected'
                : ''
            ?>
            <option value="<?= $city->getId() ?>" <?= $selected ?> >
              <?= $city->getName() ?>
            </option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div title="Sort By Highest Score">
      <button>
        <i class="fa-solid fa-star text-xl text-black hover:text-white"></i>
      </button>
    </div>
    <div title="Sort Alphabetically">
      <button>
        <i class="fa-solid fa-arrow-down-a-z text-xl text-black hover:text-white"></i>
      </button>
    </div>
  </div>
</div>

<?php foreach ($rolles as $rolle) : ?>
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
            <?= $rolle->getName() ?>
          </h1>
          <button class="w-8 h-8 ml-6 bg-red-400	rounded hover:bg-red-500 mr-4">
            <i class="fa-solid fa-trash-can text-black"></i>
          </button>
        </div>

        <div class="flex mt-2">
          <div class="flex-grow flex items-center  h-5 text-white">
            <i class="fa-solid fa-location-dot text-sm"></i>
            <div class="ml-1"> <?= $rolle->getCity() ?> </div>
          </div>
          <div class="flex items-center h-5 ml-6 text-white">
            <i class="fa-solid fa-clock text-sm"></i>
            <div class="ml-1"> <?= $rolle->getHorary() ?> </div>
          </div>
          <div class="flex items-center h-5 ml-6 text-white">
            <i class="fa-solid fa-star text-sm"></i>
            <div class="ml-1 mr-4"> <?= $rolle->getClassification() ?> </div>
          </div>
        </div>

        <div class="mt-6 mr-4">
          <p class="text-sm text-justify text-neutral-500">
            <?= $rolle->getDescription() ?>
          </p>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>

<div class="h-14"></div>
