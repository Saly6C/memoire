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

    $('.js-datepicker').datepicker({
        format: 'yyyy-mm-dd' ,
        startDate: 'd',
        todayHighlight: true,    
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