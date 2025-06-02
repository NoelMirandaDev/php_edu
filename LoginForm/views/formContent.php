
<?php if ($error): ?>
    <p class="text-danger bg-danger-subtle w-25 text-center"><?=htmlspecialchars($error)?></p>
<?php endif; ?>

<form method="POST" action="<?=$baseURI?>" class="d-flex justify-content-center mt-5 container">
    <div class="d-flex flex-column border p-4 rounded shadow-sm bg-light container" style="max-width: 600px;">
        <input type="hidden" name="csrf_token" value="<?=$_SESSION['csrf_token']?>"/>

        <div class="p-2">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" required />
        </div>

        <div class="p-2 mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required />
        </div>
        <button type="submit" class="btn btn-primary w-25 m-auto">Login</button>
    </div>
</form>
