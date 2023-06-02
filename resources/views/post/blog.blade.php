<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="display-one">Our Blog!</h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Create new Post</p>
                    <a href="{{route('post.create')}}" class="btn btn-primary btn-sm">Add Post</a>
                </div>
            </div>
        </div>
    </div>
    @foreach ($posts as $post)
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <ul>
                    <li><a href="./show/{{ $post->id }}"> Title: {{ $post->title }}</a></li>
                    <li>{{ $post->body }}</li>

                    @if ($post->filename)
                    <img src="{{asset('images/Posts/' . $post->filename)}}" class="w-10/12" alt="Post image">
                    @endif
                </ul>
                @php
                $users = App\Http\Controllers\PostController::getUser($post->user_id);
                @endphp
                @foreach ($post->user as $user)
                <br><br>
                <div class="py-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                            <ul>
                                <li>
                                    @if ($user->avatar)
                                    <img src="{{ asset('images/Avatar/' . $user->avatar)}}" class="w-10/12" alt="Avatar">
                                    @endif
                                </li>
                                <li>
                                    @if(Auth::id() == $user->id)
                                    <a href="{{route('user.showProfile', ['id' => $user->id]) }}" class="btn btn-outline-primary">{{ $user->name }}</a>
                                    @else
                                    <a href="{{route('user.show', ['id' => $user->id]) }}" class="btn btn-outline-primary">{{ $user->name }}</a>
                                    @endif
                                </li>
                                <li>{{ $user->email }}</li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    @endforeach
    @endforeach
</x-app-layout>

