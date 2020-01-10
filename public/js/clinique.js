$(document).ready(function(){
    $("#rechercher").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#consultationList tr, #hospitalisationList tr, #chambreList tr, #dossierPatientList tr, #facturationList tr, #patientList tr, #personnelList tr, #rendezVousList tr, #serviceList tr, #utilisateurList tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    setTimeout(() => {
       $ ('#msgFlash').hide();
    }, 3000);

    $('.js-datepicker').datetimepicker({
        format : 'YYYY-MM-DD hh:mm',
        icons: {
            time: 'fas fa-clock'
        }
    });

    $("#user_status").click(function(){            
        // $("#user_status").attr("value", 'inactif');
        // $(this).toggleClass("actif inactif");
        var test = $("#user_status").val();
        if(test == "actif") {
            $(this).attr("value", 'inactif');
        }else {
            $(this).attr("value", 'actif');
        }
       
    });

    $('#facturation_montantFacture, #facturation_remise').on('paste keyup change', function() {
        var montantFacture = parseInt($('#facturation_montantFacture').val(),10);
        var remise = parseInt($('#facturation_remise').val(),10);
        $('#facturation_montantPaye').val(montantFacture - (montantFacture*remise/100));
    });
    // var val2 = val2|json_encode|raw ;
    // var val1 = $('.nbrConsultation').join(',').text();
    // var val2 = $('.nomPersonnel').text();
    // var val3 = $('.nomService').text();
    // var array = document.getElementById('array').value;
    // var test = JSON.parse(array);
    // // alert(test[key];
    // // for( key in test) {
    //     console.log(test)

    // }

});





// $(".consultation").on( "click", function() {
//     $('#operationsConsultation').toggle(1000);
//     // $(this).find($(".test")).toggleClass("fa-angle-right fa-angle-down");
// });

// $(".hospitalisation").on( "click", function() {
//     $('#operationsHospitalisation').toggle(1000);
//     $(this).find($(".test")).toggleClass("fa-angle-right fa-angle-down");
// });

// $(".dossierPatient").on( "click", function() {
//   $('#operationsDossierPatient').toggle(1000);
//   $(this).find($(".test")).toggleClass("fa-angle-right fa-angle-down");
// });

// $(".patient").on( "click", function() {
//   $('#operationsPatient').toggle(1000);
//   $(this).find($(".test")).toggleClass("fa-angle-right fa-angle-down");
// });

// $(".parametre").on( "click", function() {
//   $('#operationsParametre').toggle(1000);
//   $(this).find($(".test")).toggleClass("fa-angle-right fa-angle-down");
// });