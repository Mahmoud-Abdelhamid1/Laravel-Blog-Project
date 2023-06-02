<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('MyProfile') }}
        </h2>
    </x-slot>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <ul>
                                @if ($userInfo->avatar)
                                <img src="{{ asset('images/Avatar/' . $userInfo->avatar)}}" class="w-10/12" alt="Avatar">
                                @else
                                    <li>Click Update to add avatar</li>
                                @endif
                                <li>name: {{$userInfo->name}}</li>
                                <li>email: {{$userInfo->email}}</li>
                            </ul>
                            <div class="py-2">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 bg-white border-b border-gray-200">
                                            <a href="{{route('user.edit' , ['id' => $userInfo->id])}}">Update Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <a href="{{route('post.create')}}" class="btn btn-primary btn-sm">Create new Post</a>
                        </div>
                    </div>
                </div>
            </div>

                @foreach ($userInfo->post as $post)
                <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <ul>
                                <li>{{$post->title}}</li>
                                <li>{{$post->body}}</li>
                                @if ($post->filename)
                                <img src="{{asset('images/Posts/' . $post->filename)}}" class="w-10/12" alt="Post image">
                                @endif
                            </ul>
                            <div class="py-6">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 bg-white border-b border-gray-200">
                                            <a href="{{route('post.edit', ['id' => $post->id]) }}" class="btn btn-outline-primary">Edit Post</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-2">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                        <div class="p-6 bg-white border-b border-gray-200">
                                            <form id="delete-frm" class="" action="{{route('post.destroy', ['id'=>$post->id])}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger">Delete Post</button>
                                            </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            @endforeach
        </x-app-layout>
