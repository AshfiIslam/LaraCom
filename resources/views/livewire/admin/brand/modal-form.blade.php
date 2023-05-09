<!-- modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Brands</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>        </div>
        <form wire:submit.prevent="storeBrand">
           
        <div class="modal-body">
          <div class="mb-3">
            <label>select category</label>
            <select wire:model.defer="category_id" required class="form-controll">
              <option value="">select category</option>
              @foreach ($categories as $cateitem)
              <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
              @endforeach
              
            </select>
          </div>
          <div class="mb-3">
            <label>Brand Name</label>
            <input type="text" wire:model.defer='name' class="form-control">
            @error('name')
              <small class="text-danger">{{ $message}}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label>Brand Slug</label>
            <input type="text" wire:model.defer='slug' class="form-control">
            @error('slug')
            <small class="text-danger">{{ $message}}</small>
          @enderror
          </div>
          <div class="mb-3">
            <label>Status</label> <br>
            <input type="checkbox" wire:model.defer='status'> checked=Hidden,un-checked=visible
            @error('status')
            <small class="text-danger">{{ $message}}</small>
          @enderror
          </div>
        </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>



  <!-- update modal -->
  <div wire:ignore.self class="modal fade" id="updateBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Brands</h5>
          <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>        </div>
        <form wire:submit.prevent="updateBrand">
           
        <div class="modal-body">
          <div class="mb-3">
            <label>select category</label>category_id
            <select wire:model.defer="category_id" required class="form-controll">
              <option value="">select category</option>
              @foreach ($categories as $cateitem)
              <option value="{{$cateitem->id}}">{{$cateitem->name}}</option>
              @endforeach
              
            </select>
          </div>
          <div class="mb-3">
            <label>Brand Name</label>
            <input type="text" wire:model.defer='name' class="form-control">
            @error('name')
              <small class="text-danger">{{ $message}}</small>
            @enderror
          </div>
          <div class="mb-3">
            <label>Brand Slug</label>
            <input type="text" wire:model.defer='slug' class="form-control">
            @error('slug')
            <small class="text-danger">{{ $message}}</small>
          @enderror
          </div>
          <div class="mb-3">
            <label>Status</label> <br>
            <input type="checkbox" wire:model.defer='status'> checked=Hidden,un-checked=visible
            @error('status')
            <small class="text-danger">{{ $message}}</small>
          @enderror
          </div>
        </div>
  
        <div class="modal-footer">
          <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
      </div>
    </div>
  </div>


  <!--Deleted -->
  <div wire:ignore.self class="modal fade" id="deleteBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">delete Brands</h5>
          <button type="button" class="close" wire:click="closeModal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>        
        </div>
        <form wire:submit.prevent="destroyBrand">
           
        <div class="modal-body">
          <h4>Are you sure to delete?</h4>
        </div>
  
        <div class="modal-footer">
          <button type="button" wire:click="closeModal" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">delete</button>
        </div>
    </form>
      </div>
    </div>
  </div>