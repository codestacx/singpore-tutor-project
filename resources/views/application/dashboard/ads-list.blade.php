@extends('application.layouts.app')
@section('title','My Ads')
@section('links')
    <link rel="stylesheet" href="{{asset('static/css/dashboard.css')}}">
@endsection
@section('content')
    <!-- MAIN START -->
    <main class="sl-main">
        <div class="sl-main-section">
            <div class="container">
                <div class="row">
                   @include('application.dashboard.layouts.sidebar',['user'=>$user])
                    <div class="col-lg-8 col-xl-9">
                        <div class="sl-dashboardbox sl-myFavorites">
                            <div class="sl-dashboardbox__title">
                                <h2>My Ads</h2>
                            </div>
                            @if(\Illuminate\Support\Facades\Session::has('error'))
                                <div class="alert alert-danger">
                                    {{\Illuminate\Support\Facades\Session::get('error')}}
                                </div>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('success'))
                                <div class="alert alert-success">
                                    {{\Illuminate\Support\Facades\Session::get('success')}}
                                </div>
                            @endif
                            <div class="sl-dashboardbox__content">
                                <div class="sl-myFavorites__rightarea">
                                    <p>Show only:</p>
                                    <div class="sl-select">
                                        <select class="form-control sl-form-control">
                                            <option selected>All Favorites</option>
                                            <option>All not Favorites</option>
                                        </select>
                                    </div>
                                </div>
                                @foreach($ads as $ad)
                                    <div class="sl-featuredProducts--post">
                                        <figure>
                                            <img src="{{asset('uploads/ads/'.$ad->featured_image)}}" alt="Image Description">
                                            <figcaption>

                                            </figcaption>
                                        </figure>
                                        <div class="sl-featuredProducts--post__content">
                                            <div class="sl-myFavorites__content">
                                                <div class="sl-slider__tags">
                                                    <span class="sl-bg-red-orange">25% OFF</span>
                                                </div>
                                                <div class="sl-featuredProducts--post__title">
                                                    <h6>{{$ad->ad_title}}</h6>
                                                </div>
                                                <div class="sl-featuredProducts--post__price">
                                                    <h5>{{$ad->price}}</h5>
                                                    <h6>$220.30</h6>
                                                </div>
                                                <div class="sl-featureRating">
                                                    <span class="sl-featureRating__stars"><span></span></span>
                                                    {{$ad->active_status}}
                                                    <em>({{$ad->active_status   ? 'Active':'In Active'}})</em>
                                                    <em><a href="{{route('ad.toggle.status',['ad'=>$ad->ad_id])}}">({{$ad->active_status == 1 ? 'Deactivate':' Activate '}})</a> </em>
                                                </div>
                                                <em>By: <a href="javascript:void(0);">{{$ad->fname.' '.$ad->lname}}</a></em>
                                            </div>
                                            <a href="javascript:void(0);" class="sl-favorite"><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                            <div class="sl-pagination">
                                <div class="sl-pagination__button-left">
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span class="lnr lnr-chevron-left"></span></a>
                                </div>
                                <div class="sl-pagination__button-num">
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>1</span></a>
                                    <a class="btn sl-btn sl-btn-small sl-btn-active" href="javascript:void(0);"><span>2</span></a>
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>3</span></a>
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>4</span></a>
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span class="sl-more">...</span></a>
                                    <a class="btn sl-btn sl-btn-small" href="javascript:void(0);"><span>50</span></a>
                                </div>
                                <div class="sl-pagination__button-right">
                                    <a class="btn sl-btn sl-btn-small sl-btn-active" href="javascript:void(0);"><span class="lnr lnr-chevron-right"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- MAIN END -->
@endsection

<script>
    function  ads_delte(ad_id,active_status){
        $.ajax({
            type:'GET',
            url:'{{route("ads_delte")}}',
            data:{ad_id:ad_id,active_status:active_status},
            success:function(data){
                if(data==1){
                    location.reload();
                }
            }
        });
    }
</script>
