@extends('layouts.main')

@section('page-title')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active"><i class="fas fa-home"></i> Home</li>
                    </ol>
                </div>
                <h4 class="page-title">Home</h4>
            </div>
        </div>
    </div>     
    <!-- end page title -->
@endsection

@section('content')
    <style>
        .hover-scale i.fas {
            transform: scale(1);
            transition: transform .15s ease;
        }

        .hover-scale:hover i.fas {
            transform: scale(1.1);
        }

        .border-2 {
            border-width: 2px;
        }

        .ribbon-box .ribbon-two-secondary span {
            background: #C5B358 !important;
        }

    </style>    

    @if(Auth::user()->std_level == 'premium')
        <div class="row d-flex justify-content-center">
            <div class="col-xl-3 col-md-6">
                <a href="{{ url('isac/listening') }}" class="wave-light">
                    <div class="card-box widget-icon bg-danger">
                        <div class="avatar-lg float-left">
                            <div class="hover-scale">
                                <div class="widget-simple">
                                    <i class=" fas fa-volume-up avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="wid-icon-info text-right">
                            <h2 class="mb-1 text-light">iPACK</h2>
                            <h4 class="text-light mb-1">Listening</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6">

                <a href="{{ route('isac_reading') }}" target="_blank">
                    <div class="card-box widget-icon bg-pink">
                        <div class="avatar-lg float-left">
                            <div class="hover-scale">
                                <div class="widget-simple">
                                    <i class="fas fa-eye avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <h2 class="mb-1 text-light">iPACK</h2>
                            <h4 class="text-light mb-1">Reading</h4>
                        </div>
                    </div>
                </a>
            
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <a href="{{url('/isac_writing_home')}}">
                    <div class="card-box widget-icon ribbon-box bg-info">
                        <div class="ribbon-two ribbon-two-secondary"><span>Premium</span></div>
                        <div class="avatar-lg float-left">
                            <div class="hover-scale">
                                <div class="widget-simple">
                                    <i class="fas fa-pencil-alt  avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <h2 class="mb-1 text-light">iPACK</h2>
                            <p class="text-light mb-1">Writing</p>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <a href="{{url('/browser-settings')}}">
                <div class="card-box widget-icon ribbon-box bg-success">
                        <div class="ribbon-two ribbon-two-secondary"><span>Premium</span></div>
                        <div class="avatar-lg float-left">
                            <div class="hover-scale">
                                <div class="widget-simple">
                                    <i class="fas fa-comment-dots avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <h2 class="mb-1 text-light">iPACK</h2>
                            <p class="text-light mb-1">Speaking</p>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->

        </div>

        <div class="row">
            <div class="col-xl-6 col-md-6  col-sm-12" >
                <a href="{{ route('strategies_pack') }}" target="_blank">
                    <div class="card-box widget-icon bg-primary">
                        <div class="avatar-lg float-left">
                            <div class="hover-scale">
                                <div class="widget-simple">
                                    <i class="fas fa-film avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="mb-3 text-light ">Strategies Packs</h2>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->

            <div class="col-xl-6 col-md-6 col-sm-12">
                <a href="{{ route('topic_pack') }}" target="_blank">
                    <div class="card-box widget-icon bg-primary">
                        <div class="avatar-lg float-left">
                            <div class="hover-scale">
                                <div class="widget-simple">
                                    <i class="fas fa-briefcase avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="mb-3 text-light">Topic Packs</h2>
                        </div>
                    </div>
                </a>
            
            </div><!-- end col -->
        </div>

        <div class="row">
            <div class="col-xl-6 col-md-6 col-sm-12">
                <a href="{{url('language/home')}}">
                    <div class="card-box widget-icon bg-primary">
                        <!-- <div class="ribbon-two ribbon-two-diamond avatar-title display-6 m-0 "><span>Diamond</span></div> -->
                        <div class="avatar-lg float-left">
                            <div class="hover-scale">
                                <div class="widget-simple">
                                    <i class="fas fa-language avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="mb-3 text-light">Language Use</h2>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->

            <div class="col-xl-6 col-md-6 col-sm-12">
                <a href="#">
                    <div class="card-box widget-icon bg-secondary">
                        <!-- <div class="ribbon-two ribbon-two-diamond avatar-title display-6 m-0 "><span>Diamond</span></div> -->
                        <div class="avatar-lg float-left">
                            <div class="hover-scale">
                                <div class="widget-simple">
                                    <i class="fas fa-calendar-alt avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h2 class="mb-3 text-light">Comming Soon ..</h2>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->

            <div class="timeline-desk">
                <div class="timeline-box">
                    <h4 class="mt-0 font-16">Recommended</h4>
                    <p class="mb-0"><i class="mdi mdi-monitor-screenshot"></i> On computer</p>
                </div>
            </div>
        </div>
    @elseif (Auth::user()->std_level == 'standard')
    <div class="row d-flex justify-content-center">
        <div class="col-xl-3 col-md-6">
            <a href="{{ url('isac/listening') }}" class="wave-light">
                <div class="card-box widget-icon bg-danger">
                    <div class="avatar-lg float-left">
                        <div class="hover-scale">
                            <div class="widget-simple">
                                <i class=" fas fa-volume-up avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="wid-icon-info text-right">
                        <h2 class="mb-1 text-light">iPACK</h2>
                        <h4 class="text-light mb-1">Listening</h4>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6">

            <a href="{{ route('isac_reading') }}" target="_blank">
                <div class="card-box widget-icon bg-pink">
                    <div class="avatar-lg float-left">
                        <div class="hover-scale">
                            <div class="widget-simple">
                                <i class="fas fa-eye avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <h2 class="mb-1 text-light">iPACK</h2>
                        <h4 class="text-light mb-1">Reading</h4>
                    </div>
                </div>
            </a>
        
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <a href="#" id="alert1">
                <div class="card-box widget-icon ribbon-box bg-info">
                    <div class="ribbon-two ribbon-two-secondary"><span>Premium</span></div>
                    <div class="avatar-lg float-left">
                        <div class="hover-scale">
                            <div class="widget-simple">
                                <i class="fas fa-pencil-alt  avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <h2 class="mb-1 text-light">iPACK</h2>
                        <p class="text-light mb-1">Writing</p>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-3 col-md-6">
            <a href="#" id="alert2">
            <div class="card-box widget-icon ribbon-box bg-success">
                    <div class="ribbon-two ribbon-two-secondary"><span>Premium</span></div>
                    <div class="avatar-lg float-left">
                        <div class="hover-scale">
                            <div class="widget-simple">
                                <i class="fas fa-comment-dots avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <h2 class="mb-1 text-light">iPACK</h2>
                        <p class="text-light mb-1">Speaking</p>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

    </div>

    <div class="row">
        <div class="col-xl-6 col-md-6  col-sm-12" >
            <a href="{{ route('strategies_pack') }}" target="_blank">
                <div class="card-box widget-icon bg-primary">
                    <div class="avatar-lg float-left">
                        <div class="hover-scale">
                            <div class="widget-simple">
                                <i class="fas fa-film avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2 class="mb-3 text-light ">Strategies Packs</h2>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-6 col-md-6 col-sm-12">
            <a href="{{ route('topic_pack') }}" target="_blank">
                <div class="card-box widget-icon bg-primary">
                    <div class="avatar-lg float-left">
                        <div class="hover-scale">
                            <div class="widget-simple">
                                <i class="fas fa-briefcase avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2 class="mb-3 text-light">Topic Packs</h2>
                    </div>
                </div>
            </a>
        
        </div><!-- end col -->
    </div>

    <div class="row">
        <div class="col-xl-6 col-md-6 col-sm-12">
            <a href="{{url('language/home')}}">
                <div class="card-box widget-icon bg-primary">
                    <!-- <div class="ribbon-two ribbon-two-diamond avatar-title display-6 m-0 "><span>Diamond</span></div> -->
                    <div class="avatar-lg float-left">
                        <div class="hover-scale">
                            <div class="widget-simple">
                                <i class="fas fa-language avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2 class="mb-3 text-light">Language Use</h2>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-6 col-md-6 col-sm-12">
            <a href="#">
                <div class="card-box widget-icon bg-secondary">
                    <!-- <div class="ribbon-two ribbon-two-diamond avatar-title display-6 m-0 "><span>Diamond</span></div> -->
                    <div class="avatar-lg float-left">
                        <div class="hover-scale">
                            <div class="widget-simple">
                                <i class="fas fa-calendar-alt avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h2 class="mb-3 text-light">Comming Soon ..</h2>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="timeline-desk">
            <div class="timeline-box">
                <h4 class="mt-0 font-16">Recommended</h4>
                <p class="mb-0"><i class="mdi mdi-monitor-screenshot"></i> On computer</p>
            </div>
        </div>
    </div>
    @else
        <div class="row d-flex justify-content-center">
            <div class="col-xl-6 col-sm-12">
                <a href="{{ url('isac/listening') }}" class="wave-light">
                    <div class="card-box widget-icon bg-danger">
                        <div class="avatar-lg float-left">
                            <div class="hover-scale">
                                <div class="widget-simple">
                                    <i class=" fas fa-volume-up avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="wid-icon-info text-right">
                            <h2 class="mb-1 text-light">iPACK</h2>
                            <h4 class="text-light mb-1">Listening</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-6 col-sm-12">
                <a href="{{url('language/home')}}">
                    <div class="card-box widget-icon bg-pink">
                        <div class="avatar-lg float-left">
                            <div class="hover-scale">
                                <div class="widget-simple">
                                    <i class="fas fa-eye avatar-title display-6 m-0 " style="font-size: 5em;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <h2 class="mb-1 text-light">iPACK</h2>
                            <h4 class="text-light mb-1">Language Use</h4>
                        </div>
                    </div>
                </a>
            </div><!-- end col -->
        </div>
    @endif
@endsection

@section('js')
<!-- Sweet Alerts js -->
<script src="{{ asset('public/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Sweet alert init js-->
<script src="{{ asset('public/assets/js/pages/sweet-alerts.init.js') }}"></script>
<script>
    $('#alert1').on('click', function() {
        Swal.fire({
          title: 'Access denied',
          text: 'Please upgrade to Premium for access it',
          type: 'error',
          timer: 5000,
        })
    });
    $('#alert2').on('click', function() {
        Swal.fire({
          title: 'Access denied',
          text: 'Please upgrade to Premium for access it',
          type: 'error',
          timer: 5000,
        })
    });
</script>

@endsection

