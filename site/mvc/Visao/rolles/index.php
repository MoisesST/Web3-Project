<div class="flex justify-center items-center h-14 mt-6">
  <h1 class="text-3xl	font-bold uppercase"> <?= $title ?> </h1>
</div>

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
              $selected = $this->getPost('city') == $city->getId()
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

<div class="flex justify-center my-6">
  <?php if ($successfullyDeleteMessage || $errorDeleteMessage) : ?>
    <div
      id="container"
      class="flex items-center w-full h-12 <?= $successfullyDeleteMessage ? "text-green-800 bg-green-200" : "text-red-800 bg-red-200" ?> rounded"
    >
      <button
        id="close"
        onclick="handleCloseMessage()"
        class="mx-6 hover:text-black"
      >
        <i class="fa-solid fa-xmark"></i>
      </button>
      <div class="flex grow">
        <?= $successfullyDeleteMessage ? $successfullyDeleteMessage : $errorDeleteMessage ?>
      </div>
    </div>
  <?php endif ?>
</div>

<?php foreach ($rolles as $rolle) : ?>
  <div class="border-2 border-neutral-500 mt-6 rounded">
    <div class="flex h-72 ml-2 my-2 rounded">
      <div class="h-full rounded">
        <img
          src="<?= URL_IMG . $rolle->getImage() ?>"
          alt="Imagem do rolle"
          class="h-full rounded"
        >
      </div>

      <div class="flex-grow h-full w-2/4 mx-4">
        <div class="flex justify-between items-center h-14 bg-black text-white">
          <h1 class="text-2xl font-semibold">
            <?= $rolle->getName() ?>
          </h1>

          <form
            action="<?= URL_RAIZ . 'rolles/' . $rolle->getId() ?>"
            method="post"
          >
            <input type="hidden" name="_metodo" value="DELETE">
              <button class="w-8 h-8 ml-6 bg-red-400 hover:bg-red-500 rounded">
                <i class="fa-solid fa-trash-can text-black"></i>
              </button>
          </form>
        </div>

        <div class="flex mt-2">
          <div class="flex-grow flex items-center  h-5 text-white">
            <i class="fa-solid fa-location-dot text-sm"></i>
            <div class="ml-1"> <?= $rolle->getCityId() ?> </div>
          </div>
          <div class="flex items-center h-5 ml-6 text-white">
            <i class="fa-solid fa-clock text-sm"></i>
            <div class="ml-1"> <?= $rolle->getHorary() ?> </div>
          </div>
          <div class="flex items-center h-5 ml-6 text-white">
            <i class="fa-solid fa-star text-sm"></i>
            <div class="ml-1"> <?= $rolle->getClassification() ?> </div>
          </div>
        </div>

        <div class="mt-6 mr-">
          <p class="text-sm text-justify break-all text-neutral-500">
            <?= $rolle->getDescription() ?>
          </p>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>

<div class="h-14"></div>
