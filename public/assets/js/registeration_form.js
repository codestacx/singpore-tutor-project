var commonServer = {

    displayRelatedSection:(parent,section)=>{

        const e = document.getElementById(parent);
        e.querySelectorAll('div:not([id='+section+'])').forEach(v=>{
            v.style.display = 'none'
        })

        e.querySelector('#'+section).style.display = '';
    }
}

var Education = {

}


jQuery(document).ready(function(){

    jQuery('input[type=radio][name=tutorrole]').on('change',(e)=>{
        commonServer.displayRelatedSection('related_sections',e.target.id);
    })
})
