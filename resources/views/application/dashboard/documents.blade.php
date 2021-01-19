@extends('application.dashboard.layouts.app')
@section('title','Tutor | Basic Information')
<script src="{{asset('assets/js/registeration_form.js')}}"></script>
@section('content')


    <div class="col-lg-8 col-xl-9">

       @if (!$document)

                <div class="sl-dashboardbox">
                    <div class="sl-dashboardbox__title">
                        <h2>Document Information</h2>
                    </div>
                    <div class="sl-dashboardbox__content sl-manageTimeSlots">
                        <div class="row" style="margin: 10px;padding: 15px">

                            <span style="color: orangered"><i class="fa fa-star"></i>  &nbsp; All documents are for internal use only & are not released to clients, except recent photo.</span>
                            <br/>
                            <span>  <i class="fa fa-star"></i>  &nbsp;  Please provide the following for verification check.</span>
                            <span style="color: #00d69f"> <i class="fa fa-star"></i>  &nbsp;  Verified tutors will have priority in assignments. Please cover your NRIC number, for your own privacy.</span>

                        </div>
                    </div>
                </div>

            <form method="POST" action="{{route('tutor.profile.document_info')}}" enctype="multipart/form-data"  id="document_form">
                @csrf
                <input type="submit"/>
                <div class="sl-dashboardbox">
                    <div class="sl-dashboardbox__title">
                        <h2>Academic Certificates</h2>
                    </div>
                    <div class="sl-dashboardbox__content sl-manageTimeSlots">
                        <table class="table table-striped" id="academic_certificates_table">
                            <tbody>
                            <tr>
                                <td>
                                    <input type="file" name="certificates[]" class="form-control"/>
                                </td>


                                <td>
                                    <span> <i onclick="Document.addCerticateFieldRow('academic_certificates_table')" class="fa fa-plus" style="cursor: pointer;color: #00d69f"></i> </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="sl-dashboardbox">
                    <div class="sl-dashboardbox__title">
                        <h2>Proof of Citizenship</h2>
                    </div>
                    <div class="sl-dashboardbox__content sl-manageTimeSlots">
                        <div class="form-group">
                            <div class="sl-manageServices__upload">
                                <div class="sl-manageServices__uploadarea">
                                    <span><i class="fas fa-cloud-upload-alt"></i></span>
                                    <h5>Provide Image/File as Proof of citizenship</h5>
                                    <p>Drop image here or click <label for="file1"><span><input id="file1" required type="file" name="proof_citizenship"> upload</span></label> <i class="far fa-question-circle toltip-content tipso_style" data-tipso="name"></i></p>
                                    <svg>
                                        <rect width="100%" height="204px"></rect>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sl-dashboardbox">
                    <div class="sl-dashboardbox__title">
                        <h2>Photo ID showing Photo & Name</h2>
                    </div>
                    <div class="sl-dashboardbox__content sl-manageTimeSlots">
                        <div class="form-group">
                            <div class="sl-manageServices__upload">
                                <div class="sl-manageServices__uploadarea">
                                    <span><i class="fas fa-cloud-upload-alt"></i></span>
                                    <h5>Clearer Picture to identify your identity</h5>
                                    <p>Drop image here or click <label for="file2"><span><input id="file2" required type="file" name="photo_id"> upload</span></label> <i class="far fa-question-circle toltip-content tipso_style" data-tipso="name"></i></p>
                                    <svg>
                                        <rect width="100%" height="204px"></rect>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sl-dashboardbox">
                    <div class="sl-dashboardbox__title">
                        <h2>Recent Photo</h2>
                    </div>
                    <div class="sl-dashboardbox__content sl-manageTimeSlots">
                        <div class="form-group">
                            <div class="sl-manageServices__upload">
                                <div class="sl-manageServices__uploadarea">
                                    <span><i class="fas fa-cloud-upload-alt"></i></span>
                                    <h5>Most Recent Image</h5>
                                    <p><label for="file3"><span><input id="file3" required type="file" name="recent_photo"> upload</span></label> <i class="far fa-question-circle toltip-content tipso_style" data-tipso="name"></i></p>
                                    <svg>
                                        <rect width="100%" height="204px"></rect>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sl-dashboardbox">
                    <div class="sl-dashboardbox__title">
                        <h2>
                            Any Additional Supported Documents
                        </h2>
                    </div>
                    <div class="sl-dashboardbox__content sl-manageTimeSlots">
                        <table class="table table-striped" id="additional_documents_table">
                            <tbody>
                            <tr>
                                <td>
                                    <input type="file" name="supported_documents[]" class="form-control"/>
                                </td>



                                <td>
                                    <span> <i onclick="Document.addAdditionalDocumentRow('additional_documents_table')" class="fa fa-plus" style="cursor: pointer;color: #00d69f"></i> </span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="sl-dashboardbox">
                    <div class="sl-dashboardbox__title">
                        <h2>Completed</h2>
                    </div>
                    <div class="sl-dashboardbox__content">
                        <fieldset>
                            <div class="sl-form__wrap">



                                <div class="form-group sl-manageTimeSlots__btn">
                                    <input type="submit" class="btn sl-btn"/>Save & Continue</input>
                                    <p>Once submitted there will be no way to rollback </p>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </form>

        @else
            <div class="sl-dashboardbox">
                <div class="sl-dashboardbox__title">
                    <h2>Locked</h2>
                </div>
                <div class="sl-dashboardbox__content">
                    <fieldset>
                        <div class="sl-form__wrap">



                            <div class="form-group sl-manageTimeSlots__btn">

                                <p>Documents Record is Already added </p>
                            </div>
                        </div>
                        <div class="row">
                            <?php generateFlashMessage();?>
                        </div>
                    </fieldset>
                </div>
            </div>
       @endif


@endsection
<script>
    function submitForm(){
        var form = document.querySelector('form#document_form');
        const formData = new FormData(form);
        $.ajax({
            url:"{{route('tutor.profile.document_info')}}",
            type:'POST',
            data:formData,
            processData:false,
            cache:false,
            contentType:false,
            success:function (response) {
                console.log(response)
            }
        })
    }
    </script>

