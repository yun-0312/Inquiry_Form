document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('contactModal');
    const modalContent = document.getElementById('modalContent');

    if (!modal) {
        console.warn('モーダル要素が見つかりません: #contactModal');
        return;
    }

    const closeModal = () => {
        modal.classList.remove('is-active');
    };

    document.addEventListener('click', (e) => {
        const target = e.target;

        if (target.closest && target.closest('.modal__close')) {
            e.preventDefault();
            closeModal();
            return;
        }
    });

    document.addEventListener('click', async (event) => {
        const button = event.target.closest && event.target.closest('.detail-button');
        if (!button) return;

        const contactId = button.dataset.id;
        const url = button.dataset.url || `/admin/contacts/${contactId}`;

        if (modalContent) modalContent.innerHTML = '<p>読み込み中...</p>';
        modal.classList.add('is-active');

        try {
            const response = await fetch(url);
            if (!response.ok) throw new Error(`HTTP error: ${response.status}`);
            const html = await response.text();
            if (modalContent) modalContent.innerHTML = html;
        } catch (err) {
            console.error('Error fetching contact details:', err);
            if (modalContent) modalContent.innerHTML = '<p>詳細の取得に失敗しました。</p>';
        }
    });
});
