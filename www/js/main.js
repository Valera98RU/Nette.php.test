$(function(){
    $.nette.init();

});
function clearTableEmployee(){

    document.getElementById('table_body').innerHTML = "";

}

function viewUserCard(){
    let card = document.getElementById('userCard');
    
    switch (card.style.display) {
        
        case 'block':
            card.style.display='none';
            break;
        case 'none':
            card.style.display='block';
            break;                       

    }

    
    
}


function DisableVisibleDeleteButton(){

    let ArrayChecks = document.getElementsByName('DeleteCheckbox');
    let CheckArray = 0;
    let addedHref = ""
    for(let i = 0 ; i < ArrayChecks.length;i++){
        if(ArrayChecks[i].checked){
            document.getElementById('ComboDeleteButton').style.display="block";



            break;
        }
            document.getElementById('ComboDeleteButton').style.display="none";

    }



}




