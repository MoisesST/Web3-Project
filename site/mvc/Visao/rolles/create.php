<div class="flex justify-center mt-6 rounded">
  <div class="w-1/2 mb-16 p-6 text-xl border-2 border-neutral-500 rounded">
    <form
      action="<?= URL_RAIZ . 'rolles' ?>"
      method="post"
      enctype="multipart/form-data"
    >
      <label
        class="flex flex-col mb-6
          <?= $this->getHighlightedErrorLabelCss('name') ?>"
      >
        Name *
        <input
          id="name"
          name="name"
          value="<?= $this->getPost('name') ?>"
          autofocus
          type="text"
          placeholder="Enter rolê name"
          class="flex w-full mt-2 p-2 text-black outline-none rounded
            <?= $this->getHighlightedErrorInputCss('name') ?>"
        >
        <?php
          $this->incluirVisao('util/formErro.php', ['field' => 'name'])
        ?>
      </label>

      <label
        class="flex flex-col mb-6
          <?= $this->getHighlightedErrorLabelCss('description') ?>"
      >
        Description *
        <textarea
          id="description"
          name="description"
          type="text"
          placeholder="Enter rolê name"
          rows="2"
          maxlength="800"
          class="mt-2 p-2 text-black outline-none rounded
            <?= $this->getHighlightedErrorInputCss('description') ?>"
        ><?= $this->getPost('description') ?></textarea>
        <?php
          $this->incluirVisao('util/formErro.php', ['field' => 'description'])
        ?>
      </label>

      <label>
        <div class="flex items-center justify-between mb-6">
          <div class="flex">
            <label
              class="flex flex-col
                <?= $this->getHighlightedErrorLabelCss('city') ?>"
            >
              City *
              <select
                id="city"
                name="city"
                class="mt-2 text-black outline-none rounded
                  <?= $this->getHighlightedErrorInputCss('city') ?>"
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
              <?php
                $this->incluirVisao('util/formErro.php', ['field' => 'city'])
              ?>
            </label>
          </div>

          <div>
            <label
              for="horary"
              class="flex flex-col
                <?= $this->getHighlightedErrorLabelCss('horary') ?>"
            >
              Horary *
              <select
                id="horary"
                name="horary"
                class="mt-2 text-black outline-none rounded
                  <?= $this->getHighlightedErrorInputCss('horary') ?>"
              >
                <?php foreach ($schedules as $value => $horary) : ?>
                  <option
                    value="<?= $value ?>"
                    <?= $this->getPost('horary') == $value ? 'selected' : '' ?>
                  ><?= $horary ?></option>
                <?php endforeach ?>
              </select>
              <?php
                $this->incluirVisao('util/formErro.php', ['field' => 'horary'])
              ?>
            </label>
          </div>

          <div>
            <label
              for="classification"
              class="flex flex-col
                <?= $this->getHighlightedErrorLabelCss('classification') ?>"
            >
              Classification *
              <select
                id="classification"
                name="classification"
                class="mt-2 text-black outline-none rounded
                  <?= $this->getHighlightedErrorInputCss('classification') ?>"
              >
              <?php for ($i = 0; $i <= 5; $i++) : ?>
                <option
                  <?= $this->getPost('classification') == $i
                    ? 'selected'
                    : '' ?>
                ><?= $i ?></option>
              <?php endfor ?>
              </select>
              <?php
                $this->incluirVisao('util/formErro.php',
                  ['field' => 'classification'])
              ?>
            </label>
          </div>
        </div>
      </label>

      <label
        for="image"
        class="flex flex-col mb-6
          <?= $this->getHighlightedErrorLabelCss('image') ?>"
      >
        Image *
        <input
          id="image"
          name="image"
          type="file"
          accept="image/png, image/jpeg"
          class="mt-2
            <?= $this->getHighlightedErrorInputCss('image') ?>"
        >
        <?php
          $this->incluirVisao('util/formErro.php', ['field' => 'image'])
        ?>
      </label>

      <button class="w-full p-2 bg-violet-500 hover:bg-violet-700 rounded">
        Register
      </button>
    </form>
  </div>
</div>
<div class="h-14"></div>