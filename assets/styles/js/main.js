let body = document.querySelector('body');

document.addEventListener("DOMContentLoaded", initial);

function initial(){
    // display body
    displayBody();

    // upscreen arrow on scroll
    scrollUpScreen()
}

function displayBody() {
    
    tl = gsap.timeline({ defaults:{duration: .1}})
        tl.to(body, { ease: "power2", opacity: 1});

}

function scrollUpScreen(){
    const upScreen = document.querySelector('#up-screen')
    upScreen.addEventListener("click", function(){
        document.querySelector('html').scrollTo({
            top: 0,
            behavior: "smooth"
            })
    })

    window.addEventListener('scroll', function(e) {
        y = window.scrollY;
        if(y > 150){
            upScreen.style.display = 'initial';
    
        }else{
            upScreen.style.display = 'none'
        }
    })

}
