<div class="flex justify-center items-center h-14 mt-6">
  <h1 class="text-3xl	font-bold uppercase"> <?= $title ?> </h1>
</div>

<div class="flex justify-center my-6">
  <?php if ($successMessage) : ?>
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
        <?= $successMessage ?>
      </div>
    </div>
  <?php endif ?>
</div>

<div class="flex justify-center items-center  mt-6  rounded">
  <div class="w-1/2 h-4/5 p-6 border-2 border-neutral-500 rounded">
    <form action="<?= URL_RAIZ . 'users' ?>" method="post">
      <label for="name" class="flex flex-col mb-6 text-xl">
        Name *
        <input
          id="name"
          name="name"
          type="text"
          placeholder="Enter your name"
          class="flex w-full mt-2 p-2 text-black outline-none rounded"
        >
      </label>

      <label for="email" class="flex flex-col mb-6 text-xl">
        Email *
        <input
          id="email"
          name="email"
          type="email"
          placeholder="Enter your email "
          class="flex w-full mt-2 p-2 text-black outline-none rounded"
        >
      </label>

      <label for="password" class="flex flex-col mb-6 text-xl">
        Password *
        <input
          id="password"
          name="password"
          type="password"
          placeholder="Enter your password "
          class="flex w-full mt-2 p-2 text-black outline-none rounded"
        >
      </label>

      <button class="w-full p-2 bg-violet-500 hover:bg-violet-700 rounded">
        Sign Up
      </button>
    </form>
  </div>
</div>
<div class="h-14"></div>
