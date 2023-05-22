<?php if ($this->temErro($field)): ?>
  <div class="my-1 text-sm">
    <span class="text-red-200">
      <?= $this->getErro($field) ?>
    </span>
  </div>
<?php endif ?>