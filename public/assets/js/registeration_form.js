var ids = [];
var index = 0;
var commonServer = {

    removeMajorCourse:(e)=>{
        if(e.target ){
            (e.target.parentNode.parentNode.parentNode.remove())
        }else{
            (e.parentNode.parentNode).remove();
        }
    },
    addCourseMajor:(e)=>{



        const parent = document.getElementById(e);

        const tr = document.createElement('tr');

        var td;
        var input;

        td = document.createElement('td');

        input = document.createElement('input');
        input.classList.add("form-control");
        input.placeholder="Course/Major Title";
        input.name="course_name[]";


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

    addCollapseSection:(parent)=>{



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
        $.ajax({
            url:config['card.load'],
            data:{cardid:obj.cardid,parent:obj.parent,index:index},
            dataType:'html',
            success:function (response) {
                const spn = document.createElement('span');
                spn.id = obj.span;

                document.getElementById(parent).appendChild(spn);
                document.getElementById(spn.id).innerHTML = response;
            }
        })

        index+=1;




    },

    testi:()=>{
        $.ajax({
            url:config['card.load'],
            data:{cardid:obj.cardid,parent:obj.parent,index:index},
            dataType:'html',
            success:function (response) {
                document.getElementById(parent).innerHTML+=response
            }
        })
    },

    removeCollapseSection:(current)=>{
        document.getElementById(current).remove()
    },

    getDynamicTdElement:()=>{
        const td = document.createElement('td');

    },
    addSubjectAndGrade:(e)=>{
        const parent = document.getElementById(e);

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

        // <td>
        //                                 <span onclick="commonServer.removeSubjectAndGradeRow(this)"> <i class="fa fa-trash"   style="color: #b21f2d;cursor: pointer"></i> </span>
        //                             </td>


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

var Education = {

}


jQuery(document).ready(function(){


    jQuery('input[type=radio][name=tutorrole]').on('change',(e)=>{
        commonServer.displayRelatedSection('related_sections',e.target.id);
    })


})
