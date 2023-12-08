<div class="container card w-25 mt-5">
    <h2>Login Page</h2>
    <form class="container" wire:submit.prevent="login">
        @csrf
        <div class="form-group">
            <label for="username">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email"
                wire:model.debounce.500ms="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" placeholder="Enter password"
                wire:model.debounce.500ms="password" required>
        </div>
        <button type="submit" class="btn btn-primary my-3">Login</button>
    </form>
    <div></div>

</div>
</div>
