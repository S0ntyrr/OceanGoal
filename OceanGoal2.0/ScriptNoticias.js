const container = document.getElementById("news-container");
const rss_url = "https://news.google.com/rss/search?q=marine+life";
const api_url = `https://api.rss2json.com/v1/api.json?rss_url=${encodeURIComponent(rss_url)}`;

fetch(api_url)
  .then(response => response.json())
  .then(data => {
    container.innerHTML = ""; // Limpiar "Cargando noticias..."
    data.items.forEach(item => {
      const div = document.createElement("div");
      div.className = "noticia";
      div.innerHTML = `
        <h2>${item.title}</h2>
        <p>${item.description}</p>
        <a href="${item.link}" target="_blank">Leer más</a>
      `;
      container.appendChild(div);
    });
  })
  .catch(error => {
    console.error("Error al obtener noticias:", error);
    container.innerHTML = "No se pudieron cargar las noticias 😓";
  });
