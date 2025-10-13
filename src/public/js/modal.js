document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('contactModal');
    const modalContent = document.getElementById('modalContent');
    const closeBtn = document.querySelector('.modal__close');

    document.querySelectorAll('.detail-button').forEach(button => {
        button.addEventListener('click', async () => {
            const contactId = button.dataset.id;

            try {
                const response = await fetch(`/admin/contacts/${contactId}`);
                if (!response.ok) throw new Error('Network response was not ok');

                const html = await response.text();
                modalContent.innerHTML = html;
                modal.classList.add('is-active');
            } catch (error) {
                console.error('Error fetching contact details:', error);
            }
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.remove('is-active');
    });

    // オーバーレイをクリックしたら閉じる
    document.querySelector('.modal__overlay').addEventListener('click', () => {
        modal.classList.remove('is-active');
    });
});
