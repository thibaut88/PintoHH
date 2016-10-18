$(".button-collapse").sideNav();


// POUR LE SELECT
$(document).ready(function() {
    $('select').material_select();
});


// POUR LE COLLAPSE BAR
$(document).ready(function(){
    $('.collapsible').collapsible({
        accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });
});

// POUR LE MODAL - FICHE DU BAR
$(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
});

