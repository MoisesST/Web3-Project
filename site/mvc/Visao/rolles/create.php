<div class="flex justify-center mt-6 rounded">
  <div class="w-1/2 mb-16 p-6 text-xl border-2 border-neutral-500 rounded">
    <form
      action="<?= URL_RAIZ . 'rolles' ?>"
      method="post"
      enctype="multipart/form-data"
    >
      <label for="name" class="flex flex-col mb-6">
        Name *
        <input
          id="name"
          name="name"
          type="text"
          placeholder="Enter rolê name"
          class="flex w-full mt-2 p-2 text-black outline-none rounded"
        >
      </label>

      <label for="description" class="flex flex-col mb-6">
        Description *
        <textarea
          id="description"
          name="description"
          type="text"
          placeholder="Enter rolê name"
          rows="2"
          maxlength="800"
          class="mt-2 p-2 text-black outline-none rounded"
        ></textarea>
      </label>

      <label>
        <div class="flex items-center justify-between mb-6">
          <div class="flex">
            <label for="" class="flex flex-col">
              City *
              <select name="city" id="city" class="mt-2 text-black outline-none rounded">
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
            </label>
          </div>

          <div >
            <label for="horary" class="flex flex-col">
              Horary *
              <select name="horary" id="horary" class="mt-2 text-black outline-none rounded">
                <option value="1">Morning</option>
                <option value="0">Night</option>
              </select>
            </label>
          </div>

          <div>
            <label for="classification" class="flex flex-col">
              Classification *
              <select name="classification" id="classification" class="mt-2 text-black outline-none rounded">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </label>
          </div>
        </div>
      </label>

      <label for="image" class="flex flex-col mb-6">
        Image *
        <input class="mt-2" type="file" id="image" name="image" accept="image/png, image/jpeg">
      </label>

      <button class="w-full p-2 bg-violet-500 hover:bg-violet-700 rounded">
        Register
      </button>
    </form>
  </div>
</div>
<div class="h-14"></div>