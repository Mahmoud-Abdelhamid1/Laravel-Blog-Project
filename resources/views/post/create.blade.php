<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{route('post.store')}}"  enctype="multipart/form-data">
          @csrf
          @method('POST')
            <!-- Name -->
            <div>
                <x-label for="name" :value="__('title')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="title" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="text" :value="__('body')" />

                <x-input id="text" class="block mt-1 w-full" type="text" name="body" :value="old('text')" required />
            </div>
            <div class="mt-4">
                <x-label for="file" :value="__('Image(Optinal)')" />

                <x-input id="text" class="block mt-1 w-full" type="file" name="postImage" placeholder="image" :value="old('image')" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Create') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
    
</x-guest-layout>
