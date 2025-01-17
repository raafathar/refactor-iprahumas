function updateView(slug) {
    fetch(`/berita/count/${slug}`, { method: 'GET' })
        .then(response => response.json())
        .then(data => console.log(data))
        .catch(error => console.error('Error:', error));
}
