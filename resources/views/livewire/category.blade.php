  <div id="content-wrapper ">
      @include('adminl_nav')
      <div class="d-flex mt-5 mb-5">

          @include('admin_sidebar')
          <div class="container mt-5">

              <button class="btn btn-lg btn-outline-primary " data-bs-toggle="modal" data-bs-target="#master_category">Add
                  category</button>

              <table class="table table-striped container">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">category</th>
                          <th scope="col">Add Category</th>
                          <th scope="col">Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($categorys as $category)
                          <tr>
                              <th scope="row">{{ $category->id }}</th>
                              <td>{{ $category->category }}</td>
                              @if ($category->product_id == null)
                                  <td><a wire:click="take_id({{ $category->id }})" class="btn btn-primary"
                                          data-bs-toggle="modal" data-bs-target="#category">Add</a>
                                  </td>
                              @endif
                              @if ($category->product_id != null)
                                  <td>{{ $category->product_id }}</td>
                              @endif
                              <td><a wire:click="take_id({{ $category->id }})"
                                      wire:click='category_name({{ $category->category }})' class="btn btn-danger"
                                      data-bs-toggle="modal" data-bs-target="#delete_category">Delete</a></td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>

          <div wire:ignore.self class="modal fade" id="category" tabindex="-1" aria-labelledby="categoryLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form class="">
                              <div class="form-group mx-sm-3 mb-2">
                                  <label for="inputPassword2" class="sr-only">category</label>
                                  <input type="text" wire:model.debounce.500ms="category" class="form-control"
                                      id="inputcategory2" placeholder="category">
                              </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" wire:click='add_category' class="btn btn-primary">Save changes</button>
                      </div>
                  </div>
              </div>
          </div>

          <div class="modal fade" id="master_category" tabindex="-1" aria-labelledby="master_categoryLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form class="">
                              <div class="form-group mx-sm-3 mb-2">
                                  <label for="inputPassword2" class="sr-only">category</label>
                                  <input type="text" wire:model.debounce.500ms="category" class="form-control"
                                      id="inputcategory2" placeholder="category">
                              </div>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" wire:click='add_Master_category' class="btn btn-primary"
                              data-bs-dismiss="modal">Save changes</button>
                      </div>
                  </div>
              </div>
          </div>

          <div class="modal fade" class="modal fade" id="delete_category" tabindex="-1"
              aria-labelledby="delete_categoryLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <form class="">
                              <div>Do you want to delete {{ $category_name }} ? </div>
                      </div>
                      </form>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" wire:click='delete_category' class="btn btn-danger"
                              data-bs-dismiss="modal">Delete</button>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>
  </div>
