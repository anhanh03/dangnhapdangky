import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');
    const submitButton = form.querySelector('button[type="submit"]');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        submitButton.disabled = true;

        fetch(form.action, {
            method: 'POST',
            body: new FormData(form),
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                alert(data.message);
            } else {
                // Xử lý thành công, ví dụ: làm mới danh sách todo
                location.reload();
            }
        })
        .catch(error => {
            console.error('Error:', error);
        })
        .finally(() => {
            submitButton.disabled = false;
        });
    });
});
