const activarEnlace = (posicion) => {
    let enlaces = document.getElementsByClassName('nav-item');
    for(const enlace of enlaces)  enlace.className = "nav-item";
    enlaces[posicion].className = "nav-item active";
}