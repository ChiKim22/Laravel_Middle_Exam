<x-app-layout>
    <x-slot name="header" >
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create') }}
        </h2>
            <button type="button" onclick=location.href="{{ route('cars.index') }}" 
            class="btn btn-info font-bold text-blue-800">Back</button>
        </div>
    </x-slot>
    <div class="m-4 p-4">
    <form action="{{ route('cars.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="form-group mt-5">
                <label for="image">Images</label>
                <br>
                <input type="file" class="form-control" id="img" name="image">
            </div>

          <label for="brand">Brand</label> 
          <br>
          <input type="text" class="form-control" id="brand" placeholder="Brand" name="brand" value="{{ old('brand') }}">
          @error('brand')
             <div class="text-red-800">
                 <span>{{ $message }}</span>
             </div>
          @enderror
        </div>

        <div class="content mt-5">
            <label for="carname">Car Name</label> 
            <br>
            <input type="text" class="form-control" id="carname" placeholder="name" name="carname" value="{{ old('carname') }}">
            @error('carname')
               <div class="text-red-800">
                   <span>{{ $message }}</span>
               </div>
            @enderror
        </div>

        <div class="content mt-5">
            <label for="bulid">Car Year</label> 
            <br>
            <input type="text" class="form-control" id="bulid" placeholder="name" name="bulid" value="{{ old('bulid') }}">
            @error('bulid')
               <div class="text-red-800">
                   <span>{{ $message }}</span>
               </div>
            @enderror
        </div>

        <div class="content mt-5">
            <label for="price">Car Price</label> 
            <br>
            <input type="number" class="form-control" id="price" placeholder="name" name="price" value="{{ old('price') }}">
            @error('price')
               <div class="text-red-800">
                   <span>{{ $message }}</span>
               </div>
            @enderror
        </div>

        <div class="content mt-5">
            <label for="type">Car Type</label> 
            <br>
            <input type="text" class="form-control" id="type" placeholder="name" name="type" value="{{ old('type') }}">
            @error('type')
               <div class="text-red-800">
                   <span>{{ $message }}</span>
               </div>
            @enderror
        </div>
        
        <div class="content mt-5">
            <label for="style">Car Style</label> 
            <br>
            <input type="text" class="form-control" id="style" placeholder="name" name="style" value="{{ old('style') }}">
            @error('style')
               <div class="text-red-800">
                   <span>{{ $message }}</span>
               </div>
            @enderror
        </div>


        <div class="col-12 mt-5">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
    
</x-app-layout>