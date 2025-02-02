//Wizard Init

$("#wizard").steps({
    headerTag: "h3",
    bodyTag: "section",

    transitionEffect: $.fn.steps.transitionEffect.fade,
    transitionEffectSpeed: 200,
    titleTemplate: '#title#',
    buttonText:{
        next:'Save & Continue'
    },
    labels:{
        loading: "Loading ..."
    },

    onStepChanged: function (event, currentIndex, priorIndex) {
        if(priorIndex < currentIndex){

            // if(priorIndex === 0){
            //     BasicInfo.submitFormData()
            // }
            //
            // if(priorIndex === 1){
            //     Education.submitFormData();
            // }
            //
            // if(priorIndex === 2){
            //     Experience.submitFormData();
            // }
            // if(priorIndex === 3){
            //     preferenceServer.submitFormData();
            // }
            // if(priorIndex === 4){
            //
            // }
        }


    },
    onFinished: function (event, currentIndex) {
        Document.submitFormData();
    },
});

//Form control
$('#firstName').on('change', function(e) {
    $('#enteredFirstName').text(e.target.value || 'Cha');
});

$('#lastName').on('change', function(e) {
    $('#enteredLastName').text(e.target.value || 'Ji-Hun C');
});

$('#phoneNumber').on('change', function(e) {
    $('#enteredPhoneNumber').text(e.target.value || '+230-582-6609');
});

$('#emailAddress').on('change', function(e) {
    $('#enteredEmailAddress').text(e.target.value || 'willms_abby@gmail.com');
});

$('#designation').on('change', function(e) {
    $('#enteredDesignation').text(e.target.value || 'Junior Developer');
});

$('#department').on('change', function(e) {
    $('#enteredDepartment').text(e.target.value || 'UI Development');
});

$('#employeeNumber').on('change', function(e) {
    $('#enteredEmployeeNumber').text(e.target.value || 'JDUI36849');
});

$('#workEmailAddress').on('change', function(e) {
    $('#enteredWorkEmailAddress').text(e.target.value || 'willms_abby@company.com');
});

