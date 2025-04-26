document.querySelectorAll('.estado').forEach(element => {
    if (element.textContent.trim() === 'Activo') {
        element.style.color = 'green';
    } else {
        element.style.color = 'orange';
    }
});