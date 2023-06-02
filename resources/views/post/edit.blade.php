<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Edit Post') }}
      </h2>
  </x-slot>
  <div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              <form method="POST" action="{{route('post.update' , ['id' => $post->id])}}">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                      <label  class="form-label">Title</label><br>
                      <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$post->title}}">
                      
                    </div>
                    <div class="mb-3">
                      <label class="form-label">Description</label><br>
                      <input name="body" type="text" class="form-control" id="exampleInputPassword1" value="{{$post->body}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Post</button>
                  </form>
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                @endif
            </div>
        </div>
    </div>
  </div>
</x-app-layout>
