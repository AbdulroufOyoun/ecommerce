  <div id="content-wrapper ">
      @include('adminl_nav')
      <div class="d-flex mt-5 mb-5">

          @include('admin_sidebar')
          <div class="container mt-5">
              <div class="btn btn-lg btn-outline-primary " data-bs-toggle="modal" data-bs-target="#add_product">Add
                  Product</div>
              <div class="row">
                  <div class="col-lg-12">
                      <div class="main-box clearfix">
                          <div class="table-responsive">
                              <table class="table user-list">
                                  <thead>
                                      <tr>
                                          <th><span>Product</span>
                                          </th>
                                          <th><span>price</span></th>
                                          <th class="text-center"><span>Edit</span></th>
                                          <th><span>Delete</span></th>
                                          <th>&nbsp;</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($products as $product)
                                          <tr>
                                              <td>
                                                  <img style="width: 77px"
                                                      src="{{ url('storage/uploads/' . $product->poster) }}"
                                                      alt="">
                                                  <a href="#" class="btn btn-light">{{ $product->name }}</a>
                                                  <span class="">{{ $product->description }}
                                                  </span>
                                              </td>
                                              <td>
                                                  {{ $product->price }} $
                                              </td>
                                              <td class="text-center">
                                                  <i data-bs-toggle="modal" data-bs-target="#edit_product"
                                                      class="fa-regular fa-pen-to-square btn"
                                                      wire:click='product_id({{ $product->id }})'
                                                      style="color: #0091ff;"></i>
                                              </td>
                                              <td wire:click='prodname("{{ $product->name }}")'>
                                                  <i class="fa-solid fa-trash btn" data-bs-toggle="modal"
                                                      wire:click='prodID({{ $product->id }})'
                                                      data-bs-target="#delete_product" style="color: #ff0000;">
                                                  </i>
                                              </td>
                                          </tr>
                                      @endforeach

                                  </tbody>
                              </table>
                          </div>

              <div wire:ignore.self class="modal fade" id="add_product" tabindex="-1"
                  aria-labelledby="add_productLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form class="">
                                  <div class="mb-3">
                                      <label for="name" class="form-label">Product name:</label>
                                      <input type="text" class="form-control" id="name" wire:model='name'
                                          placeholder="name">
                                  </div>
                                  <div class="mb-3">
                                      <label for="Description" class="form-label">Description:</label>
                                      <textarea class="form-control" id="Description" wire:model='description' rows="3"></textarea>
                                  </div>
                                  <div class="mb-3">
                                      <label for="Price" class="form-label">Price:</label>
                                      <input type="number" class="form-control" id="Price" wire:model='price'
                                          placeholder="Price">
                                  </div>
                                  <select class="form-select" aria-label="Default select example"
                                      wire:model='category_id'>
                                      <option selected>what is your product category</option>
                                      @foreach ($categorys as $category)
                                          <option value="{{ $category->id }}">{{ $category->category }}</option>
                                      @endforeach
                                  </select>

                                  <div class="mb-3">

                                      <label for="formFile" class="form-label">Choose your product poster</label>
                                      <input class="form-control" type="file" wire:model='image' id="formFile">
                                  </div>
                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" wire:click='uploade' class="btn btn-primary"
                                  data-bs-dismiss="modal">
                                  Add</button>
                          </div>
                      </div>
                  </div>
              </div>

              <div wire:ignore.self class="modal fade" id="edit_product" tabindex="-1"
                  aria-labelledby="edit_productLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form class="">
                                  @if ($productId != null)
                                      <div class="mb-3">
                                          <label for="name" class="form-label">Product name:</label>
                                          <input required type="text" class="form-control" id="name"
                                              placeholder="name" wire:model='new_name'>
                                      </div>
                                      <div class="mb-3">
                                          <label for="Description" class="form-label">Description:</label>
                                          <input required class="form-control" id="Description"
                                              wire:model='new_description' rows="3">
                                      </div>
                                      <div class="mb-3">
                                          <label for="Price" class="form-label">Price:</label>
                                          <input required type="number" class="form-control" id="Price"
                                              wire:model='new_price' placeholder="Price">
                                      </div>
                                      <select class="form-select" aria-label="Default select example"
                                          wire:model='new_category_id'>

                                          @foreach ($categorys as $category)
                                              <option>{{ $category->category }}</option>
                                          @endforeach
                                      </select>

                                      <div class="mb-3">

                                          <label for="formFile" class="form-label">Choose your product poster</label>
                                          <input required class="form-control" type="file" wire:model='new_poster'
                                              id="formFile">
                                      </div>
                                  @endif


                              </form>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" wire:click='update_product' class="btn btn-primary"
                                  data-bs-dismiss="modal">Save changes</button>
                          </div>
                      </div>
                  </div>
              </div>

              <div wire:ignore.self class="modal fade" id="delete_product" tabindex="-1"
                  aria-labelledby="edit_productLabel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                  aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              Do you want to delete {{ $pr_name }} ?
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="button" wire:click='delelte_product' class="btn btn-danger"
                                  data-bs-dismiss="modal">delete</button>
                          </div>
                      </div>
                  </div>
              </div>

          </div>
      </div>
  </div>
