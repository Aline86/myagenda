document.querySelector("#Bouton").onclick = function(e) {
    if (window.getComputedStyle(document.querySelector('#form')).display=='none'){
        document.querySelector("#form").style.display="block";
        if (window.getComputedStyle(document.querySelector('#form2')).display=='block'){
            document.querySelector("#form2").style.display="none";
        }     
    } else {
        document.querySelector("#form").style.display="none";   
    } 
}   

$('#Bouton').click(function(event){
    event.stopPropagation();
}); 
    
$('#Bouton2').click(function(event){
    event.stopPropagation();
}); 
$('.inside').click(function() {

    document.querySelector("#form").style.display="none";
    document.querySelector("#form2").style.display="none";
    });


    

    