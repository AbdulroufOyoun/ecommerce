<div>
    @include('adminl_nav')
    <div class="d-flex mt-5 mb-5">

        @include('admin_sidebar')
        <div class="container  mt-5">
            <div class="d-flex justify-content-center">
                <div class="row w-100">
                    <div class="col-lg-6">
                        <!-- Default Card Admins -->
                        <div class="card mb-4">
                            <div class="card-header">Admins</div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Admin email</th>
                                            <th scope="col">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admins as $admin)
                                            <tr *ngFor="let admins of admin">
                                                <th scope="row">{{ $admin->id }}</th>
                                                <td>{{ $admin->email }}</td>
                                                <td wire:click="user_email('{{ $admin->email }}')">

                                                    @if (Auth::user()->level > 2 && Auth::user()->id != $admin->id)
                                                        <a class="btn btn-danger"
                                                            wire:click="user_id({{ $admin->id }})"
                                                            data-bs-toggle="modal" data-bs-target="#drop_user">Drop</a>
                                                    @endif

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">Users</div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">User email</th>
                                            <th scope="col" class="w-25">Make an Admin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <th scope="row">{{ $user->id }}</th>
                                                <td>{{ $user->email }}</td>
                                                @if (Auth::user()->level > 2)
                                                    <td wire:click="user_email('{{ $user->email }}')">
                                                        <button class="btn btn-primary"
                                                            wire:click="user_id({{ $user->id }})"
                                                            data-bs-toggle="modal" data-bs-target="#update_user">Upgrade
                                                        </button>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div wire:ignore.self class="modal fade" id="drop_user" tabindex="-1" aria-labelledby="drop_userLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to delete " {{ $useremail }} " ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" wire:click='drop_admin' class="btn btn-danger"
                                data-bs-dismiss="modal">delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div wire:ignore.self class="modal fade" id="update_user" tabindex="-1" aria-labelledby="update_userLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to make " {{ $useremail }} " an admin ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" wire:click='update_user' class="btn btn-primary"
                                data-bs-dismiss="modal">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
