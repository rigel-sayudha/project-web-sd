<div id="article-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50 transition-opacity duration-300 ease-in-out opacity-100 pointer-events-auto">
    <div class="bg-white rounded-lg shadow-lg max-w-3xl w-full max-h-[80vh] overflow-y-auto p-6 relative transform transition-transform duration-300 ease-in-out scale-100">
        <button id="close-article-modal" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <h2 id="modal-article-title" class="text-2xl font-bold mb-4"></h2>
        <img id="modal-article-image" src="" alt="" class="mb-4 w-full h-auto max-h-64 object-cover rounded" />
        <div id="modal-article-content" class="prose max-w-none"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const modal = document.getElementById('article-modal');
    const modalTitle = document.getElementById('modal-article-title');
    const modalContent = document.getElementById('modal-article-content');
    const closeBtn = document.getElementById('close-article-modal');

    document.querySelectorAll('.read-more-btn').forEach(button => {
        button.addEventListener('click', function () {
            const articleId = this.getAttribute('data-article-id');
            fetch(`/api/articles/${articleId}`)
                .then(response => response.json())
                    .then(data => {
                        modalTitle.textContent = data.judul;
                        const imageElement = document.getElementById('modal-article-image');
                        if (data.gambar) {
                            let imgSrc = data.gambar;
                            if (!imgSrc.startsWith('http')) {
                                imgSrc = '/storage/' + imgSrc.replace(/^storage[\\\/]/, '');
                            }
                            imageElement.src = imgSrc;
                            imageElement.alt = data.judul;
                            imageElement.style.display = 'block';
                        } else {
                            imageElement.style.display = 'none';
                        }
                        modalContent.innerHTML = data.konten;
                        modal.classList.remove('hidden');
                    })
                .catch(error => {
                    alert('Gagal memuat artikel.');
                    console.error(error);
                });
        });
    });

    closeBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
        modalTitle.textContent = '';
        modalContent.innerHTML = '';
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            closeBtn.click();
        }
    });
});
</script>
