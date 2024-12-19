// JavaScript pour faire défiler les images manuellement
        let currentIndex = 0;
        const images = document.querySelectorAll('.carrousel-images img');
        const dots = document.querySelectorAll('.dot');
        const totalImages = images.length;

        const updateCarrousel = () => {
            // Déplace les images pour afficher la bonne image
            const carrouselImages = document.querySelector('.carrousel-images');
            carrouselImages.style.transform = `translateX(-${currentIndex * 100}%)`;

            // Met à jour les points
            dots.forEach((dot, index) => {
                dot.classList.remove('active');
                if (index === currentIndex) {
                    dot.classList.add('active');
                }
            });
        };

        // Fonction pour afficher l'image précédente
        const prevSlide = () => {
            currentIndex = (currentIndex === 0) ? totalImages - 1 : currentIndex - 1;
            updateCarrousel();
        };

        // Fonction pour afficher l'image suivante
        const nextSlide = () => {
            currentIndex = (currentIndex === totalImages - 1) ? 0 : currentIndex + 1;
            updateCarrousel();
        };

        // Ajouter les événements de clic pour les boutons
        document.querySelector('.prev').addEventListener('click', prevSlide);
        document.querySelector('.next').addEventListener('click', nextSlide);

        // Ajouter un événement sur les points de navigation
        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                currentIndex = index;
                updateCarrousel();
            });
        });

        // Initialiser le carrousel
        updateCarrousel();