<div class="flex mt-6 ">
  <form
    method="get"
    class="flex justify-around items-center h-14 w-full bg-violet-500 rounded"
  >
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
      <div title="Sort By City">
        <span class="text-black text-xl font-bold uppercase">Filter</span>
        <select
          id="city"
          name="city"
          class="w-36 text-black text-xl text-clip outline-none rounded ml-2
            cursor-pointer
            <?= $this->getHighlightedErrorInputCss('city') ?>"
        >
          <option value="">---</option>
          <?php foreach ($cities as $city) : ?>
            <?php
              $selected = $this->getGet('city') == $city->getId()
                ? 'selected'
                : ''
            ?>
            <option value="<?= $city->getId() ?>" <?= $selected ?> >
              <?= $city->getName() ?>
            </option>
          <?php endforeach ?>
        </select>
        <?php
          $this->incluirVisao('util/formErro.php', ['field' => 'city'])
        ?>
      </div>
    </div>

    <button
      title="Search"
      class="px-2 py-1 bg-black hover:text-black hover:bg-violet-500 rounded"
    >
      <i class="fa-solid fa-magnifying-glass"></i>
    </button>
  </form>
</div>

<?php if (empty($rolles)) : ?>
  <div
    class="w-full mt-6 p-6 text-yellow-900 border-2 border-yellow-900
      bg-yellow-200 rounded"
  >
    <span class="">No rolle found in this city.</span>
  </div>
<?php endif ?>


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
        <div
          class="flex justify-between items-center h-14 bg-black text-white"
        >
          <h1 class="text-2xl font-semibold truncate">
          <?= $rolle->getName() ?>
          </h1>

          <form
            action="<?= URL_RAIZ . 'rolles/' . $rolle->getId() ?>"
            method="post"
          >
            <input type="hidden" name="_metodo" value="DELETE">
              <button
                class="w-8 h-8 ml-6 bg-red-400 hover:bg-red-500 rounded"
              >
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

<div
  class="flex justify-between w-full mt-6 text-black text-xl
    font-bold uppercase"
>
  <?php if ($page > 1) : ?>
    <div class="flex justify-center items-center w-1/3 h-14 bg-violet-500
      hover:bg-white rounded"
    >
      <i class="fa-solid fa-arrow-left mr-4"></i>
      <a href="
          <?=
            URL_RAIZ . 'rolles?p=' . ($page-1) . '&city=' .
              $this->getGet('city')
          ?>
        "> Previous page
      </a>
    </div>
  <?php endif ?>
  <?php if ($page < $lastPage) : ?>
    <div
      class="flex justify-center items-center w-1/3 h-14 bg-violet-500
        hover:bg-white rounded"
    >
      <a href="
          <?=
            URL_RAIZ . 'rolles?p=' . ($page+1) . '&city=' .
              $this->getGet('city')
          ?>
        "> Next page
      </a>
      <i class="fa-solid fa-arrow-right ml-4"></i>
    </div>
  <?php endif ?>
</div>

<div class="h-14"></div>
