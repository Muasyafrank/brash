const menuBtn = document.getElementById(`menu-btn`);
const navLinks = document.getElementById(`nav_links`);
const menuBtnIcon = document.querySelector(`i`);

menuBtn.addEventListener("click",(e)=> {
    navLinks.classList.toggle("open");
    const isOpen = navLinks.classList.contains("open");
    menuBtnIcon.setAttribute("class",isOpen?"ri-close-line":"ri-menu-line");
})
navLinks.addEventListener("click",(e)=>{
    navLinks.classList.remove("open");
    menuBtnIcon.setAttribute("class","ri-menu-line");
})

const scrollRevealOption = {
    distance:"50px", origin:"bottom",duration:1000,
};
ScrollReveal().reveal(".header_image img",{
    ...scrollRevealOption,
    origin:"right"
});
ScrollReveal().reveal(".header_content h1",{
    ...scrollRevealOption,
    delay:500,
});
ScrollReveal().reveal(".header_content p",{
    ...scrollRevealOption,
    delay:1000,
});
ScrollReveal().reveal(".header_links a",{
    ...scrollRevealOption,
    delay:500,
});
ScrollReveal().reveal(".step_card",{
    ...scrollRevealOption,
    interval:500,
});
ScrollReveal().reveal(".service-image img",{
    ...scrollRevealOption,
    origin:"left",
});
ScrollReveal().reveal(".service-content  .service-content",{
    ...scrollRevealOption,
    delay:500,
});
ScrollReveal().reveal(".service-content  .section_header",{
    ...scrollRevealOption,
    delay:1000,
});

ScrollReveal().reveal(".service_list li ",{
    ...scrollRevealOption,
    delay:1500,
    interval:500,
});
ScrollReveal().reveal(".experience_card ",{
    ...scrollRevealOption,
    duration:1000,
    interval:500,
});
ScrollReveal().reveal(".download_image img",{
    ...scrollRevealOption,
    origin:"left",
});
ScrollReveal().reveal(".download-content .section_header h2",{
    ...scrollRevealOption,
    delay:500,
});
ScrollReveal().reveal(".download-content p",{
    ...scrollRevealOption,
    delay:1000,
});
ScrollReveal().reveal(".download_links",{
    ...scrollRevealOption,
    delay:1500,
});
        
