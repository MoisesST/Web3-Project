<div class="flex justify-center mt-6 rounded">
  <div class="w-1/2 h-4/5 p-6 border-2 border-neutral-500 rounded">
    <form action="<?= URL_RAIZ . 'cities' ?>" method="post">
      <?php if ($mensagem) : ?>
        <div class="h-2 bg-violet-500">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?= $mensagem ?>
        </div>
      <?php endif ?>

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