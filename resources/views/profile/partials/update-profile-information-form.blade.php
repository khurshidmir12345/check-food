<section>
    <header>
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100">
            {{ __('Hisobingiz haqida ma\'lumot') }}
        </h2>
    </header>

    <div class="mt-6 space-y-6">
        <!-- Ism -->
        <div>
            <x-input-label for="name" :value="__('Ism')" />
            <div class="relative mt-1">
                <p id="name" class="block w-full bg-gray-200 dark:bg-gray-900 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-lg shadow-sm">
                    {{ $user->name }}
                </p>
            </div>
        </div>

        <!-- Elektron pochta manzili -->
        <div>
            <x-input-label for="email" :value="__('Elektron pochta manzili')" />
            <div class="relative mt-1">
                <p id="email" class="block w-full bg-gray-200 dark:bg-gray-700 text-gray-900 dark:text-gray-100 border border-gray-300 dark:border-gray-600 rounded-md py-2 px-3 text-lg shadow-sm">
                    {{ $user->email }}
                </p>
            </div>
        </div>
    </div>
</section>
