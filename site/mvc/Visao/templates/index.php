<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= APLICACAO_NOME ?></title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
      integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <script src="https://cdn.tailwindcss.com"></script>
  </head>

  <body class="bg-black font-sans text-white">
    <header class="bg-black w-full h-14 flex justify-center items-center">

      <div class="flex bg-black w-4/5 h-14 border-b-2 border-neutral-500">
        <nav class="flex items-center w-3/4">
          <ul class="flex">
            <li class="mr-6 uppercase hover:text-violet-500 cursor-pointer">
             <a href="<?= URL_RAIZ?>">Home</a>
            </li>
            <li class="mr-6 uppercase hover:text-violet-500 cursor-pointer">
              <a href="<?= URL_RAIZ . 'report' ?>">Report</a>
            </li>
          </ul>
        </nav>

        <div class="flex items-center justify-end w-2/5 text-black">
          <?php if ($this->isLoggedIn() === null) : ?>
            <a
              class="w-16 ml-6 text-center text-sm font-medium hover:text-white bg-white hover:bg-violet-500 rounded outline-none"
              href="<?= URL_RAIZ . 'sign-in' ?>"
            >
               Sign in
            </a>

            <a
              class="w-16 ml-6 text-center text-sm font-medium hover:text-white bg-white hover:bg-violet-500 rounded outline-none"
              href="<?= URL_RAIZ . 'users/create' ?>"
            >
               Sign up
            </a>
          <?php else : ?>
            <form
              action="<?= URL_RAIZ . 'sign-in' ?>"
              method="post"
              class="flex"
            >
              <input type="hidden" name="_metodo" value="DELETE">
              <a
                class="w-16 ml-6 text-center text-sm font-medium hover:text-white bg-white hover:bg-violet-500 rounded outline-none"
                onclick="event.preventDefault();
                this.parentNode.submit()"
              >
                Sign out
              </a>
            </form>
          <?php endif ?>
        </div>
      </div>
    </header>

    <main class="flex justify-center w-full bg-black">
      <div class="w-4/5">
        <div class="flex justify-center items-center h-14 mt-6">
          <h1 class="text-3xl	font-bold uppercase">Rollês List</h1>
        </div>

        <?php $this->imprimirConteudo() ?>
      </div>
    </main>
  </body>
</html>
