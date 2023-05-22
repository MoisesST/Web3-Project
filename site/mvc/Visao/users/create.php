<div class="flex justify-center items-center  mt-6  rounded">
  <div class="w-1/2 h-4/5 p-6 border-2 border-neutral-500 rounded">
    <form action="<?= URL_RAIZ . 'users' ?>" method="post">
      <label
        for="name"
        class="flex flex-col mb-6 text-xl
          <?= $this->getHighlightedErrorLabelCss('name') ?>"
      >
        Name *
        <input
          id="name"
          name="name"
          value="<?= $this->getPost('name') ?>"
          type="text"
          placeholder="Enter your name"
          class="flex w-full mt-2 p-2 text-black outline-none rounded
            <?= $this->getHighlightedErrorInputCss('name') ?>"
        >
        <?php
          $this->incluirVisao('util/formErro.php', ['field' => 'name'])
        ?>
      </label>

      <label
        for="email"
        class="flex flex-col mb-6 text-xl
          <?= $this->getHighlightedErrorLabelCss('email') ?>"
      >
        Email *
        <input
          id="email"
          name="email"
          value="<?= $this->getPost('email') ?>"
          type="email"
          placeholder="Enter your email "
          class="flex w-full mt-2 p-2 text-black outline-none rounded
            <?= $this->getHighlightedErrorInputCss('email') ?>"
        >
        <?php
          $this->incluirVisao('util/formErro.php', ['field' => 'email'])
        ?>
      </label>

      <label
        for="password"
        class="flex flex-col mb-6 text-xl
          <?= $this->getHighlightedErrorLabelCss('password') ?>"
      >
        Password *
        <input
          id="password"
          name="password"
          type="password"
          placeholder="Enter your password "
          class="flex w-full mt-2 p-2 text-black outline-none rounded
            <?= $this->getHighlightedErrorInputCss('password') ?>"
        >
        <?php
          $this->incluirVisao('util/formErro.php', ['field' => 'password'])
        ?>
      </label>

      <button class="w-full p-2 bg-violet-500 hover:bg-violet-700 rounded">
        Sign Up
      </button>
    </form>
  </div>
</div>
<div class="h-14"></div>
