<div class="flex justify-center items-center  mt-6  rounded">
  <div class="w-1/2 h-4/5 p-6 border-2 border-neutral-500 rounded">
    <form action="<?= URL_RAIZ . 'sign-in' ?>" method="post">
      <label
        for="email"
        class="flex flex-col mb-6 text-xl
          <?= $this->getHighlightedErrorLabelCss('sign-in') ?>"
      >
        Email *
        <input
          id="email"
          name="email"
          value="<?= $this->getPost('email') ?>"
          type="email"
          placeholder="Enter your email"
          class="flex w-full mt-2 p-2 text-black outline-none rounded
            <?= $this->getHighlightedErrorInputCss('sign-in') ?>"
        >
      </label>

      <label
        for="password"
        class="flex flex-col mb-6 text-xl
          <?= $this->getHighlightedErrorLabelCss('sign-in') ?>"
      >
        Password *
        <input
          id="password"
          name="password"
          type="password"
          placeholder="Enter your password"
          class="flex w-full mt-2 p-2 text-black outline-none rounded
            <?= $this->getHighlightedErrorInputCss('sign-in') ?>"
        >
      </label>

      <div class="flex justify-center items-center">
        <?php
          $this->incluirVisao('util/formErro.php', ['field' => 'sign-in'])
        ?>
      </div>

      <button class="w-full p-2 bg-violet-500 hover:bg-violet-700 rounded">
        Sign in
      </button>
    </form>
  </div>
</div>