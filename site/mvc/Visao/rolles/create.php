<div class="flex justify-center mt-6 rounded">
  <div class="w-1/2 mb-16 p-6 text-xl border-2 border-neutral-500 rounded">
    <form
      action="<?= URL_RAIZ . 'algumacoisa' ?>"
      method="post" class=""
    >
      <label for="name" class="flex flex-col mb-6">
        Name *
        <input id="name" type="text" placeholder="Enter rolê name " class="flex w-full mt-2 p-2 text-black outline-none rounded">
      </label>
      <label for="description" class="flex flex-col mb-6">
        Description *
        <textarea name="description" id="description" rows="2" maxlength="800" class="mt-2 text-black outline-none rounded"></textarea>
      </label>
      <label class="">
        <div class="flex items-center justify-between mb-6">
          <div class="flex">
            <label for="" class="flex flex-col">
              City *
              <select name="city" id="city" class="mt-2 text-black outline-none rounded">
                <option value="GP" class="">Guarapuava</option>
                <option value="SP" class="">São Paulo</option>
                <option value="BA" class="">Baia</option>
                <option value="RJ" class="">Rio de Janeiro</option>
              </select>
            </label>
          </div>
          <div class="">
            <label for="horary" class="flex flex-col">
              Horary *
              <select name="horary" id="horary" class="mt-2 text-black outline-none rounded">
                <option value="morning" class="">Morning</option>
                <option value="night" class="">Night</option>
              </select>
            </label>
          </div>
          <div class="">
            <label for="classification" class="flex flex-col">
              Classification *
              <select name="classification" id="classification" class="mt-2 text-black outline-none rounded">
                <option value="0" class="">0</option>
                <option value="1" class="">1</option>
                <option value="2" class="">2</option>
                <option value="3" class="">3</option>
                <option value="4" class="">4</option>
                <option value="5" class="">5</option>
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