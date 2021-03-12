<div>

    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-semibold leading-6 text-gray-900">{{ __("DHL") }}</h3>
                <p class="mt-4 text-sm leading-5 text-gray-600">
                    {{ __("DHL International GmbH (DHL) is a German international courier, package delivery and express mail service.") }}
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="shadow rounded-md overflow-hidden">
                <div class="bg-white p-4 sm:px-6 border-b border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full {{ $this->enabled ? 'bg-green-400' : 'bg-gray-400' }}"></div>
                            <h3 class="text-base leading-6 font-medium text-gray-900">
                                @if ($this->enabled)
                                    {{ __('DHL is available for your store.') }}
                                @else
                                    {{ __('DHL is disabled.') }}
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-5 bg-white sm:p-6">
                    <div class="flex-shrink-0">
                        <svg width="75" height="48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0)">
                              <path d="M.002 0h74.996v47.85H.002V0z" fill="#FFCB01"/>
                              <path d="M13.938 18.216l-2.322 3.156h12.657c.64 0 .632.241.32.667-.318.431-.85 1.176-1.174 1.615-.164.222-.461.626.522.626h5.176l1.534-2.084c.951-1.292.083-3.978-3.318-3.978l-13.395-.002z" fill="#D80613"/>
                              <path d="M10.676 28.497l4.665-6.34h5.79c.64 0 .631.243.319.668l-1.182 1.608c-.164.222-.46.626.522.626h7.754c-.643.884-2.737 3.438-6.491 3.438H10.676zm26.716-3.44l-2.53 3.44h-6.674l2.53-3.44h6.674zm10.221-.778h-16.32l4.462-6.063h6.67l-2.556 3.477h2.976l2.56-3.477h6.67l-4.462 6.063zm-.573.779l-2.53 3.44h-6.67l2.53-3.44h6.67zM1.155 26.414h9.829l-.537.73H1.155v-.73zm0-1.357h10.828l-.538.73H1.155v-.73zm0 2.714h8.831l-.535.726H1.155v-.726zm72.692-.627h-9.794l.538-.73h9.256v.73zm0 1.353H63.059l.533-.726h10.255v.726zm-8.258-3.44h8.258v.732h-8.795l.536-.732zm-4.275-6.84l-4.463 6.062h-7.069l4.466-6.063h7.066zm-12.103 6.84s-.487.668-.725.987c-.836 1.133-.097 2.451 2.637 2.451h10.713l2.53-3.438H49.21z" fill="#D80613"/>
                            </g>
                            <defs>
                              <clipPath id="clip0">
                                <path fill="#fff" d="M0 0h75v47.85H0z"/>
                              </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-500 text-sm">
                            {{ __("This carrier allows you to integrate a default shipping method into your shop to ship your orders items, using the DHL carrier.") }}
                            <a href="https://www.dhl.com/global-en/home.html" target="_blank" class="text-blue-600 hover:text-blue-500 transition-colors duration-150 ease-in-out">{{ __("Learn more about DHL") }}</a>
                        </p>
                        @if(! $this->enabled)
                            <span class="mt-4 inline-flex rounded-md shadow-sm">
                                <button wire:click="enableDHL" wire.loading.attr="disabled" type="button" class="inline-flex items-center py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-light-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                    <svg wire:loading wire:target="enableDHL" class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/>
                                    </svg>
                                    {{ __("Enable") }}
                                </button>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($this->enabled)

        <div class="hidden sm:block">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="mt-10 sm:mt-0">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <div class="px-4 sm:px-0">
                        <h3 class="text-lg font-semibold leading-6 text-gray-900">{{ __("Environnement") }}</h3>
                        <p class="mt-4 text-sm leading-5 text-gray-600">
                            {{ __("DHL has two environments Sandbox and Live, make sure to use sandbox for testing before going live.") }}
                            {{ __("API Keys can be grabbed from") }} <a href="https://developer.dhl.com/" target="_blank" class="text-blue-700 hover:text-blue-600">https://developer.dhl.com/</a>
                            {{ __("To enable Sandbox switch Sandbox mode to True.") }}
                        </p>
                    </div>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <div class="shadow rounded-md overflow-hidden">
                        <div class="px-4 py-5 bg-white sm:p-6 space-y-4">
                            <div class="grid gap-4 sm:grid-cols-6 sm:gap-6">
                                <div class="col-span-6">
                                    <label for="dhl_mode" class="block text-sm font-medium leading-5 text-gray-700">{{ __("DHL Mode") }}</label>
                                    <div class="mt-1 rounded-md shadow-sm">
                                        <select wire:model="dhl_mode" id="dhl_mode" class="form-select block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                            <option value="sandbox">Sandbox</option>
                                            <option value="live">Live</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <x-shopper-input.group label="Account ID" for="dhl_account_id">
                                        <input wire:model="dhl_account_id" id="dhl_account_id" type="text" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" autocomplete="off" />
                                    </x-shopper-input.group>
                                </div>

                                <div class="sm:col-span-3">
                                    <x-shopper-input.group label="Username" for="dhl_account_username">
                                        <input wire:model="dhl_secret" id="dhl_account_username" type="text" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" autocomplete="off" />
                                    </x-shopper-input.group>
                                </div>

                                <div class="sm:col-span-6">
                                    <x-shopper-input.group label="Password" for="dhl_account_password">
                                        <input wire:model="dhl_account_password" id="dhl_account_password" type="password" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" autocomplete="off" />
                                    </x-shopper-input.group>
                                    <p class="mt-2 text-gray-500 text-sm leading-5">
                                        {{ __("API Keys can be grabbed from") }} <a href="https://developer.dhl.com/user/register" target="_blank" class="text-blue-600 hover:text-blue-500">https://developer.dhl.com/user/register</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden sm:block">
            <div class="py-5">
                <div class="border-t border-gray-200"></div>
            </div>
        </div>

        <div class="mt-6 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <x-shopper-button wire:click="store" type="button" wire:loading.attr="disabled">
                    <svg wire:loading wire:target="store" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/>
                    </svg>
                    {{ __("Update Configuration") }}
                </x-shopper-button>
            </div>
        </div>

    @endif

    <x-shopper-modal wire:model="confirmInstallation" maxWidth="lg">
        <div class="p-4 sm:p-6 space-y-5">
            <div>
                <div class="py-4">
                    <h3 class="text-xs leading-4 font-medium text-gray-900 tracking-wide uppercase">{{ __("What's included") }}</h3>
                    <ul class="mt-6 space-y-2">
                        <li class="flex space-x-2">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" aria-hidden="true" x-description="Heroicon name: check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm leading-5 text-gray-500">{{ __("Download Laravel Cashier from composer") }}</span>
                        </li>
                        <li class="flex space-x-2">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" aria-hidden="true" x-description="Heroicon name: check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm leading-5 text-gray-500">{{ __("Run package migrations") }}</span>
                        </li>
                        <li class="flex space-x-2">
                            <svg class="flex-shrink-0 h-5 w-5 text-green-500" aria-hidden="true" x-description="Heroicon name: check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm leading-5 text-gray-500">{{ __("Set up environnement variables") }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="relative bg-gray-900 shadow rounded-md h-28 overflow-y-auto overflow-hidden p-3">
                <div class="absolute left-0 top-0 px-2">
                    <span class="text-gray-600 text-xs leading-4">{{ __("output") }}</span>
                </div>
                <div class="mt-2 text-gray-500 text-sm leading-5">
                    {{ $message }}
                </div>
            </div>
            <div class="sm:mt-4 sm:flex sm:flex-row-reverse">
                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                    <x-shopper-button wire:click="install" type="button" wire.loading.attr="disabled">
                        <svg wire:loading wire:target="install" class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/>
                        </svg>
                        {{ __("Proceed to installation") }}
                    </x-shopper-button>
                </span>
                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                    <button wire:click="closeModal" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        {{ __("Cancel") }}
                    </button>
                </span>
            </div>
        </div>
    </x-shopper-modal>

</div>
