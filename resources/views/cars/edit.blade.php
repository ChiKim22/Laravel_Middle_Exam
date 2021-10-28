<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit') }}
        </h2>
    </x-slot>

    <form action="{{ route('cars.update', ['cars'=>$cars->id]) }}" method="PUT" enctype="multipart/form-data" >
        @csrf
        <div class="form-group">
            <label for="brand">Brand</label> 
            <br>
            <input type="text" class="form-control" id="title" name="title" value="{{ $cars->brand }}">
            @error('brand')
               <div class="text-red-800">
                   <span>{{ $message }}</span>
               </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="carname">Car Name</label> 
            <br>
            <input type="text" class="form-control" id="title" name="title" value="{{ $cars->carname }}">
            @error('carname')
               <div class="text-red-800">
                   <span>{{ $message }}</span>
               </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="bulid">Bulid Years</label> 
            <br>
            <input type="text" class="form-control" id="title" name="title" value="{{ $cars->bulid }}">
            @error('bulid')
               <div class="text-red-800">
                   <span>{{ $message }}</span>
               </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="price">Car Price</label> 
            <br>
            <input type="text" class="form-control" id="title" name="title" value="{{ $cars->price }}">
            @error('price')
               <div class="text-red-800">
                   <span>{{ $message }}</span>
               </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="type">Car Type</label> 
            <br>
            <input type="text" class="form-control" id="title" name="title" value="{{ $cars->type }}">
            @error('type')
               <div class="text-red-800">
                   <span>{{ $message }}</span>
               </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="style">Car Style</label> 
            <br>
            <input type="text" class="form-control" id="title" name="title" value="{{ $cars->style }}">
            @error('style')
               <div class="text-red-800">
                   <span>{{ $message }}</span>
               </div>
            @enderror
          </div>

            <div class="form-group mt-5">
                <br>
                <label for="image">Images</label>
                <br>
                <input type="file" class="form-control" id="img" name="image">
                @if($cars->image)
                    <img class="w-20 h-20 rounded-full mt-2" src="{{ '/storage/image/'.$cars->image }}" class="card-img-top" alt="image">
                @else
                    <span>No Image...</span><br>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>

    </form>

</x-app-layout>