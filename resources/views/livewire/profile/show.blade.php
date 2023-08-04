@section('title', 'Sign in to your account')
<div>
    <div class="bg-white sm:p-4 p-16 lg:p-8 rounded-lg shadow-lg">
        <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
        <form wire:submit="save">
            @csrf
            <div class="space-y-12 sm:space-y-16">
                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Personal Information</h2>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">Use a permanent address where you can receive mail.</p>

                    <div class="mt-10 space-y-8 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="full-name" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Full name</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="text" name="full-name" id="full-name" wire:model="name" autocomplete="full-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Email address</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                @error('email') <span class="error">{{ $message }}</span> @enderror
                                <input id="email" name="email" type="email" autocomplete="email" wire:model.live="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-md sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="country" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Country</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <select id="country" name="country" autocomplete="country-name" wire:model="country" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                    @if($user->country == null)
                                        <option selected>Select a country</option>
                                    @endif
                                    @foreach($countries as $country)
                                        <option value="{{$country['name']['common']}}">{{$country['name']['common']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="street-address" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">Street address</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="text" name="street-address" id="street-address" wire:model="address" autocomplete="street-address" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xl sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="city" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">City</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="text" name="city" id="city" autocomplete="address-level2" wire:model="city" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="region" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">State / Province</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="text" name="region" id="region" autocomplete="address-level1" wire:model="state" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div class="sm:grid sm:grid-cols-3 sm:items-start sm:gap-4 sm:py-6">
                            <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900 sm:pt-1.5">ZIP / Postal code</label>
                            <div class="mt-2 sm:col-span-2 sm:mt-0">
                                <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" wire:model="zip" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-base font-semibold leading-7 text-gray-900">Notifications</h2>
                    <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600">We'll always let you know about important changes, but you pick what else you want to hear about.</p>

                    <div class="mt-10 space-y-10 border-b border-gray-900/10 pb-12 sm:space-y-0 sm:divide-y sm:divide-gray-900/10 sm:border-t sm:pb-0">
                        <fieldset>
                            <legend class="sr-only">Email</legend>
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:py-6">
                                <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Email</div>
                                <div class="mt-4 sm:col-span-2 sm:mt-0">
                                    <div class="max-w-lg space-y-6">
                                        <div class="relative flex gap-x-3">
                                            <div class="flex h-6 items-center">
                                                <input id="comments" name="comments" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            </div>
                                            <div class="text-sm leading-6">
                                                <label for="comments" class="font-medium text-gray-900">General</label>
                                                <p class="mt-1 text-gray-600">Get notified about your account and appointments.</p>
                                            </div>
                                        </div>
                                        <div class="relative flex gap-x-3">
                                            <div class="flex h-6 items-center">
                                                <input id="candidates" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            </div>
                                            <div class="text-sm leading-6">
                                                <label for="candidates" class="font-medium text-gray-900">Upcoming</label>
                                                <p class="mt-1 text-gray-600">Get notified about upcoming appointments</p>
                                            </div>
                                        </div>
                                        <div class="relative flex gap-x-3">
                                            <div class="flex h-6 items-center">
                                                <input id="offers" name="offers" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            </div>
                                            <div class="text-sm leading-6">
                                                <label for="offers" class="font-medium text-gray-900">Advertisement</label>
                                                <p class="mt-1 text-gray-600">Get notified about offers and deals.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend class="sr-only">SMS Notifications</legend>
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:py-6">
                                <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">SMS</div>
                                <div class="mt-4 sm:col-span-2 sm:mt-0">
                                    <div class="max-w-lg space-y-6">
                                        <div class="relative flex gap-x-3">
                                            <div class="flex h-6 items-center">
                                                <input id="comments" type="checkbox" wire:model="phone_general" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            </div>
                                            <div class="text-sm leading-6">
                                                <label for="comments" class="font-medium text-gray-900">General</label>
                                                <p class="mt-1 text-gray-600">Get notified about your account and appointments.</p>
                                            </div>
                                        </div>
                                        <div class="relative flex gap-x-3">
                                            <div class="flex h-6 items-center">
                                                <input id="candidates" name="candidates" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            </div>
                                            <div class="text-sm leading-6">
                                                <label for="candidates" class="font-medium text-gray-900">Upcoming</label>
                                                <p class="mt-1 text-gray-600">Get notified about upcoming appointments</p>
                                            </div>
                                        </div>
                                        <div class="relative flex gap-x-3">
                                            <div class="flex h-6 items-center">
                                                <input id="offers" name="offers" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-600">
                                            </div>
                                            <div class="text-sm leading-6">
                                                <label for="offers" class="font-medium text-gray-900">Advertisement</label>
                                                <p class="mt-1 text-gray-600">Get notified about offers and deals.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>

            <div class="mt-6 flex items-center justify-end gap-x-6">
                <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                <button type="submit" class="inline-flex justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
            </div>
        </form>

    </div>

    <!-- Global notification live region, render this permanently at the end of the document -->
    <div aria-live="assertive" class="pointer-events-none z-10 fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6">
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
            <!--
              Notification panel, dynamically insert this into the live region when it needs to be displayed

              Entering: "transform ease-out duration-300 transition"
                From: "translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
                To: "translate-y-0 opacity-100 sm:translate-x-0"
              Leaving: "transition ease-in duration-100"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-gray-900">Successfully saved!</p>
                            <p class="mt-1 text-sm text-gray-500">Anyone with a link can now view this file.</p>
                        </div>
                        <div class="ml-4 flex flex-shrink-0">
                            <button type="button" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
