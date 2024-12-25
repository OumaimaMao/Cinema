
/*Script Navbar*/
var navbar = document.querySelector('nav')
    window.onscroll = function() {
        // pageYOffset or scrollY
        if (window.pageYOffset > 0) {
            navbar.classList.add('scrolled')
        } else {
            navbar.classList.remove('scrolled')
        }
    }
    function shiftLeft(){
      var navLinks = document.getElementById('navLinks');
      navLinks.classList.toggle('shifted');
    }
    /*toggle button*/
    document.addEventListener('DOMContentLoaded', function() {
      var navbar = document.querySelector('nav');
      var toggleButton = document.getElementById('navbarToggle');
      
      // Toggle class on button click
      toggleButton.addEventListener('click', function() {
        navbar.classList.toggle('nav-toggle-active');
      });
    
      // Scroll event for adding 'scrolled' class
      window.onscroll = function() {
        if (window.pageYOffset > 0) {
          navbar.classList.add('scrolled');
        } else {
          navbar.classList.remove('scrolled');
        }
      };
    });
    /*Carousel*/
let nextDom = document.getElementById('next');
let prevDom = document.getElementById('prev');
let carouselDom = document.querySelector('.carousel');
let listItemDom = document.querySelector('.carousel .list');
let thumbnailDom = document.querySelector('.carousel .thumbnail');

nextDom.onclick = function(){
    showSlider('next');
}
prevDom.onclick = function(){
    showSlider('prev');
}
let timeRunning = 3000;
let timeAutoNext = 7000;
let runTimeOut;
let runAutoRun = setTimeout(()=> {
    nextDom.click();
}, timeAutoNext);
function showSlider(type){
    let itemSlider = document.querySelectorAll('.carousel .list .item');
    let itemThumbnail = document.querySelectorAll('.carousel .thumbnail .item');

    if(type === 'next'){
         // Clone the first item for both main and thumbnail sliders
         let clonedItemSlider = itemSlider[0].cloneNode(true);
         let clonedItemThumbnail = itemThumbnail[0].cloneNode(true);
           // Append the cloned elements to the end
        listItemDom.appendChild(clonedItemSlider);
        thumbnailDom.appendChild(clonedItemThumbnail);
          // Remove the original first elements
          itemSlider[0].remove();
          itemThumbnail[0].remove();

        /*listItemDom.appendChild(itemSlider[0]);
        thumbnailDom.appendChild(itemSlider[0]);*/
        carouselDom.classList.add('next');
    }else{
        let positionLastItem = itemSlider.length - 1;
        //add
        let positionLastThumbnail = itemThumbnail.length - 1;
         // Clone the last item for both main and thumbnail sliders
         let clonedItemSlider = itemSlider[positionLastItem].cloneNode(true);
         let clonedItemThumbnail = itemThumbnail[positionLastThumbnail].cloneNode(true);
   // Prepend the cloned elements to the beginning
   listItemDom.prepend(clonedItemSlider);
   thumbnailDom.prepend(clonedItemThumbnail);
      // Remove the original last elements
      itemSlider[positionLastItem].remove();
      itemThumbnail[positionLastThumbnail].remove();

        /*listItemDom.prepend(itemSlider[positionLastItem]);
        thumbnailDom.prepend(itemThumbnail[positionLastItem]);*/
        carouselDom.classList.add('prev');
    }
    clearTimeout(runTimeOut);
    runTimeOut = setTimeout(() =>{
        carouselDom.classList.remove('next');
        carouselDom.classList.remove('prev');
    }, timeRunning)
    clearTimeout(runAutoRun);
    runAutoRun = setTimeout(()=>{
        nextDom.click();
    }, timeAutoNext);
}



