<x-layout>


    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto  border border-gray-300 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">Log in</h1>
            <form method="post" action="/login">
                @csrf


                <div class='mb-6'>
                    <label class='block mb-2 uppercase font-bold text-sx text-gray-700'
                           for='email'
                    >
                        Email
                    </label>
                    <input class='border border-gray-200 rounded p-2 w-full'
                           type='email'
                           name='email'
                           id='email'
                           value="{{old('email')}}"
                           required
                    >
                    @error('email')
                    <p class="text-red-500 text-xs pt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class='mb-6'>
                    <label class='block mb-2 uppercase font-bold text-sx text-gray-700'
                           for='password'
                    >
                        Password
                    </label>
                    <input class='border border-gray-200 rounded p-2 w-full'
                           type='password'
                           name='password'
                           id='password'
                           required
                    >
                    @error('password')
                    <p class="text-red-500 text-xs pt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Log in
                    </button>
                </div>

            </form>
        </main>

    </section>


</x-layout>
