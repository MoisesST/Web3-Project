<div class="flex justify-center">
  <div class="w-1/2 h-4/5 p-6 border-2 border-neutral-500 rounded">
    <form action="<?= URL_RAIZ . 'cities' ?>" method="post">
      <label
        for="city"
        class="flex flex-col mb-6 text-xl
          <?= $this->getHighlightedErrorLabelCss('name') ?>"
      >
        City *
        <input
          id="name"
          name="name"
          value="<?= $this->getPost('name') ?>"
          type="text"
          placeholder="Enter city name"
          class="flex w-full mt-2 p-2 text-black outline-none rounded
            <?= $this->getHighlightedErrorInputCss('name') ?>"
        >
        <?php
          $this->incluirVisao('util/formErro.php', ['field' => 'name'])
        ?>
      </label>
      <button class="w-full p-2 bg-violet-500 hover:bg-violet-700 rounded">
        Register
      </button>
    </form>
  </div>
</div>