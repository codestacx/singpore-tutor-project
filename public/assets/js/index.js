var Server = {
    requestForTutor:()=>{
        var form = document.querySelector('form#tutor_free_request_form');
        var formData = new FormData(form);
        console.log(formData);

        $(function () {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-Token':$('meta[name="_token"]').attr('content')
                }
            })
        });

        $.ajax({
            url:config['tutor.request'],
            type:"POST",
            data:formData,
            processData:false,
            contentType:false,
            cache:false,


            success:function (response) {

                const div = document.createElement('div');
                div.classList.add("alert","alert-success");
                div.innerText = "Your request has been dispatched successfully";
                document.getElementById('response_message').appendChild(div);
                setTimeout(()=>{
                    div.remove();
                    window.location.reload();
                },3000)

            }
        })




    },
     addAnotherTutorRequestFormRow:()=>{
        $.ajax({
            url:config['tutor.request.row'],
            type:'GET',
            dataType:'html',
            success:function(response){
                document.getElementById('add_level_grade').insertAdjacentHTML('beforeend',response)
            }
        })
    }
}
