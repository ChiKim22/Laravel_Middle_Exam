<x-app-layout>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Detail</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></head>
    </head>
    <body>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Detail') }}
            </h2>
        </x-slot>

        <div class="container m-10">
        @if($cars->image)
            <img class="m-10" src="{{ '/storage/image/'.$cars->image }}" class="card-img-top" alt="image">
        @else
            <span>No Image...</span><br>
        @endif
    </div>
                    <div class="container mb-3">
                    <br>
                    <label for="brand">Brand</label>
                    <input type="text" readonly class="form-control" value="{{ $cars->brand }}">
                  </div>
                  <div class="container mb-5">
                    <label for="carname" class="form-label">Car Name</label>
                    <div class="form-control" name="carname" readonly id="carname">{!! $cars->carname !!}</textarea>
                  </div>
                  <div class="container mb-3">
                    <label for="bulid">Bulid Year</label>
                    <input type="text" readonly class="form-control" value="{{ $cars->bulid }}">
                  </div>

                  <div class="container mb-3">
                    <label for="price">Car Price</label>
                    <input type="text" readonly class="form-control" value="{{ $cars->price }}">
                  </div>

                  <div class="container mb-3">
                    <label for="type">Car Type</label>
                    <input type="text" readonly class="form-control" value="{{ $cars->type }}">
                  </div>

                  <div class="container mb-3">
                    <label for="style">Car Style</label>
                    <input type="text" readonly class="form-control" value="{{ $cars->style }}">
                  </div>

                  <div class="container mb-3">
                    <label>Written Date</label>
                    <input type="text" readonly class="form-control" value="{{ $cars->created_at->diffForHumans() }}">
                  </div>
                  <div class="container mb-3">
                    <label>Last Worked</label>
                    <input type="text" readonly class="form-control" value="{{ $cars->updated_at }}">
                  </div>
                  <div class="container mb-5">
                    <label>User</label>
                    <input type="text" readonly class="form-control" value="{{ Auth::user()->name }}">
                    <br>
                  </div>
                  
                  @auth
                  <div class="flex">
                  <a class="btn btn-warning mr-2" href ="{{ route('cars.edit', ['id'=>$cars->id]) }}">Edit</a>
    
                    <form action="{{ route('cars.delete', ['cars'=>$cars->id]) }}" method="post">
                      @csrf
                      @method("delete")
                      <button class="btn btn-danger">Delete</button>
                    </form>
                  </div>           
                  @endauth
            </form>  
            </div>
    </body>
    </html>
    </x-app-layout>
    