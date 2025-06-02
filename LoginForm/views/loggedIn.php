<p class="m-4">Hello, <?=$sanitizedInputs['username'] ? $sanitizedInputs['username'] : 'stranger'?>!</p>
<p class="m-4 text-decoration-underline">User Inputs: </p>
<?php foreach ($sanitizedInputs as $key => $input): ?>
    <p class="m-5"><span class="fw-bold"><?=$key?>:</span> <?=$input?></p>
<?php endforeach; ?>
<a href="<?=$baseURI?>" class="d-flex flex-column text-center mt-3">Log Out</a>