var nameInput = document.getElementById('name');
var btn = document.getElementById('btn');
nameInput.addEventListener('input', function(){
    var val = nameInput.value;
    if(val.length < 3 || val.length > 10){
        nameInput.classList.add("is-invalid");
        nameInput.classList.remove("is-valid");
        btn.setAttribute("disabled","true");
    }
    else{
        
        nameInput.classList.remove("is-invalid");
        nameInput.classList.add("is-valid");
        btn.removeAttribute("disabled");
    }
});