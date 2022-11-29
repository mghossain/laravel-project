<x-layout>
	<section class="px-6 py-8">
		<main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">
			<h1 class="text-center font-bold text-xl">Log In!</h1>
			<form method="POST" action="/login" class="mt-10">
				@csrf

				<x-form.input name="email" type="email" autocomplete="username"/>

				<x-form.field>
					<x-form.label name="password" />
					<input class="border border-gray-200 p-2 w-full rounded"
						type="password"
						name="password"
						id="password"
						required
					>
					<x-form.error name="password" />
				</x-form.field>
				{{-- <div class="mb-6">
					<label class="block mb-2 uppercase font-bold text-xs text-gray-700"
							for="password"
					>
						Password
					</label>

					<input class="border border-gray-400 p-2 w-full"
						type="password"
						name="password"
						id="password"
						required
					>
					@error('password')
						<p class="text-red-500 text-xs mt-1"> {{ $message }} </p>
					@enderror
				</div> --}}

					<x-form.button class="text-sm">
						Log In
					</x-form.button>

				{{-- using error bags --}}
				{{-- @if ($errors->any())
					<ul>
						@foreach ($errors->all() as $error )
							<li class="text-red-500 text-xs"> {{ $error }} </li>
						@endforeach
					</ul>
				@endif --}}

			</form>
		</main>
	</section>
</x-layout>