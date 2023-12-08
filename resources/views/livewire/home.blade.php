<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse d-flex justify-content-between container" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="navbar-brand p-2">eCommerce</a>
                </li>


            </ul>

            @if (\Auth::check())
                <div>
                    @if (Auth::user()->level >= 2)
                        <button href="/dashbord/product" wire:navigate class="btn btn-primary">Dashbord</button>
                    @endif
                    <button data-bs-toggle="modal" data-bs-target="#logout" class="btn btn-danger">Logout</button>
                </div>
                {{-- @else --}}
                {{-- <button class="btn btn-danger">Logout</button> --}}
            @endif
            @if (!\Auth::check())
                <div>

                    <button href="/login" wire:navigate class="btn btn-primary">Login</button>
                    <button href="/sign_up" wire:navigate class="btn ">Sing Up</button>

                </div>
            @endif
        </div>
    </nav>
    <div class="container row ">
        <div class=" col-3 ">
            <div class="">
                <div class="sidebar  ">

                    {{-- <div class="widget"> --}}




                    <div class="widget border-right">
                        <div class="widget-title widget-collapse">
                            <h6>Offered Salary</h6>
                            <a class="ml-auto" data-toggle="collapse" href="#Offeredsalary" role="button"
                                aria-expanded="false" aria-controls="Offeredsalary"> <i class="fas fa-chevron-down"></i>
                            </a>
                        </div>
                        <div class="collapse show" id="Offeredsalary">

                            <div wire:change='change_salary(200)' class="custom-control custom-checkbox">
                                <input name='price_radio' type="radio" class="custom-control-input"
                                    id="Offeredsalary1">
                                <label class="custom-control-label" for="Offeredsalary1" value='200'>Less than
                                    200$</label>
                            </div>
                            <div wire:change='change_salary(300)' class="custom-control custom-checkbox">
                                <input name='price_radio' type="radio" class="custom-control-input"
                                    id="Offeredsalary2">
                                <label class="custom-control-label" for="Offeredsalary2" value='300'>Less than
                                    300$</label>
                            </div>
                            <div wire:change='change_salary(400)' class="custom-control custom-checkbox">
                                <input name='price_radio' type="radio" class="custom-control-input"
                                    id="Offeredsalary3">
                                <label class="custom-control-label" for="Offeredsalary3" value='400'>Less than
                                    400$</label>
                            </div>
                            <div wire:change='change_salary(500)' class="custom-control custom-checkbox">
                                <input name='price_radio' type="radio" class="custom-control-input"
                                    id="Offeredsalary4">
                                <label class="custom-control-label" for="Offeredsalary4" value='500'>Less than
                                    500$</label>
                            </div>
                            <div wire:change='change_salary(600)' class="custom-control custom-checkbox">
                                <input name='price_radio' type="radio" class="custom-control-input"
                                    id="Offeredsalary5">
                                <label class="custom-control-label" for="Offeredsalary5" value='600'>Less than
                                    600$</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget border-0">
                    <div class="widget-add">
                        <img class="img-fluid" src="images/add-banner.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="row mb-4">

            </div>
            <div class="job-filter mb-4 d-sm-flex align-items-center">

                <div class="job-shortby ml-sm-auto d-flex align-items-center">

                    <select wire:model='page_category' wire:change='change_category' class="form-select"
                        aria-label="Default select example">
                        <option value='null' selected>Select category</option>
                        @foreach ($categorys as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class="row">

                @foreach ($products as $product)
                    <div class="col-sm-6 col-lg-4 mb-4">
                        <div class="candidate-list candidate-grid border">
                            <div class="candidate-list-image">
                                <img class="img-fluid" src="{{ url('storage/uploads/' . $product->poster) }}"
                                    alt="">
                            </div>
                            <div class="candidate-list-details container">
                                <div class="candidate-list-info">
                                    <div class="candidate-list-title">
                                        <h5>
                                            <p class="fs-4">{{ $product->name }}</p>
                                        </h5>
                                    </div>
                                    <div class="candidate-list-option">
                                        <ul class="list-unstyled">
                                            <p>{{ $product->description }}</p>
                                        </ul>
                                    </div>
                                </div>
                                <div class=" d-flex flex-row-reverse bd-highlight">

                                    <span class="candidate-list-time order-1 mb-2">{{ $product->price }} <i
                                            class="fa-regular fa-dollar-sign" style="color: #003185;"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="row">
                <div class="col-12 text-center mt-4 mt-sm-5">
                    <ul class="pagination justify-content-center mb-0">

                        @for ($i=1; $i < $product_lenth+2 ; $i++)
                        <li class="page-item" wire:click='change_page({{$i}})'><div class="page-link" href="#">{{$i}}</div></li>

                        @endfor

                    </ul>
                </div>
            </div>
        </div>
    </div>
            <div wire:ignore.self class="modal fade" id="logout" tabindex="-1"
                aria-labelledby="edit_productLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Do you want to logout ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" wire:click='logout' class="btn btn-danger"
                                data-bs-dismiss="modal">logout</button>
                        </div>
                    </div>
                </div>
            </div>
</div>
</div>

