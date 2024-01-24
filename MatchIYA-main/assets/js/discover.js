document.addEventListener('DOMContentLoaded', () => {
    const cards = Array.from(document.querySelectorAll('.card-stack .card'));
    const likeButton = document.getElementById('like_button');
    const dislikeButton = document.getElementById('dislike_button');
    let activeCardIndex = cards.length - 1;

    

    let zIndexCounter = 1000;
    function applyCardStyles() {
        const maxOpacity = 1;
        const opacityDecrement = 0.4; // This is the amount by which the opacity will decrease for each card down the stack
    
        cards.forEach((card, index) => {
            const reverseIndex = cards.length - 1 - index;
            card.style.zIndex = zIndexCounter - reverseIndex;
            card.style.transform = `rotate(${reverseIndex * -10}deg)`;

            // Calculate opacity for the stroke and text
            let strokeAndTextOpacity = maxOpacity - (reverseIndex * opacityDecrement);
            strokeAndTextOpacity = strokeAndTextOpacity < 0 ? 0 : strokeAndTextOpacity; // Ensure opacity doesn't go below 0

            // Apply the calculated opacity to the stroke and text color
            card.style.borderColor = `rgba(248, 36, 40, ${strokeAndTextOpacity})`;
            card.style.color = `rgba(248, 36, 40, ${strokeAndTextOpacity})`;
        });
    }

    applyCardStyles();

    function handleCardAction(action) {
        if (activeCardIndex < 0) return;
        const card = cards[activeCardIndex];
        card.style.zIndex = 10000;
        card.classList.add(`${action}-animate`);
        card.addEventListener('transitionend', () => handleCardRemoval(card), { once: true });
    }

    function handleCardRemoval(card) {
        card.remove();
        cards.splice(activeCardIndex, 1);
        activeCardIndex--;
        applyCardStyles(); 
    }

    likeButton.addEventListener('click', () => handleCardAction('like'));
    dislikeButton.addEventListener('click', () => handleCardAction('dislike'));
});
