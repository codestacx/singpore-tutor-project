<!-- murshad code -->


<?php

require_once '../config/app.php';
$basepath = appPath();
$baseurl = appUrl();

require_once $basepath.'/blogs/eachblog.php';
require_once $basepath.'/blogs/getting_comments.php';
require_once $basepath.'/blogs/getting_tags.php';

$rowcount=mysqli_num_rows($comments);

$id = $data['id'];

?>


    <!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
    <meta charset="utf-8">
    <meta name="metaTitle" content="<?php echo $data['meta_title'] ?>" >
    <meta name="metaDescription" content="<?php echo $data['meta_description'] ?>">
    <meta name="author" content="<?php echo $data['blog_author'] ?>">
    <meta name="keywords" content="<?php echo $res ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl.'/assets/css/bootstrap.min.css'?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl.'/assets/css/animate.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl.'/assets/css/style.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl.'/assets/css/responsive.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl.'/assets/css/slick.css'?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $baseurl.'/assets/css/slick-theme.css'?>"/>

</head>
<body>
<header>
    <div class="header-inner">
        <div class="container">
            <div class="row justify-content-between">
                <div class="header-inner-left px-3">
                    <a href="<?php echo $baseurl.'/index.php' ?>" class="logo-box">
                        <img src="<?php echo $baseurl.'/assets/images/logo.svg'?>" class="logo" alt="logo">
                    </a>
                </div>
                <div class="header-inner-right px-3 d-flex flex-wrap align-items-center">
                    <div class="main-menu mr-4">
                        <nav class="inline-menu">
                            <ul>
                                <li><a href="<?php echo $baseurl.'/blogs/blog.php' ?>">Blog</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Career Expo</a></li>
                                <li>
                                    <a href="#">Employers</a>
                                    <ul>
                                        <li><a href="#">Employer Item 1</a></li>
                                        <li><a href="#">Employer Item 2</a></li>
                                        <li><a href="#">Employer Item 3</a></li>
                                        <li><a href="#">Employer Item 4</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Job Seekers</a>
                                    <!-- <ul>
                                        <li><a href="#">Job Seekers Item 1</a></li>
                                        <li><a href="#">Job Seekers Item 2</a></li>
                                        <li><a href="#">Job Seekers Item 3</a></li>
                                        <li><a href="#">Job Seekers Item 4</a></li>
                                    </ul> -->
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-actions">
                        <nav class="inline-menu">
                            <ul>
                                <li><a href="#">Login</a></li>
                                <li><a href="#" class="btn btn-white">Join</a></li>
                                <li><a href="#" class="btn btn-primary">Post a Job</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="toggle-btn position-relative ml-4">
                        <span class="line line1"></span>
                        <span class="line line2"></span>
                        <span class="line line3"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<section style="background-image: url('/assets/images/home-banner.png');" class="banner bg-cover-center">
    <div class="container">
        <div class="banner-content text-center">
            <h1 class="banner-title bann-text">Our Blogs</h1>
            <div class="banner-discription bann-text">
                <p>Connecting Talent with Opportunity</p>
            </div>
        </div>
    </div>
</section>
<div class="container">
    <div class="row my-5">
        <div class="col-xl-8 col-md-12 col-sm-12">
            <div class="row mb-5 ">
                <div class="col-md-12">
                    <h4><?php echo $data['blog_title'] ?></h4>
                    <p>Posted By <?php echo $data['blog_author'] ?></p>
                    <div class="d-flex justify-content-end share-icons">
                        <div class="p-2"><a href="#"><i class="fa fa-facebook"></i></a></div>
                        <div class="p-2"><a href="#"><i class="fa fa-google-plus-square"></i></a></div>
                        <div class="p-2"><a href="#"><i class="fa fa-twitter"></i></a></div>
                    </div>
                    <img src="<?php echo '/assets/images/'.$data['blog_image'] ?>" class="img-fluid custom-posted-image-banner">
                </div>
                <div class="col-md-12 my-5">
                    <?php echo $data['blog_description'] ?>
                </div>
                <div class="col-md-12">
                    <form action="./comments.php" method="POST" id="z">
                        <div class="row">
                            <input type="hidden" name="blogid" value="<?php echo $id ?>">
                            <div class="col">
                                <p>First Name*</p>
                                <input type="text" name="firstname" class="form-control">
                            </div>
                            <div class="col">
                                <p>Last Name*</p>
                                <input type="text" name="lastname" class="form-control" name="pswd">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-7">
                                <p>Email*</p>
                                <input type="email" name="email" class="form-control" name="email">
                            </div>
                        </div>
                        <div class="row my-3">
                            <div class="col-7">
                                <p>Comment*</p>
                                <textarea class="form-control" name="comment"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Post a Comment</button>
                    </form>
                </div>



                <span id="comment_section" class="col-md-12">
                     <?php

                    while($row = mysqli_fetch_array($comments)) {
                    ?>
                <div class="posted-blog col-md-12 my-5 p-3 bg-grey">
                    <strong><?php echo $row['first_name'] . $row['last_name'] ?></strong>
                    <p><?php echo $row['comments_section'] ?></p>
                </div>
                <?php } ?>
                </span>

                <button class="btn btn-primary m-3" id="seemore" onClick="getComments()">See More</button>
            </div>
        </div>
        <div class="col-xl-4 col-md-12 col-sm-12 scripted-data">
            <div class="scripted-data">
                <h4 class="pb-3 text-center">Recent Jobs</h4>
                <script language="javascript" type="text/javascript" src="https://diversityworking.careerwebsite.com/distrib_pages/jobs.cfm?max=5&type=recent"></script>
                <div class="ads-boxes"><img src="/assets/images/doctors.jpg"></div>
                <form class="my-5" id="">
                    <h2>Newsletter</h2>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form1Example1" class="form-control" />
                        <label class="form-label" for="form1Example1">Email address</label>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="Name" id="form1Example2" class="form-control" />
                        <label class="form-label" for="form1Example2">First Name</label>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="Name" id="form1Example2" class="form-control" />
                        <label class="form-label" for="form1Example2">Last Name</label>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</section>


<?php


    //get the categories
    $query = "SELECT * FROM categories ";
    $result = mysqli_query($db,$query);
    $categoriesID = [];
    $index= 0;
    while($row=mysqli_fetch_assoc($result)){
        $categoriesID[$index++] = $row['id'];
    }


    function checkIfCategoryExist($categories, $id){
        //check if the edit cateogry exist

        if(in_array($id,$categories)){
            return true;
        }
        return false;
    }

?>


<footer>


    
    <div class="footer-inner">
        <div class="container">
            <div class="footer-top">
                <div class="row">
                    <div class="col-md-6 col-lg-3 footer-widget mb-5">
                        <h5 class="widget-title">SITE RESOURCES</h5>
                        <nav class="vertical-menu">
                            <ul>
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#"></a>Privacy Policy</li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6 col-lg-3 footer-widget mb-5">
                        <h5 class="widget-title">FOR EMPLOYERS</h5>
                        <nav class="vertical-menu">
                            <ul>
                                <li><a href="#">Post a Job</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6 col-lg-3 footer-widget mb-5">
                        <h5 class="widget-title">Newsletter</h5>
                        <div class="newsletter">
                            <form>
                                <div class="custom-form-group field-dark-grey mb-3">
                                    <input type="email" class="custom-form-control" name="email" placeholder="your@email.com">
                                </div>
                                <div class="custom-form-group field-blue">
                                    <input type="submit" class="custom-form-control" name="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 footer-widget mb-5">
                        <a href="index.php" class="logo-box mb-3">
                            <img src="<?php echo $baseurl.'/assets/images/logo.svg'?>" class="logo" src="logo">
                        </a>
                        <div class="social-icon-box text-center">
                            <a href="https://www.linkedin.com" class="social-icon"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            <a href="https://www.facebook.com/" class="social-icon"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                            <a href="https://www.twitter.com" class="social-icon"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom border-top border-white py-3">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <div class="px-3">
                        <span class="powered-by">Powered by Techverx</span>
                    </div>
                    <div class="px-3">
                        <span class="copyright">Copyrights are Reserved by Techverx</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="<?php echo $baseurl.'/assets/js/jquery.min.js' ?>"></script>
<script src="<?php echo $baseurl.'/assets/js/bootstrap.min.js' ?>"></script>
<script src="<?php echo $baseurl.'/assets/js/slick.min.js' ?>"></script>
<script src="<?php echo $baseurl.'/assets/js/wow.min.js' ?>"></script>
<script src="<?php echo $baseurl.'/assets/js/custom.js' ?>"></script>

<script>
    var id = '<?php echo $data['id'] ?>'
    var count = '<?php echo $rowcount; ?>';

    $(function () {
        $.validator.setDefaults({

        });
        $('#commentForm').validate({
            rules: {
                firstname: {
                    required: true,
                },
                lastname: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                },
                comment: {
                    required: true
                },
            },
            messages: {
                firstname: {
                    required: "Please enter a first name",
                },
                lastname: {
                    required: "Please enter a last name",
                },
                email:{
                    required: "Please enter a email address",
                    email: "Please enter a vaild email address"
                },
                comment: {
                    required: "Please enter comment",
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });


    function getComments(){
        count=parseInt(count)+10;
        $.ajax({

            type:'POST',
            data:{currentLength:count, id:id},
            url:'new_comments.php',

            success:function(response){
                console.log(JSON.parse(response))
                var length = response.length;
                let html = '';
                for(var index = 0; index < length; index ++){
                    console.log(response[index]);
                    let fullname = response[index].first_name+' '+response[index].last_name;
                    let div = '<div class="posted-blog col-md-12 my-5 p-3 bg-grey">\n' +
                        '                    <strong>'+fullname +'</strong>\n'+
'                    <p>'+response[index].comments_section+'</p>\n'+
'                </div>';
                    html+=div;
                }

                document.getElementById('comment_section').innerHTML = html;
            },
            error:function(err){
                console.log(err)
            },
            complete:function(){
                console.log('ajaxCompleted')

            }
        })
    }
</script>


</body>
</html>


<!--ending -->




{{--@extends('layouts.app')--}}
{{--@section('title','Site | Home')--}}
{{--@section('content')--}}


{{--    <!-- import modal at the top -->--}}
{{--    @include('layouts.components.modal',['levels'=>$levels,'subjects'=> $subjects])--}}
{{--    <!-- modal ends here -->--}}
{{--    <!-- slider starts here -->--}}
{{--    @include('layouts.components.slider')--}}
{{--    <!-- slider ends here -->--}}

{{--   @php generateFlashMessage() @endphp--}}
{{--    <!-- community-guideline -->--}}
{{--    @include('partials.guidlines')--}}
{{--    <!-- ends here -->--}}

{{--    <!-- stories starts here -->--}}
{{--    @include('partials.stories')--}}
{{--    <!-- stories ends here -->--}}


{{--    <!-- include services -->--}}
{{--    @include('partials.services')--}}
{{--    <!-- services ends here-->--}}

{{--    <!-- include tution rates -->--}}
{{--    @include('partials.tutionrates',['rates'=>$rates])--}}
{{--    <!-- end tution rates -->--}}


{{--    <!-- include steps -->--}}
{{--    @include('partials.steps')--}}
{{--    <!-- end steps -->--}}


{{--    <!-- benifits -->--}}
{{--    @include('partials.benifits')--}}
{{--    <!-- end benifits -->--}}
{{--@endsection--}}
