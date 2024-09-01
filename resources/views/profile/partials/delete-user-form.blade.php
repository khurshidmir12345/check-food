<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Accountni o\'chirish') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Hisobingiz o\'chirilgandan so\'ng, uning barcha resurslari va malumotlari butunlay o\'chiriladi. Shuningdek to\'lovlarniham o\'chiriladi.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Hisobni o\'chirish') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" focusable>
        <form method="post" action="{{ route('profile.destroy',[auth()->id()]) }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Hisobingizni o\'chirishga ishonchingiz komilmi ?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Yana bir bor eslatamiz, hisobni o\'chirgandan keyin to\'lovlar va barcha malumotlar o\'chiriladi. Keyin uni ortga qaytarishning imkoni bo\'lmaydi') }}
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Bekor qilish') }}
                </x-secondary-button>

                <x-danger-button class="ms-3" type="submit">
                    {{ __('Hisobni o\'chirish') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
