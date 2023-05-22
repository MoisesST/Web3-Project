<?php if ($this->temErro($field)): ?>
  <div class="mb-6">
    <span class="text-red-200">
      <?= $this->getErro($field) ?>
    </span>
  </div>
<?php endif ?>