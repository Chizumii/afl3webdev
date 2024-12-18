<x-layout>
    {{-- <x-slot:layoutTitle>{{ $pagetitle }}</x-slot:layoutTitle> --}}
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-24 w-auto" src="images/logos.png" alt="Logo">
          </div>
      
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm border border-[#E2CEB1] rounded-lg p-6">
            <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                Get started
            </h1>
          <form class="space-y-6" action="/home" method="POST">
            <div>
              <label for="email" class="block text-sm/6 font-medium text-gray-900 mt-4"></label>
              <div class="mt-2">
                <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-[#E2CEB1] placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-[#E2CEB1] sm:text-sm/6">
              </div>
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
                <div class="text-sm">
                  <a href="#" class="font-semibold text-[#E2CEB1] hover:text-[#A07658]">Forgot password?</a>
                </div>
              </div>
              <div class="mt-2">
                <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-[#E2CEB1] placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-[#E2CEB1] sm:text-sm/6">
              </div>
            </div>
      
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-[#E2CEB1] px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-[#A07658] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#E2CEB1]">Sign in</button>
            </div>
          </form>
      
          <p class="mt-10 text-center text-sm/6 text-gray-500">
            or
            <a href="/signup" class="font-semibold text-[#E2CEB1] hover:text-[#A07658]">Create an Account</a>
          </p>
        </div>
      </div>
</x-layout>
