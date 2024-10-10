<section class="space-y-6">
    <header>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Hisobingiz o\'chirilgandan so\'ng, uning barcha resurslari va malumotlari butunlay o\'chiriladi. Shuningdek to\'lovlarham o\'chiriladi.') }}
        </p>
    </header>

    <div class="container mt-5">
        <!-- O'chirish tugmasi -->
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
            Foydalanuvchini o'chirish
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">O'chirishni tasdiqlash</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Yopish">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Rostdan ham o'chirishni xohlaysizmi?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bekor qilish</button>
                    <!-- O'chirish formasi -->
                    <form id="deleteForm" action="{{ route('profile.destroy',[auth()->id()]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Ha, o'chirish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
