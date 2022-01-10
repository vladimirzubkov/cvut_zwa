/**
 * Check if fields in form are empty.
 */
function kontrola(e){
    var input = document.getElementsByTagName('input');
    for (var i = 0; i < input.length; i++) {
        // only validate the input that have the required attribute
        if(input[i].hasAttribute("name")){
            if(input[i].value == ""){
                // found an empty field that is required
                event.preventDefault();
                input[i].classList.add("error");
                return false;
            }
        }
    }
    return true;
}

window.addEventListener("load", function(){
    /* target elements */
    const form = document.querySelector("form");

    /* listeners */
    if (form != null){
        form.addEventListener("submit", kontrola);
        console.log("form loaded");
    }
})