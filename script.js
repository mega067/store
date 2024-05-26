document.addEventListener("DOMContentLoaded", function() {
    const images = document.querySelectorAll('.fon');
    const windowWidth = window.innerWidth;
    const windowHeight = document.documentElement.scrollHeight;
    const imageSize = 100;
    const minDistance = 150; // Aumentar la distancia mínima entre las imágenes
    const gridWidth = Math.floor(windowWidth / (imageSize + minDistance));
    const gridHeight = Math.floor(windowHeight / (imageSize + minDistance));
  
    // Create a grid of possible positions
    const grid = [];
    for (let x = 0; x < gridWidth; x++) {
      for (let y = 0; y < gridHeight; y++) {
        grid.push({
          x: x * (imageSize + minDistance),
          y: y * (imageSize + minDistance)
        });
      }
    }
  
    // Shuffle the grid to randomize position selection
    for (let i = grid.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [grid[i], grid[j]] = [grid[j], grid[i]];
    }
  
    // Place images on the grid
    images.forEach((img, index) => {
      if (index < grid.length) {
        const { x, y } = grid[index];
        const randomRotation = Math.random() * 360; // Random rotation between 0 and 360 degrees
        img.style.transform = `translate(${x}px, ${y}px) rotate(${randomRotation}deg)`;
      }
    });
  
    // Add extra images if needed to cover the screen
    const fondo = document.getElementById('fondo');
    if (images.length < grid.length) {
      for (let i = images.length; i < grid.length; i++) {
        const img = document.createElement('img');
        img.src = 'iconos/bebidas.png';
        img.className = 'fon';
        const { x, y } = grid[i];
        const randomRotation = Math.random() * 360; // Random rotation between 0 and 360 degrees
        img.style.transform = `translate(${x}px, ${y}px) rotate(${randomRotation}deg)`;
        fondo.appendChild(img);
      }
    }
  });
  