<div class="border-2 border-neutral-500 mt-6 rounded">
  <div class="m-2 rounded">
    <div class="flex justify-around mb-6 py-6 text-black bg-violet-500 rounded">
      <div class="flex items-center">
        <i class="fa-solid fa-location-dot text-4xl"></i>
        <span class="mx-2 font-bold uppercase text-sm">Registered Cities :</span>
        <span class="font-bold"> <?= $totalCities ?> </span>
      </div>

      <div class="flex items-center">
        <i class="fa-solid fa-circle-plus text-4xl"></i>
        <span class="mx-2 font-bold uppercase text-sm">Registered Rolês :</span>
        <span class="font-bold"> <?= $totalRolles ?> </span>
      </div>

      <div title="Rolês In The Morning" class="flex items-center">
        <i class="fa-solid fa-sun text-4xl"></i>
        <span class="mx-2 font-bold uppercase text-sm">Morning :</span>
        <span class="font-bold"> <?= $totalHoraryMorning ?> </span>
      </div>

      <div title="Rolês At Night" class="flex items-center">
        <i class="fa-solid fa-moon text-4xl"></i>
        <span class="mx-2 font-bold uppercase text-sm">Night :</span>
        <span class="font-bold"> <?= $totalHoraryNight ?> </span>
      </div>
    </div>

    <div class="flex justify-around py-6 bg-violet-500 rounded">
      <div title="Total Rolês Rated 5 Stars" class="text-2xl text-black font-bold">
        <i class="fa-solid fa-star"></i>
        <span class="">5 :</span>
        <span class="text-xl"> <?= $totalHoraryClassification5 ?> </span>
      </div>
      <div title="Total Rolês Rated 4 Stars" class="text-2xl text-black font-bold">
        <i class="fa-solid fa-star"></i>
        <span class="">4 :</span>
        <span class="text-xl"> <?= $totalHoraryClassification4 ?> </span>
      </div>
      <div title="Total Rolês Rated 3 Stars" class="text-2xl text-black font-bold">
        <i class="fa-solid fa-star"></i>
        <span class="">3 :</span>
        <span class="text-xl"> <?= $totalHoraryClassification3 ?> </span>
      </div>
      <div title="Total Rolês Rated 2 Stars" class="text-2xl text-black font-bold">
        <i class="fa-solid fa-star"></i>
        <span class="">2 :</span>
        <span class="text-xl"> <?= $totalHoraryClassification2 ?> </span>
      </div>
      <div title="Total Rolês Rated 1 Stars" class="text-2xl text-black font-bold">
        <i class="fa-solid fa-star"></i>
        <span class="">1 :</span>
        <span class="text-xl"> <?= $totalHoraryClassification1 ?> </span>
      </div>
      <div title="Total Rolês Rated 0 Stars" class="text-2xl text-black font-bold">
        <i class="fa-solid fa-star"></i>
        <span class="">0 :</span>
        <span class="text-xl"> <?= $totalHoraryClassification0 ?> </span>
      </div>
    </div>
  </div>
</div>