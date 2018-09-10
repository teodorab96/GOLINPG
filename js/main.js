
//OFFICES
var slika = document.querySelectorAll('.off');
var slika_src = [];
for(let i=0;i<slika.length; i++){
    slika_src[i] = slika[i].src;
    slika_src[i] = slika_src[i].slice(44);
}
for(let i=0 ; i<slika.length ;i++){
slika[i].addEventListener("mouseover", zamjeni);
slika[i].addEventListener("mouseout",vrati);
function zamjeni(){
    slika[i].src = "images/Offices/uboji/"+slika_src[i];
}
function vrati(){
    slika[i].src = "images/Offices/cnb/"+slika_src[i];
}}


//Dugme za zakazivanje
var ZModal = document.getElementById('zakaziModal');
var dugme = document.querySelector('#zakazibtn');
var form = document.querySelector('#zakazi');
var x = document.querySelector('#x');

dugme.addEventListener("click",prikazi);
x.addEventListener('click',sakrij);

function sakrij(){
    ZModal.style.display ='none';
    form.style.display = "none";
}
function prikazi(){
    form.style.display = "block";
    ZModal.style.display = "block"
}


//Login 
var modal = document.getElementById('loginModal');
var login_dugme = document.querySelector('#loginbtn');
var login_x = document.querySelector('#x1');
var login_form = document.querySelector('#login');


login_dugme.onclick = function() {
    modal.style.display = "block";
    login_form.style.display = "block";
}
login_x.onclick = function() {
    modal.style.display = "none";
    login_form.style.display = "none";
}

//Clients

var klijenti = document.querySelectorAll(".klijent");
var strelica = document.createElement('img');
var overlay = document.createElement('div');
overlay.setAttribute('id','overlay');
strelica.setAttribute('src','images/strelica.svg');
strelica.setAttribute('id','strelica');
overlay.appendChild(strelica);
for (let i=0; i<klijenti.length ; i++){
    klijenti[i].addEventListener('mouseover',strelicaOnHover);
function strelicaOnHover(){
    klijenti[i].appendChild(overlay);
}
}
/*Mapa */

$(document).ready(function(){
    function init_map(){
        var myOptions = {
            zoom:15,
            center:new google.maps.LatLng(42.443665,19.249861),
            mapTypeId: google.maps.MapTypeId.ROADMAP};
        map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);
        marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(42.443665,19.249861)});
        infowindow = new google.maps.InfoWindow({
            content:'Ampliudo DOO<br>'
                                                });
        google.maps.event.addListener(marker, 'click', function(){
            infowindow.open(map,marker);});
        infowindow.open(map,marker);}
        google.maps.event.addDomListener(window, 'load', init_map);
    
    
        var kod = document.querySelector('#kod');
        var submit = document.querySelector('#btns');
        var p = document.querySelector('#prazno');
        
        submit.addEventListener("click",function (e){
            if(kod.value === ''){
                e.preventDefault();
               p.innerText = '*Neispravan unos';
            }
        });
    });