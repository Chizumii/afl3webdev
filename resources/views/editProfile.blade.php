<x-layout>
    <section class="bg-white">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <div class="w-full bg-white rounded-lg shadow border border-[#E2CEB1] md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Edit Your Profile
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('profile.update') }}" method="POST" id="update-profile-form">
                        @method('POST') <!-- Method adalah POST sesuai dengan route -->
                        @csrf
                        <!-- Username -->
                        <div>
                            <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                            <input type="text" name="username" id="username" value="{{ old('username', $user->username) }}"
                                placeholder="username"
                                class="bg-gray-50 border border-[#E2CEB1] text-gray-900 text-sm rounded-lg focus:ring-[#E2CEB1] focus:border-[#E2CEB1] block w-full p-2.5"
                                required="">
                            @error('username')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Address -->
                        <div>
                            <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Address</label>
                            <input type="text" name="address" id="address" value="{{ old('address', $user->address) }}"
                                placeholder="123 Main St, Springfield"
                                class="bg-gray-50 border border-[#E2CEB1] text-gray-900 text-sm rounded-lg focus:ring-[#E2CEB1] focus:border-[#E2CEB1] block w-full p-2.5">
                            @error('address')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="number" class="block mb-2 text-sm font-medium text-gray-900">Phone Number</label>
                            <input type="text" name="number" id="number" value="{{ old('number', $user->number) }}"
                                placeholder="1234567890"
                                class="bg-gray-50 border border-[#E2CEB1] text-gray-900 text-sm rounded-lg focus:ring-[#E2CEB1] focus:border-[#E2CEB1] block w-full p-2.5">
                            @error('number')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">New Password (optional)</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-[#E2CEB1] text-gray-900 text-sm rounded-lg focus:ring-[#E2CEB1] focus:border-[#E2CEB1] block w-full p-2.5">
                            @error('password')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••"
                                class="bg-gray-50 border border-[#E2CEB1] text-gray-900 text-sm rounded-lg focus:ring-[#E2CEB1] focus:border-[#E2CEB1] block w-full p-2.5">
                            @error('password_confirmation')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full text-white bg-[#E2CEB1] hover:bg-[#A07658] focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            Update Profile
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
