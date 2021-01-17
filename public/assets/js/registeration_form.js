var ids = [];
var index = 1;
var exp_index = 1;
var priv_exp_index=1;
var subject_and_grade = 0;
var commonServer = {
    toggleExperienceForm:(e)=>{
        const el = document.getElementById('moe_school_experience');
        if(e.value === 'No'){
            el.style.display = 'none'
        }else{
            el.style.display = ''
        }
    },


    removeMajorCourse:(e)=>{
        if(e.target ){
            (e.target.parentNode.parentNode.parentNode.remove())
        }else{
            (e.parentNode.parentNode).remove();
        }
    },
    addCourseMajor:(e,INDEX)=>{

        const parent = document.getElementById(e);
        const tr = document.createElement('tr');

        var td;
        var input;

        td = document.createElement('td');
        input = document.createElement('input');
        input.classList.add("form-control");
        input.placeholder="Course/Major Title";
        input.name="course_name["+INDEX+"][]";


        td.appendChild(input);
        tr.appendChild(td);

//<span onclick="this.parentNode.parentNode.remove()"> <i  class="fa fa-trash" style="color: #b21f2d;cursor: pointer"></i> </span>

        td = document.createElement('td')
        const i = document.createElement('i');
        i.classList.add("fa","fa-trash");
        i.style.color='#b21f2d';
        i.style.cursor='pointer';


        const span = document.createElement('span')
        span.addEventListener('click',commonServer.removeMajorCourse.bind(this));

        span.appendChild(i);

        td.appendChild(span);

        tr.appendChild(td);

        parent.appendChild(tr);


    },
    removeSubjectAndGradeRow:(e)=>{
        if(e.target ){
            (e.target.parentNode.parentNode.parentNode.remove())
        }else{
            (e.parentNode.parentNode).remove();
        }


    },




    onChangeSchoolLevel:(e,parent)=>{
        const p  = document.getElementById(parent)
        if([6,7,8].includes(parseInt(e.value))){
            p.querySelector('#course_major_table').style.display=''
            p.querySelector('#table_subjectgrade').style.display='none';
        }else{
            p.querySelector('#table_subjectgrade').style.display='';
            p.querySelector('#course_major_table').style.display='none'
        }
    },
    displayRelatedSection:(parent,section)=>{

        const e = document.getElementById(parent);
        const elements = e.querySelectorAll(':scope > div:not([id='+section+'])');

        elements.forEach(v=>{
            console.log(v.id);
            v.style.display = 'none'
        })

        console.log(section);
        e.querySelector('#'+section).style.display = '';
    },

    addCollapseSection:(parent,i = null)=>{



        while( true){


            var id =Math.random().toString(36).slice(2);
            var pr =Math.random().toString(36).slice(2);
            var span = Math.random().toString(36).slice(2);

            const find = ids.find(e=>e.parent === pr && e.cardid === id && span === e.span)
            if( !find ){
                ids.push({
                    parent:pr,
                    cardid:id,
                    span:span
                })
                break;
            }
        }

        const obj = ids[ids.length-1];

        if(i !== null){
            index = i;
        }
        $.ajax({
            url:config['card.load'],
            data:{cardid:obj.cardid,parent:obj.parent,index:index},
            dataType:'html',
            success:function (response) {
                console.log(response)
                const spn = document.createElement('span');
                spn.id = obj.span;

                document.getElementById(parent).appendChild(spn);
                document.getElementById(spn.id).innerHTML = response;
            }
        })

        index+=1;
        subject_and_grade+=1;




    },

    testi:(a,b,c,d)=>{
        console.log(a,b,c,d);
        document.getElementById('testing').value = a;
    },

    removeCollapseSection:(current)=>{
        document.getElementById(current).remove()
    },

    getDynamicTdElement:()=>{
        const td = document.createElement('td');

    },
    subject_and_grade:1,

    addNewMajor:(e)=>{
        const parent = e.parentNode.parentNode.parentNode;

        const tr = document.createElement('tr');

        var td;
        var input;

        td = document.createElement('td');

        input = document.createElement('input');
        input.classList.add("form-control");
        input.placeholder="Subject";
        input.name="course_name[]";


        td.appendChild(input);
        tr.appendChild(td);





        td = document.createElement('td');

        var a = document.createElement('a');

        a.href='javascript:;';
        a.classList.add("sl-icon","sl-delbtn");

        a.addEventListener('click',(e)=>{console.log(e.target.parentNode.parentNode.parentNode.remove())})
        var i = document.createElement('i');
        i.classList.add("fas","fa-trash");
        i.style.marginTop='10px';
        i.style.marginLeft='15px';


        a.appendChild(i);

        td.appendChild(a);

        tr.appendChild(td);


        parent.appendChild(tr)
    },
    addNewSubjectAndGrade:(e)=>{

        const parent = e.parentNode.parentNode.parentNode;

        const tr = document.createElement('tr');

        var td;
        var input;

        td = document.createElement('td');

        input = document.createElement('input');
        input.classList.add("form-control");
        input.placeholder="Subject";
        input.name="subject[]";


        td.appendChild(input);
        tr.appendChild(td);


        td = document.createElement('td');
        input = document.createElement('input');
        input.classList.add("form-control");
        input.placeholder="Grade";
        input.name="grade[]";

        td.appendChild(input);
        tr.appendChild(td);


        td = document.createElement('td');

        var a = document.createElement('a');

        a.href='javascript:;';
        a.classList.add("sl-icon","sl-delbtn");

        a.addEventListener('click',(e)=>{console.log(e.target.parentNode.parentNode.parentNode.remove())})
        var i = document.createElement('i');
        i.classList.add("fas","fa-trash");
        i.style.marginTop='10px';
        i.style.marginLeft='15px';


        a.appendChild(i);

        td.appendChild(a);

        tr.appendChild(td);





        parent.appendChild(tr)

    },
    addSubjectAndGrade:(e,index)=>{
        const parent = document.getElementById(e);

        const tr = document.createElement('tr');

        var td;
        var input;

        td = document.createElement('td');

        input = document.createElement('input');
        input.classList.add("form-control");
        input.placeholder="Subject";
        input.name="subject["+index+"][]";


        td.appendChild(input);
        tr.appendChild(td);


        td = document.createElement('td');
        input = document.createElement('input');
        input.classList.add("form-control");
        input.placeholder="Grade";
        input.name="grade["+index+"][]";

        td.appendChild(input);
        tr.appendChild(td);


        td = document.createElement('td');
        const i = document.createElement('i');
        i.classList.add("fa","fa-trash");
        i.style.color='#b21f2d';
        i.style.cursor='pointer';


        const span = document.createElement('span')
        span.addEventListener('click',commonServer.removeSubjectAndGradeRow.bind(this));

        span.appendChild(i)


        td.appendChild(span);
        tr.appendChild(td);

        parent.querySelector('#subject_grade_tbody').appendChild(tr)
    }
}


var preferenceServer = {
    submitFormData:()=>{
        var form = document.querySelector('form#prefernce_form');
        var formData = new FormData(form);

        formData.append('action','preferences')

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });

        $.ajax({
            url:config['update-info'],
            type:'POST',
            dataType:'JSON',
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success:function(response){
                console.log(response)
            }
        })
    }
}
var BasicInfo = {
    submitFormData:()=>{
        var form = document.querySelector('form#basic_info_form');
        var formData = new FormData(form);

        formData.append('action','basic-info')

        $(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });

        $.ajax({
            url:config['update-info'],
            type:'POST',
            dataType:'JSON',
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success:function(response){
                console.log(response)
            }
        })
    }
}

var Education = {
    submitFormData:(parent)=>{
        var form = document.getElementById(parent).querySelector('form');
        var formData = new FormData(form);

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });

        $.ajax({
            url:config['update-info'],
            type:'POST',
            dataType:'JSON',
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success:function(response){
                console.log(response)
            }
        })
    },
    // submitFormData:()=>{
    //     var form = document.querySelector('form#education_form');
    //     var formData = new FormData(form);
    //
    //     formData.append('action','educational-info')
    //
    //     $(function() {
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    //             }
    //         });
    //     });
    //
    //     $.ajax({
    //         url:config['update-info'],
    //         type:'POST',
    //         dataType:'JSON',
    //         data:formData,
    //         processData:false,
    //         contentType:false,
    //         cache:false,
    //         async:false,
    //         success:function(response){
    //             console.log(response)
    //         }
    //     })
    // }
}


var Experience = {


    addAnotherRow:()=>{
      alert('working');
    },
    submitFormData:()=>{
        var form = document.querySelector('form#experience_form');
        var formData = new FormData(form);

        formData.append('action','experience-info')

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });

        $.ajax({
            url:config['update-info'],
            type:'POST',
            dataType:'JSON',
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success:function(response){
                console.log(response)
            }
        })
    },
    addAnotherMoeExperienceLevelRow:(e)=>{

        const element = document.getElementById(e);
        // const html ='    <tr>\n' +
        //     '                        <td>\n' +
        //     '                            <select name="" id="" class="custom-select custom-select-sm">\n' +
        //     '                                <option disabled selected> Level</option>\n' +
        //     '                            </select>\n' +
        //     '                        </td>\n' +
        //     '\n' +
        //     '                        <td>\n' +
        //     '                            <input type="text" class="form-control" name="Subject level to see Subjects"/>\n' +
        //     '                        </td>\n' +
        //     '\n' +
        //     '                        <td>\n' +
        //     '                            <input type="text" class="form-control" name="" id="" />\n' +
        //     '                        </td>\n' +
        //     '\n' +
        //     '                        <td>\n' +
        //     '                            <input type="text" class="form-control" name="" id="" />\n' +
        //     '                        </td>\n' +
        //     '\n' +
        //     '\n' +
        //     '                        <td>\n' +
        //     '                            <input type="text" class="form-control" name="" id="" />\n' +
        //     '                        </td>\n' +
        //     '                        <td>\n' +
        //     '                           <i class="fa fa-trash" style="cursor:pointer;color: #b21f2d" onclick="this.parentNode.parentNode.remove()"></i>\n' +
        //     '                        </td>\n' +
        //     '                    </tr>';


        $.ajax({
            url:config['get-experience-row'],
            type:'GET',
            data:{action:'experience-info',index:exp_index,row:'moe'},
            dataType:'html',
            success:function(response){
                element.querySelector('tbody tr').insertAdjacentHTML('afterend',response);
                $('.selectpicker').selectpicker();
                exp_index+=1;
            }
        })


    },
    addAnotherPrivateExperienceLevelRow:(e)=>{
        const element = document.getElementById(e);
        $.ajax({
            url:config['get-experience-row'],
            type:'GET',
            data:{action:'experience-info',index:priv_exp_index,row:'private'},
            dataType:'html',
            success:function(response){
                element.querySelector('tbody tr').insertAdjacentHTML('afterend',response);
                $('.selectpicker').selectpicker();
                priv_exp_index+=1;
            }
        })
        // const html ='    <tr>\n' +
        //     '                        <td>\n' +
        //     '                            <select name="" id="" class="custom-select custom-select-sm">\n' +
        //     '                                <option disabled selected> Level</option>\n' +
        //     '                            </select>\n' +
        //     '                        </td>\n' +
        //     '\n' +
        //     '                        <td>\n' +
        //     '                            <input type="text" class="form-control" name="Subject level to see Subjects"/>\n' +
        //     '                        </td>\n' +
        //     '\n' +
        //     '                        <td>\n' +
        //     '                            <input type="text" class="form-control" name="" id="" />\n' +
        //     '                        </td>\n' +
        //     '\n' +
        //     '                        <td>\n' +
        //     '                            <input type="text" class="form-control" name="" id="" />\n' +
        //     '                        </td>\n' +
        //     '\n' +
        //     '\n' +
        //     '                        <td>\n' +
        //     '                            <input type="text" class="form-control" name="" id="" />\n' +
        //     '                        </td>\n' +
        //     '                        <td>\n' +
        //     '                           <i class="fa fa-trash" style="cursor:pointer;color: #b21f2d" onclick="this.parentNode.parentNode.remove()"></i>\n' +
        //     '                        </td>\n' +
        //     '                    </tr>';

        element.querySelector('tbody tr').insertAdjacentHTML('afterend',html)
    }
}



var Document = {
    submitFormData:()=>{
        var form = document.querySelector('form#document_form');
        var formData = new FormData(form);

        formData.append('action','document-info')

        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
        });

        $.ajax({
            url:config['update-info'],
            type:'POST',
            dataType:'JSON',
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success:function(response){
                const url = window.location;
            }
        })
    },
    addCerticateFieldRow:(e)=>{
        const element = document.getElementById(e);
        const html = ' <tr>\n' +
            '                    <td>\n' +
            '                        <input type="file" name="certificates[]" class="form-control"/>\n' +
            '                    </td>\n' +
            '                    <td>\n' +
            '                        Empty\n' +
            '                    </td>\n' +
            '                    <td>\n' +
            '                         <i onclick="this.parentNode.parentNode.remove()" class="fa fa-trash" style="color: #b21f2d;cursor:pointer;"></i>\n' +
            '                    </td>\n' +
            '\n' +
            '                    <td>\n' +
            '                        <span> <i onclick="Document.addCerticateFieldRow(\'academic_certificates_table\')" class="fa fa-plus" style="cursor: pointer;color: #00d69f"></i> </span>\n' +
            '                    </td>\n' +
            '                </tr>';

        element.querySelector('tbody tr').insertAdjacentHTML('afterend',html);
    },
    addAdditionalDocumentRow:(e)=>{
        const element = document.getElementById(e);
        const html = ' <tr>\n' +
            '                    <td>\n' +
            '                        <input type="file" name="supported_documents[]" class="form-control"/>\n' +
            '                    </td>\n' +
            '                    <td>\n' +
            '                        Empty\n' +
            '                    </td>\n' +
            '                    <td>\n' +
            '                         <i onclick="this.parentNode.parentNode.remove()" class="fa fa-trash" style="color: #b21f2d;cursor:pointer;"></i>\n' +
            '                    </td>\n' +
            '\n' +
            '                    <td>\n' +
            '                        <span> <i onclick="Document.addCerticateFieldRow(\'academic_certificates_table\')" class="fa fa-plus" style="cursor: pointer;color: #00d69f"></i> </span>\n' +
            '                    </td>\n' +
            '                </tr>';

        element.querySelector('tbody tr').insertAdjacentHTML('afterend',html);
    }
}
jQuery(document).ready(function(){


    jQuery('input[type=radio][name=tutorrole]').on('change',(e)=>{
        commonServer.displayRelatedSection('related_sections',e.target.id);
    })



    jQuery('#btnb').on('click',(e)=>{

    })

})
