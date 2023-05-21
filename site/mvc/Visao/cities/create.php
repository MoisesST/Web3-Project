<div class="flex justify-center items-center h-14 mt-6">
  <h1 class="text-3xl	font-bold uppercase"> <?= $title ?> </h1>
</div>

<div class="flex justify-center my-6">
  <?php if ($message) : ?>
    <div
      id="container"
      class="flex items-center w-1/2 h-12 text-green-800 bg-green-200 rounded"
    >
      <button
        id="close"
        onclick="handleCloseMessage()"
        class="mx-6 hover:text-black"
      >
        <i class="fa-solid fa-xmark"></i>
      </button>
      <div class="flex grow">
        <?= $message ?>
      </div>
    </div>
  <?php endif ?>
</div>

<div class="flex justify-center">
  <div class="w-1/2 h-4/5 p-6 border-2 border-neutral-500 rounded">
    <form action="<?= URL_RAIZ . 'cities' ?>" method="post">
      <label for="city" class="flex flex-col mb-6 text-xl">
        City *
        <input
          id="name" name="name" type="text" placeholder="Enter city name"
          class="flex w-full mt-2 p-2 text-black outline-none rounded"
        >
      </label>
      <button class="w-full p-2 bg-violet-500 hover:bg-violet-700 rounded">
        Register
      </button>
    </form>
  </div>
</div>