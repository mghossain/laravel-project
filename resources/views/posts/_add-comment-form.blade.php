@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex items-center">
                {{-- auth()->user()->id() --}}
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40"
                class="rounded-full">
                <h2 class="ml-4">Want to participate?</h2>
            </header>
            <x-form.field>
                <textarea
                name="body"
                class="w-full text-sm focus:outline-none focus:ring"
                rows="5"
                placeholder="Quick, think of something to say!"
                required></textarea>

                <x-form.error name="body" />
            </x-form.field>

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>
                    Submit
                </x-form.button>
            </div>

        </form>
    </x-panel>
@else
    <x-panel class="bg-gray-50 font-semibold">
        <p>
            <a href="/register" class="hover:underline">Register </a> or
            <a href="/login" class="hover:underline">Log in</a> to leave a comment!
        </p>
    </x-panel>
@endauth