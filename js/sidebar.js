const hamburger = document.querySelector("#toggle-btn");
const icon = document.querySelector("#toggle-btn i");

hamburger.addEventListener("click", function(){
    document.querySelector("#sidebar").classList.toggle("expand");
    document.querySelector("#main").classList.toggle("expand");
    
    if(icon.classList.contains("bi-list")){
        document.querySelector("#toggle-btn i").classList.add("bi-x-lg");
        document.querySelector("#toggle-btn i").classList.remove("bi-list");
    }
    else{
        document.querySelector("#toggle-btn i").classList.add("bi-list");
        document.querySelector("#toggle-btn i").classList.remove("bi-x-lg");
    }
});