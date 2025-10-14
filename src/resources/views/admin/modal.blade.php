<div class="modal__table">
    <div class="modal__row">
        <div class="modal__label">お名前</div>
        <div class="modal__value">{{ $contact->first_name }} {{ $contact->last_name }}</div>
    </div>
    <div class="modal__row">
        <div class="modal__label">性別</div>
        <div class="modal__value">
            @if ($contact->gender == 1) 男性
            @elseif ($contact->gender == 2) 女性
            @else その他
            @endif
        </div>
    </div>
    <div class="modal__row">
        <div class="modal__label">メールアドレス</div>
        <div class="modal__value">{{ $contact->email }}</div>
    </div>
    <div class="modal__row">
        <div class="modal__label">お問い合わせの種類</div>
        <div class="modal__value">{{ $contact->category->content }}</div>
    </div>
    <div class="modal__row">
        <div class="modal__label">内容</div>
        <div class="modal__value">{{ $contact->detail }}</div>
    </div>
</div>

<div class="modal__actions">
    <form action="{{ route('admin.destroy', $contact->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="modal__button modal__button--delete">削除</button>
    </form>
    <button type="button" class="modal__button modal__button--close modal__close">×</button>
</div>