const descriptionElement = document.querySelector('.word-description');

if(descriptionElement){
    descriptionElement.addEventListener('click', () => revealWord());
    
    const revealWord = () => {
        descriptionElement.style.background = "transparent";
        descriptionElement.style.cursor = "default";
    }
}