<div class="d-flex align-items-center mt-5">
    <div class="container card w-50">
        <h2 class="my-4 d-flex justify-content-center">Rejester Page</h2>
        <div class=" d-flex justify-content-center mb-4">
            <form class="w-75 " wire:submit.prevent="sign_up">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" required placeholder="Enter your name"
                        wire:model.debounce.500ms="name">
                    @error('name')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" required placeholder="Enter your email"
                        wire:model.debounce.500ms="email">
                    @error('email')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" required
                        placeholder="Enter your password" wire:model.debounce.500ms="password">
                    @error('passowrd')
                        <span class="error text-danger">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group">
                    <label for="re_password">Password:</label>
                    <input type="password" class="form-control" id="re_password" required
                        placeholder="ReEnter your password" wire:model.debounce.500ms="re_password">
                </div>
                <button type='submit' class="btn btn-primary mt-2">Sign Up</button>
            </form>
        </div>
    </div>
</div>
