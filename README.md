# Sitio web de perfil académico

Sitio estático (HTML/CSS/JS) listo para publicar en GitHub Pages.

## Estructura

El sitio ahora tiene **una página HTML por apartado** (en vez de una sola
página larga con anclas). La barra de navegación de arriba enlaza a cada
página, y el enlace del apartado en el que estás se resalta automáticamente.

```
index.html          → página "About" (también la portada del sitio)
research.html        → página "Research"
teaching.html         → página "Teaching"
conferences.html      → página "Conferences" (galería horizontal)
publications.html     → página "Publications"
cv.html                → página "CV"
contact.html           → página "Contact"

style.css            → estilos generales del sitio
event.css            → estilos específicos de las páginas de detalle de cada conferencia
script.js            → menú móvil y barra de fecha
cv.pdf               → (añade aquí tu CV en PDF; el enlace de la página CV ya apunta a este archivo)
images/              → fotos y carteles (foto de perfil, conference-1.jpg, conference-2.jpg, ...)
conferences/
  conference-1.html  → página de detalle de la conferencia 1 (ejemplo: GRAPHSY)
  conference-2.html  → página de detalle de la conferencia 2
  conference-3.html  → página de detalle de la conferencia 3
```

### Sección Conferences

La página "Conferences" muestra una galería horizontal con desplazamiento
(scroll) lateral. Cada tarjeta tiene una foto, un título, un subtítulo, una
breve descripción y un botón "Ver evento" que enlaza a su propia página en
`conferences/`.

Para añadir una conferencia nueva:

1. Copia uno de los archivos en `conferences/` (por ejemplo
   `conference-2.html`) y renómbralo, p. ej. `conference-4.html`.
2. Dentro de ese archivo, sustituye el título, la fecha/lugar, la
   descripción y la imagen (`images/conference-4.jpg`).
3. En `conferences.html`, dentro de `<div class="gallery">`, copia y pega un
   bloque `<article class="gallery-card">...</article>` más, apuntando su
   botón al nuevo archivo (`conferences/conference-4.html`).
4. Añade la imagen correspondiente en la carpeta `images/`.

### Añadir una página nueva

Si en el futuro quieres añadir un apartado más (por ejemplo, "News"):

1. Copia cualquiera de las páginas existentes (p. ej. `teaching.html`) y
   renómbrala, p. ej. `news.html`.
2. Cambia el contenido de la sección `<main>` por el tuyo.
3. En **todas** las páginas, añade un enlace nuevo dentro de `<nav class="nav">`:
   `<a href="news.html">News</a>`.
4. En `news.html`, marca ese mismo enlace con `class="active"`.

## Cómo publicarlo en GitHub Pages

1. Crea un repositorio nuevo en GitHub.

2. Sube estos archivos al repositorio:
   ```bash
   git init
   git add .
   git commit -m "Primer commit del sitio"
   git branch -M main
   git remote add origin https://github.com/tu-usuario/tu-repo.git
   git push -u origin main
   ```

3. En GitHub, ve a **Settings → Pages**.

4. En "Build and deployment", elige **Deploy from a branch**, selecciona la
   rama `main` y la carpeta `/ (root)`. Guarda.

5. Espera un par de minutos y GitHub te mostrará la URL pública del sitio
