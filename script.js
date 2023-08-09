const editor = document.querySelector('.editor');
const boldBtn = document.getElementById('boldBtn');
const italicBtn = document.getElementById('italicBtn');

boldBtn.addEventListener('click', () => {
    Document.execCommand('bold', false, null);
});

italicBtn.addEventListener('click', () => {
    Document.execCommand('italic', false, null);
});
