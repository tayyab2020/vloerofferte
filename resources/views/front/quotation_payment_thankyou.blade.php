@extends('layouts.front')

@section('content')

    <div class="jumbotron text-center" style="font-family: inherit;height: 470px;background-color: #e9ecef;padding-top: 100px;">
        <h1 class="display-3" style="font-weight: 300;">{{__('text.Thank You!')}}</h1>
        <p class="lead" style="font-size: 18px;width: 80%;margin: auto;padding-top: 55px;"><strong>{{__('text.Congratulations!')}}</strong> {{__('text.Your payment was successful and your order has been confirmed.')}}</p>
        <hr>
        <p style="font-size: 18px;font-weight: 500;">
            {{__('text.Having Trouble!')}} <a href="{{route('front.contact')}}">{{__('text.Contact Us')}}</a>
        </p>
        <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{route('front.index')}}" role="button" style="font-size: 14px;background-color: #0069d9;border-color: #0062cc">{{__('text.Continue to homepage')}}</a>
        </p>

        <svg id="successAnimation" class="animated" xmlns="http://www.w3.org/2000/svg" width="70" height="70" viewBox="0 0 70 70">
            <path id="successAnimationResult" fill="#D8D8D8" d="M35,60 C21.1928813,60 10,48.8071187 10,35 C10,21.1928813 21.1928813,10 35,10 C48.8071187,10 60,21.1928813 60,35 C60,48.8071187 48.8071187,60 35,60 Z M23.6332378,33.2260427 L22.3667622,34.7739573 L34.1433655,44.40936 L47.776114,27.6305926 L46.223886,26.3694074 L33.8566345,41.59064 L23.6332378,33.2260427 Z"/>
            <circle id="successAnimationCircle" cx="35" cy="35" r="24" stroke="#979797" stroke-width="2" stroke-linecap="round" fill="transparent"/>
            <polyline id="successAnimationCheck" stroke="#979797" stroke-width="2" points="23 34 34 43 47 27" fill="transparent"/>
        </svg>

    </div>

    <style type="text/css">

        .subscribe-newsletter-wrapper
        {
            background-color: #e9ecef;
        }

        body{

            background-color: #e9ecef;
        }

        @-webkit-keyframes scaleAnimation {
            0% {
                opacity: 0;
                -webkit-transform: scale(1.5);
                transform: scale(1.5);
            }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes scaleAnimation {
            0% {
                opacity: 0;
                -webkit-transform: scale(1.5);
                transform: scale(1.5);
            }
            100% {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }
        @-webkit-keyframes drawCircle {
            0% {
                stroke-dashoffset: 151px;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes drawCircle {
            0% {
                stroke-dashoffset: 151px;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
        @-webkit-keyframes drawCheck {
            0% {
                stroke-dashoffset: 36px;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes drawCheck {
            0% {
                stroke-dashoffset: 36px;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
        @-webkit-keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
        @keyframes fadeOut {
            0% {
                opacity: 1;
            }
            100% {
                opacity: 0;
            }
        }
        @-webkit-keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }
        #successAnimationCircle {
            stroke-dasharray: 151px 151px;
            stroke: #37d46e;
        }

        #successAnimationCheck {
            stroke-dasharray: 36px 36px;
            stroke: black;
        }

        #successAnimationResult {
            fill: #37d46e;
            opacity: 0;
        }

        #successAnimation.animated {
            -webkit-animation: 1s ease-out 0s 1 both scaleAnimation;
            animation: 1s ease-out 0s 1 both scaleAnimation;
            animation-delay: 1s;
            -webkit-animation-delay: 1s; /* Safari 4.0 - 8.0 */


        }
        #successAnimation.animated #successAnimationCircle {
            -webkit-animation: 1s cubic-bezier(0.77, 0, 0.175, 1) 0s 1 both drawCircle, 1.3s linear 0.9s 1 both fadeOut;
            animation: 1s cubic-bezier(0.77, 0, 0.175, 1) 0s 1 both drawCircle, 1.3s linear 0.9s 1 both fadeOut;
            animation-delay: 1s;
            -webkit-animation-delay: 1s; /* Safari 4.0 - 8.0 */


        }
        #successAnimation.animated #successAnimationCheck {
            -webkit-animation: 1s cubic-bezier(0.77, 0, 0.175, 1) 2s 1 both drawCheck, 1.3s linear 1.9s 1 both fadeOut;
            animation: 1s cubic-bezier(0.77, 0, 0.175, 1) 2s 1 both drawCheck, 1.3s linear 1.9s 1 both fadeOut;
            animation-delay: 2s;
            -webkit-animation-delay: 2s; /* Safari 4.0 - 8.0 */

        }
        #successAnimation.animated #successAnimationResult {
            -webkit-animation: 0.3s linear 0.9s both fadeIn;
            animation: 0.3s linear 0.9s both fadeIn;
            animation-delay: 2s;
            -webkit-animation-delay: 2s; /* Safari 4.0 - 8.0 */


        }
    </style>

    <script type="text/javascript">


        setTimeout(function(){
            $('#cover').fadeOut(0);
        },0)


    </script>

@endsection
