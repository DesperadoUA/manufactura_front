// Создание анимаци 
const animate_blocks=document.querySelectorAll('.mm_animate');

var options = {
    root: null,
    rootMargin: "0px 0px 300px 0px",
    threshold: WIDTH_SCREEN < 1200 ? 0.1 : 0.3
}
function handleAnimate(animate_blocks, observer) { 
    animate_blocks.forEach(single_block=>{
        if(single_block.intersectionRatio>0)
        {
            add_animate(single_block.target);
        }
    })
};

function add_animate(block)
{
    if(block.classList.contains('mm_animate'))
    {
        block.classList.add(block.dataset.animate);
        block.classList.remove('mm_animate');
    }
}
const observer = new IntersectionObserver(handleAnimate, options);

animate_blocks.forEach(block => {
    observer.observe(block);
});

// конец создания анимаций